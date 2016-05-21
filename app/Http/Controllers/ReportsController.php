<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Response;
use App\User;
use App\SaleOrder;
use App\SaleOrderDetail;
use App\Product;
use App\Pgroup;
use App\Datatable\SaleOrderAjax;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::select(DB::raw('CONCAT(first_name, " ", last_name) AS name'),'users.id')->join('user_groups', 'user_id','=','users.id')->orderBy('first_name', 'asc')->lists('name','users.id');
		
        return view('reports.index',compact('users'));
    }
	
	public function selectReport(Request $request, SaleOrderAjax $saleOrder){
		
		$input = $request->all();
		$table     = "sales_orders INNER JOIN users ON users.id=sales_orders.created_by";				
		$columns   = array('sales_orders.id','sales_orders.created_at', 'first_name', 'so_code', 'discount_riel', 'discount_us', 'total_amount_riel', 'total_amount_us', 'IF(balance>0,balance,0)');
		
		$condition = "";
		$condition .= " sales_orders.is_active = 1 AND sales_orders.is_book = 0";
		
		if(isset($input['users']) && $input['users'] != ""){
			$condition .= " AND sales_orders.created_by =". $input['users'];
		}
		$condition .= " AND SUBSTRING(sales_orders.created_at,1,10) BETWEEN '". $input['dateFrom']."' AND '". $input['dateTo']."'";
				
		//$condition .= " ORDER BY users.first_name";
		return $saleOrder->getResource($table, $columns, $condition, 'sales_orders.id');
			
	}
	
	
    public function reportProduct()
    {
		$users = User::select(DB::raw('CONCAT(first_name, " ", last_name) AS name'),'users.id')->join('user_groups', 'user_id','=','users.id')->orderBy('first_name', 'asc')->lists('name','users.id');
		
        return view('reports.reportProduct',compact('users'));
    }
	
	public function selectReportByProduct(Request $request, SaleOrderAjax $saleOrder){
		$input = $request->all();
		
		if(isset($input['users']) && $input['users'] != ""){
			
			$saleOrderDetail = SaleOrderDetail::select('pgroups.name AS pgroup_name','products.name AS pro_name', 'unit_price', 'products.code',DB::raw("(SELECT CONCAT(SUM(qty),'|',SUM(discount_price_riel),'|',SUM(total_price_riel)) FROM sales_order_details INNER JOIN sales_orders ON sales_orders.id=sales_order_details.sales_order_id WHERE product_id=products.id AND sales_orders.created_by = ".$input['users']." AND SUBSTRING(sales_orders.created_at,1,10) BETWEEN '".$input['dateFrom']."' AND '".$input['dateTo']."') AS group_amount"))->
												join('sales_orders', 'sales_orders.id','=','sales_order_details.sales_order_id')->
												join('users', 'users.id','=','sales_orders.created_by')->
												join('products', 'products.id','=','sales_order_details.product_id')->
												join('pgroups', 'pgroups.id','=','products.pgroup_id')->
												where('sales_orders.is_active',1)->
												where('sales_orders.is_book',0)->
												where('sales_orders.created_by',$input['users'])->
												whereBetween('sales_orders.created_at', array($input['dateFrom'], $input['dateTo']))->
												orderBy('pgroup_name')->
												groupBy('product_id')->get();
		}else{
			
			$saleOrderDetail = SaleOrderDetail::select('pgroups.name AS pgroup_name','products.name AS pro_name', 'unit_price', 'products.code', DB::raw("(SELECT CONCAT(SUM(qty),'|',SUM(discount_price_riel),'|',SUM(total_price_riel)) FROM sales_order_details WHERE product_id=products.id AND SUBSTRING(sales_orders.created_at,1,10) BETWEEN '".$input['dateFrom']."' AND '".$input['dateTo']."') AS group_amount"))->
												join('sales_orders', 'sales_orders.id','=','sales_order_details.sales_order_id')->
												join('users', 'users.id','=','sales_orders.created_by')->
												join('products', 'products.id','=','sales_order_details.product_id')->
												join('pgroups', 'pgroups.id','=','products.pgroup_id')->
												where('sales_orders.is_active',1)->
												where('sales_orders.is_book',0)->
												whereBetween('sales_orders.created_at', array($input['dateFrom'],$input['dateTo']))->
												orderBy('pgroup_name')->
												groupBy('product_id')->get();
		}
		return View::make('reports.reportProductResult')->with('saleOrderDetail', $saleOrderDetail);
		
	}
	
	

}
