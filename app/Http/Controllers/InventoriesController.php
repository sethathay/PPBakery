<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Product;
use App\CycleInventory;
use App\CycleProductDetail;
use App\Inventory;
use App\InventoryTotal;
use App\InventoryTotalDetail;
use Input;
use Response;
use Validator;
use Session;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index()
    {
        $pgroups = DB::table('pgroups')->lists('name', 'id');
        return view('inventories/index', compact('pgroups'));
    }
	
	public function save(CycleInventory $cycles, CycleProductDetail $cycleProducts){
		
    	$inputs = Input::all();
		// To save sale order table
		$cycle = array();
        $cycle['_token']    = $inputs['_token'];
        $cycle['date']    = $inputs['date'];        
        $cycle['is_active']    = 1;
        $cycle['created_by']    = \Auth::user()->id;
        $cycle['updated_by']    = \Auth::user()->id;
		$cycles->fill($cycle)->save();
		$cycle_inventory_id = $cycles->id;
		
		for($i=0; $i<count($inputs['product_id']); $i++){
			
			if($inputs['amount'][$i] != ""){
				
				// To save sale order detail table
				$cycleProduct = new CycleProductDetail;
				$cycleProduct['cycle_inventory_id'] = $cycle_inventory_id;
				$cycleProduct['product_id'] = $inputs['product_id'][$i];
				$cycleProduct['current_qty'] = $inputs['current_qty'][$i];
				if($inputs['actions'][$i] == 0){ // actions = 1 it mean add stock
					$cycleProduct['new_qty'] = $inputs['current_qty'][$i] + $inputs['amount'][$i];
					$cycleProduct['actions'] = 0;
				}else{ // actions = 1 it mean update stock
					$cycleProduct['new_qty'] = $inputs['amount'][$i];
					$cycleProduct['actions'] = 1;
				}
				$cycleProduct['created_by']    = \Auth::user()->id;
				$cycleProduct['updated_by']    = \Auth::user()->id;
				$cycleProduct->save();		
				
				// condition to check if product is exist in inventory
				$fields = ['product_id'=>$inputs['product_id'][$i], 'location_id'=>Session::get('location_id')];
				$checkIfSaleExistingProduct = InventoryTotal::where($fields)->first();
				
				// Save to inventories table
				$inventory = new Inventory;
				$inventory['cycle_inventory_id'] = $cycle_inventory_id;
				$inventory['product_id'] = $inputs['product_id'][$i];
				$inventory['location_id'] = Session::get('location_id');
				$inventory['qty'] = $inputs['amount'][$i];
				if($inputs['actions'][$i] == 0){ // actions = 1 it mean add stock
					$inventory['qty'] = $inputs['amount'][$i];
					$inventory['actions'] = 0;
				}else{
					$inventory['qty'] = $inputs['amount'][$i] - $inputs['current_qty'][$i];
					$inventory['actions'] = 1;
				}
				$inventory['date'] = $inputs['date'];
				$inventory['created_by']    = \Auth::user()->id;
				$inventory['updated_by']    = \Auth::user()->id;	
				$inventory->save();
				
				if(count($checkIfSaleExistingProduct)>0){ //for existing product in inventory
					
					// Save to inventory_totals table
					$inventoryTotals = new InventoryTotal;
					$inventoryTotal = array();
					if($inputs['actions'][$i] == 0){ // actions = 1 it mean add stock
						$inventoryTotal['total_qty'] = $checkIfSaleExistingProduct['total_qty']+$inputs['amount'][$i];
					}else{
						$inventoryTotal['total_qty'] = $inputs['amount'][$i];
					}
					$inventoryTotal['created_by']    = \Auth::user()->id;
					$inventoryTotal['updated_by']    = \Auth::user()->id;	
					$inventoryTotals->where($fields)->update($inventoryTotal);
					
					// Save to inventory_total_details table
					$inventoryTotalDetails = new InventoryTotalDetail;
					$inventoryTotalDetail = array();
					$fieldNews = ['product_id'=>$inputs['product_id'][$i], 'location_id'=>Session::get('location_id'), 'date'=>$inputs['date']];
					$checkIfCycleExistingProduct = InventoryTotalDetail::where($fieldNews)->first();
					
					if($inputs['actions'][$i] == 0){ // actions = 1 it mean add stock
						$inventoryTotalDetail['total_cycle'] = $checkIfCycleExistingProduct['total_cycle']+$inputs['amount'][$i];
					}else{
						$inventoryTotalDetail['total_cycle'] = $checkIfCycleExistingProduct['total_cycle']+ ($inputs['amount'][$i] - $inputs['current_qty'][$i]);
					}
					$inventoryTotalDetail['created_by']    = \Auth::user()->id;
					$inventoryTotalDetail['updated_by']    = \Auth::user()->id;	
					$inventoryTotalDetails->where($fieldNews)->update($inventoryTotalDetail);
					
					
				}else{ // for a new product in inventory
					
					// Save to inventory_totals table
					$inventoryTotal = new InventoryTotal;
					$inventoryTotal['product_id'] = $inputs['product_id'][$i];
					$inventoryTotal['location_id'] = Session::get('location_id');
					$inventoryTotal['total_qty'] = $inputs['amount'][$i];
					$inventoryTotal->save();
					
					// Save to inventory_total_details table
					$inventoryTotalDetail = new InventoryTotalDetail;
					$inventoryTotalDetail['product_id'] = $inputs['product_id'][$i];
					$inventoryTotalDetail['location_id'] = Session::get('location_id');
					$inventoryTotalDetail['total_cycle'] = $inputs['amount'][$i];
					$inventoryTotalDetail['date'] = $inputs['date'];
					$inventoryTotalDetail->save();
					
				}
				
			}
			
		}
		
		// update list of inventory when process save inventory completed
		$qty = Input::get('qty');
		
		if($qty == 1){
				
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)->where('total_qty','>',0)
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}else if($qty <= 0 && $qty != ""){
			
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)
			->where(function($query)
            {
                $query->where('total_qty', '<', 0)
                      ->orWhere('total_qty', null);
            })
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}else{
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}		
        return Response::json($inventory);
		
	}
	
	public function searchInventory(){
		
    	$date = Input::get('date');
    	$qty = Input::get('qty');
		
		if($qty == 1){
				
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)->where('total_qty','>',0)
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}else if($qty <= 0 && $qty != ""){
			
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)
			->where(function($query)
            {
                $query->where('total_qty', '<', 0)
                      ->orWhere('total_qty', null);
            })
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}else{
			$inventory = Product::select('products.id AS product_id','products.name','products.code','pgroups.name AS product_group', 'total_qty')
			->leftJoin('inventory_totals', 'inventory_totals.product_id','=', 'products.id')
			->join('pgroups','pgroups.id','=','pgroup_id')->where('products.is_active', 1)->where('products.is_stock', 1)
			->orderBy('pgroups.name', 'ASC')
			->orderBy('products.name', 'ASC')->get();
			
		}		
        return Response::json($inventory);
	}
}
