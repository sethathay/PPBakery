<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Response;
use App\User;
use App\SaleOrder;
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
		$users = User::select(DB::raw('CONCAT(first_name, " ", last_name) AS name'),'users.id')->join('user_groups', 'user_id','=','users.id')->where('group_id',2)->lists('name','users.id');
		
        return view('reports.index',compact('users'));
    }
	
	public function selectReport(Request $request, SaleOrderAjax $saleOrder){
		
		$input = $request->all();
		$table     = "sales_orders";				
		$columns   = array('id','created_at', 'so_code', 'discount_riel', 'discount_us', 'total_amount_riel', 'total_amount_us', 'balance');
		
		$condition = "";
		$condition .= " sales_orders.is_active = 1 AND sales_orders.is_book = 0";
		
		if(isset($input['users']) && $input['users'] != ""){
			$condition .= " AND create_by =". $input['users'];
		}
		$condition .= " AND created_at >='". $input['dateFrom']."'";
		$condition .= " AND created_at <='". $input['dateTo']."'";
		return $saleOrder->getResource($table, $columns, $condition);
			
		/*
		$input = $request->all();
		if($input['users'] != ""){
			
			$saleOrders = SaleOrder::where('sales_orders.is_active', 1)
										->where('sales_orders.is_book',0)
										->where('create_by', $input['users'])
										->where('created_at','>=', $input['dateFrom'])
										->where('created_at','<=', $input['dateTo'])
										->orderBy('sales_orders.created_at','desc')->get();
		}else{
			
			$saleOrders = SaleOrder::where('sales_orders.is_active', 1)
										->where('sales_orders.is_book',0)
										->where('created_at','>=', $input['dateFrom'])
										->where('created_at','<=', $input['dateTo'])
										->orderBy('sales_orders.created_at','desc')->get();
		}
		
		return Response::json($saleOrders);
		*/
	}

}
