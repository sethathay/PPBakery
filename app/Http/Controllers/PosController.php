<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use Input;
use App\Product;
use App\SaleOrder;
use App\SaleOrderDetail;
use App\SaleOrderReceipt;
use App\Inventory;
use App\InventoryTotal;
use App\InventoryTotalDetail;
use Response;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function sale(SaleOrder $saleOrders, Request $request, SaleOrderDetail $saleOrderDetails, SaleOrderReceipt $saleOrderReceipts)
    {
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$rate = $exchangerate->riel;
    	$inputs = Input::all();
		$inputs['amount_riel'] = str_replace(",","",$inputs['amount_riel']);
		$user  = \Auth::user()->id;
		// To save sale order table
		$saleOrder = array();
        $saleOrder['_token']    = $inputs['_token'];
        $saleOrder['location_id']    = Session::get('location_id');
        $saleOrder['customer_id']    = 1;
        $saleOrder['so_code']    = $this->generateAutoCode("sales_orders", "so_code", 6, "SO");
        $saleOrder['total_amount_riel']    = $inputs['total_amount_riel'];
        $saleOrder['total_amount_us']    = $inputs['total_amount_us'];
        $saleOrder['discount_riel']    = $inputs['custom-discount-riel'];
        $saleOrder['discount_us']    = $inputs['custom-discount-us'];
        $saleOrder['balance']    = $inputs['total_amount_riel'] - ($inputs['amount_riel']+$inputs['amount_us']*$rate + $inputs['custom-discount-riel'] + $inputs['custom-discount-us']*$rate);		
        $saleOrder['order_date']    = date('Y-m-d');
		$saleOrder['due_date']    = date('Y-m-d');
        $saleOrder['is_active']    = 1;
        $saleOrder['is_pos']    = 1;
        $saleOrder['created_by']    = $user;
        $saleOrder['updated_by']    = $user;
		$saleOrders->fill($saleOrder)->save();
		$sale_order_id = $saleOrders->id;
		
		// To save sale order receipts table
		$saleOrderReceipt = array();
		$saleOrderReceipt['sales_order_id'] = $sale_order_id;
		$saleOrderReceipt['exchange_rate_id'] = $exchangerate->id;
		$saleOrderReceipt['receipt_code'] = $this->generateAutoCode("sales_order_receipts", "receipt_code", 6, "RE");
		$saleOrderReceipt['amount_us'] = $inputs['amount_us'];
		$saleOrderReceipt['amount_kh'] = $inputs['amount_riel'];
		$saleOrderReceipt['total_amount'] = $inputs['total_amount_riel'];
        $saleOrderReceipt['balance']    = $inputs['total_amount_riel'] - ($inputs['amount_riel']+$inputs['amount_us']*$rate + $inputs['custom-discount-riel'] + $inputs['custom-discount-us']*$rate);
		$saleOrderReceipt['pay_date']    = date('Y-m-d');
		$saleOrderReceipt['due_date']    = date('Y-m-d');	
        $saleOrderReceipt['created_by']    = $user;
        $saleOrderReceipt['updated_by']    = $user;
        $saleOrderReceipt['is_active']    = 1;
		$saleOrderReceipts->fill($saleOrderReceipt)->save();
		
		
		// To save sale order detail table
		for($i=0; $i<count($inputs['id'])-1; $i++){
			$saleOrderDetail = new SaleOrderDetail;
			$saleOrderDetail['sales_order_id'] = $sale_order_id;
			$saleOrderDetail['product_id'] = $inputs['id'][$i];
			$saleOrderDetail['discount_price_riel'] = $inputs['txt_discount'][$i];
			$saleOrderDetail['qty'] = $inputs['txt_qty'][$i];
			$saleOrderDetail['qty_uom_id'] = 1;
			$saleOrderDetail['conversion'] = 1;
			$saleOrderDetail['unit_price'] = $inputs['txt_unit_price'][$i];
			$saleOrderDetail['total_price_riel'] = $inputs['txt_total_by_item'][$i];
			$saleOrderDetail->save();
		}
		
		// Save to inventory
		for($k=0; $k<count($inputs['id'])-1; $k++){
			
			$fields = ['product_id'=>$inputs['id'][$k], 'location_id'=>Session::get('location_id')];
			$checkIfSaleExistingProduct = InventoryTotal::where($fields)->first();
			
			// Save to inventories table
			$inventory = new Inventory;
			$inventory['point_of_sales_id'] = $sale_order_id;
			$inventory['product_id'] = $inputs['id'][$k];
			$inventory['location_id'] = Session::get('location_id');
			$inventory['qty'] = $inputs['txt_qty'][$k];
			$inventory['sale_price'] = $inputs['txt_unit_price'][$k];
			$inventory['date'] = date('Y-m-d');
			$inventory['created_by']    = $user;
			$inventory['updated_by']    = $user;	
			$inventory->save();
			
			if(count($checkIfSaleExistingProduct)>0){ //for existing product in inventory
				
				// Save to inventory_totals table
				$inventoryTotals = new InventoryTotal;
				$inventoryTotal = array();
				$inventoryTotal['total_qty'] = $checkIfSaleExistingProduct['total_qty']-$inputs['txt_qty'][$k];
				$inventoryTotal['created_by']    = $user;
				$inventoryTotal['updated_by']    = $user;	
				$inventoryTotals->where($fields)->update($inventoryTotal);
				
				// Save to inventory_total_details table
				$inventoryTotalDetails = new InventoryTotalDetail;
				$inventoryTotalDetail = array();
				$fieldNews = ['product_id'=>$inputs['id'][$k], 'location_id'=>Session::get('location_id'), 'date'=>date('Y-m-d')];
				$checkIfSaleExistingProductInventoryDetail = InventoryTotalDetail::where($fieldNews)->first();
				$inventoryTotalDetail['total_pos'] = $checkIfSaleExistingProductInventoryDetail['total_qty']-$inputs['txt_qty'][$k];
				$inventoryTotalDetail['created_by']    = $user;
				$inventoryTotalDetail['updated_by']    = $user;	
				$inventoryTotalDetails->where($fieldNews)->update($inventoryTotalDetail);
				
				
			}else{ // for a new product in inventory
				
				// Save to inventory_totals table
				$inventoryTotal = new InventoryTotal;
				$inventoryTotal['product_id'] = $inputs['id'][$k];
				$inventoryTotal['location_id'] = Session::get('location_id');
				$inventoryTotal['total_qty'] = (-1)*$inputs['txt_qty'][$k];
				$inventoryTotal['created_by']    = $user;
				$inventoryTotal['updated_by']    = $user;	
				$inventoryTotal->save();
				
				// Save to inventory_total_details table
				$inventoryTotalDetail = new InventoryTotalDetail;
				$inventoryTotalDetail['product_id'] = $inputs['id'][$k];
				$inventoryTotalDetail['location_id'] = Session::get('location_id');
				$inventoryTotalDetail['total_pos'] = (-1)*$inputs['txt_qty'][$k];
				$inventoryTotalDetail['date'] = date('Y-m-d');
				$inventoryTotalDetail['created_by']    = $user;
				$inventoryTotalDetail['updated_by']    = $user;	
				$inventoryTotalDetail->save();
				
			}
			
		}
		
		echo $sale_order_id;exit;
		
    }
	
	// print receipt pos
	public function printReceipt($sales_order_id, $footer){
		$saleOrder = SaleOrder::select('sales_orders.*',DB::raw('CONCAT(users.first_name, " ", users.last_name) AS u_name'))->join('users', 'sales_orders.created_by','=','users.id')->where('sales_orders.id', $sales_order_id)->first();
		
		$saleOrderReceipts = SaleOrderReceipt::where('sales_order_id', $sales_order_id)->get();
		$saleOrderDetail = SaleOrderDetail::join('products', 'products.id', '=', 'sales_order_details.product_id')->whereSales_order_id($sales_order_id)->get();
		return view('/layout/printReceipt', compact('saleOrderDetail', 'saleOrder', 'footer', 'saleOrderReceipts'));
	}
	
	public function getNotification(){
		$booking = SaleOrder::where('is_book', 1)->where('due_date', date('Y-m-d'))->where(DB::raw("SUBSTRING(pickup_time,1,2)"), '<=', date('H'))->count();
		return $booking;
	}
	
	function generateAutoCode($table, $field, $len, $char) {
        $sqlArr = array('Table' => $table, 'Fields' => array('id', $field));
        $code = $this->getCode($sqlArr, $sort = false);
        $currentYear = date('y');
        if (strlen($code) > $len) {
            list($year, $id) = preg_split('/'.$char.'/' , $code);
            $numId = (int) $id;
            $numYear = (int) $year;
            if ($numId == $this->get9NumberByLen($len)) {
                $numId = 0;
                $currentYear = $numYear + 1;
            }
			//echo $currentYear . $char . $this->getIdString($numId + 1, $len)."test";
            return $currentYear . $char . $this->getIdString($numId + 1, $len);
            //return $char . $this->getIdString($numId + 1, $len);
        } else {
            return $currentYear . $char . $this->getIdString($code, $len);
            //return $char . $this->getIdString($code+1, $len);
        }
    }

    function getCode($sqlArr, $sort=false) {
              
        $tableName = $sqlArr['Table'];
        $fieldId = $sqlArr['Fields'][0];
        $fieldCode = $sqlArr['Fields'][1];
        $sortField = $fieldId;
        if ($sort) {
            $sortField = $fieldCode;
        }
        $sqlStr = 'SELECT ' . $fieldId . ',' . $fieldCode . ' FROM ' . $tableName . ' order by ' . $sortField . ' DESC LIMIT 0 ,1';
		
		$results = DB::select( DB::raw($sqlStr) );
		
        $dataList = $results;
        $code = 1;
        if (count($dataList) > 0) {
            $code = $dataList[0]->$fieldCode;
        }
        return $code;
    }

    function get9NumberByLen($len) {
        $numStr = '';
        for ($i = 1; $i <= $len; $i++) {
            $numStr = $numStr . '9';
        }
        return (int) $numStr;
    }

    function getIdString($numId, $len) {
        $str = '';
        for ($i = 1; $i <= ($len - strlen($numId)); $i++) {
            $str = $str . '0';
        }
        return $str . $numId;
    }
	
    
}
