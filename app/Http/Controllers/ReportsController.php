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
use App\SaleOrderReceipt;
use App\UserSaleLog;
use App\Product;
use App\Pgroup;
use App\Datatable\SaleOrderAjax;
use App\Datatable\SaleOrderReportAjax;
use App\Datatable\ExpenseAjax;
use App\Section;
use App\Service;
use App\Customer;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::select(DB::raw('CONCAT(first_name, " ", last_name) AS name'),'users.id')->join('user_groups', 'user_id','=','users.id')->where('users.is_active', 1)->orderBy('first_name', 'asc')->lists('name','users.id');
		
        return view('reports.index',compact('users'));
    }
	
	public function selectReport(Request $request, SaleOrderReportAjax $saleOrder){
		
		$input = $request->all();
		$table     = "sales_order_receipts INNER JOIN users ON users.id=sales_order_receipts.created_by";
		$table    .= " INNER JOIN exchange_rates ON exchange_rates.id=sales_order_receipts.exchange_rate_id";		
		$table    .= " LEFT JOIN sales_orders ON sales_orders.id=sales_order_receipts.sales_order_id";				
		$columns   = array('sales_orders.id','sales_order_receipts.created_at', 'CONCAT(last_name, " ",first_name)', 'so_code', 'discount_riel', 'discount_us', 'IF(sales_orders.balance<0 AND amount_kh,amount_kh+sales_orders.balance,amount_kh)', 'IF(sales_orders.balance<0 AND amount_us>0,amount_us+sales_orders.balance/riel,amount_us)', 'IF(sales_orders.balance>0,sales_orders.balance,0)');
		
		$condition = "";
		$condition .= " sales_orders.is_active = 1";
		
		if(isset($input['users']) && $input['users'] != ""){
			$condition .= " AND sales_order_receipts.created_by =". $input['users'];
		}
		//$condition .= " AND sales_order_receipts.created_at BETWEEN '". $input['dateFrom']."' AND '". $input['dateTo']."'";
		$condition .= " AND SUBSTRING(sales_order_receipts.created_at,1,10) BETWEEN '". $input['dateFrom']."' AND '". $input['dateTo']."'";		
		$condition .= " GROUP BY sales_order_receipts.id";
		return $saleOrder->getResourceReport($table, $columns, $condition, 'sales_order_receipts.id');
			
	}
	
	
    public function reportProduct()
    {
		$users = User::select(DB::raw('CONCAT(first_name, " ", last_name) AS name'),'users.id')->join('user_groups', 'user_id','=','users.id')->where('users.is_active', 1)->orderBy('first_name', 'asc')->lists('name','users.id');
		
        return view('reports.reportProduct',compact('users'));
    }
	
	public function selectReportByProduct(Request $request, SaleOrderAjax $saleOrder){
		$input = $request->all();
		
		if(isset($input['users']) && $input['users'] != ""){
			
			$saleOrderDetail = SaleOrderDetail::select('pgroups.name AS pgroup_name','products.name AS pro_name', 'unit_price', 'products.code',DB::raw("(SELECT CONCAT(SUM(qty),'|',SUM(discount_price_riel),'|',SUM(total_price_riel)) FROM sales_order_details INNER JOIN sales_orders ON sales_orders.id=sales_order_details.sales_order_id WHERE product_id=products.id AND sales_orders.created_by = ".$input['users']." AND DATE(sales_order_details.created_at) BETWEEN '".$input['dateFrom']."' AND '".$input['dateTo']."') AS group_amount"))->
												join('sales_orders', 'sales_orders.id','=','sales_order_details.sales_order_id')->
												join('users', 'users.id','=','sales_orders.created_by')->
												join('products', 'products.id','=','sales_order_details.product_id')->
												join('pgroups', 'pgroups.id','=','products.pgroup_id')->
												where('sales_orders.is_active',1)->
												where('sales_orders.is_book',0)->
												where('sales_orders.created_by',$input['users'])->
												whereBetween(DB::raw('DATE(sales_orders.created_at)'), array($input['dateFrom'], $input['dateTo']))->
												orderBy('pgroup_name')->
												groupBy('product_id')->get();
		}else{
			
			$saleOrderDetail = SaleOrderDetail::select('pgroups.name AS pgroup_name','products.name AS pro_name', 'unit_price', 'products.code', DB::raw("(SELECT CONCAT(SUM(qty),'|',SUM(discount_price_riel),'|',SUM(total_price_riel)) FROM sales_order_details WHERE product_id=products.id AND DATE(sales_order_details.created_at) BETWEEN '".$input['dateFrom']."' AND '".$input['dateTo']."') AS group_amount"))->
												join('sales_orders', 'sales_orders.id','=','sales_order_details.sales_order_id')->
												join('users', 'users.id','=','sales_orders.created_by')->
												join('products', 'products.id','=','sales_order_details.product_id')->
												join('pgroups', 'pgroups.id','=','products.pgroup_id')->
												where('sales_orders.is_active',1)->
												where('sales_orders.is_book',0)->
												whereBetween(DB::raw('DATE(sales_orders.created_at)'), array($input['dateFrom'],$input['dateTo']))->
												orderBy('pgroup_name')->
												groupBy('product_id')->get();
		}
		return View::make('reports.reportProductResult')->with('saleOrderDetail', $saleOrderDetail);
		
	}
	
	function reportExpense(){
		
        return view('reports.reportExpense');
	}	
	
	public function selectReportByExpense(Request $request, ExpenseAjax $expense){
		$input = $request->all();
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$services = Service::select('sections.name AS section_name', 'uom_expenses.name AS expense_uom_name', 'services.*')->
												leftJoin('sections', 'sections.id','=','services.section_id')->
												leftJoin('uom_expenses', 'uom_expenses.id','=','services.uom_expense_id')->
												where('sections.is_active',1)->
												where('sections.id','!=', '141')->where('sections.id','!=', '142')->
												whereBetween('services.expense_date', array($input['dateFrom'],$input['dateTo']))->
												orderBy('services.expense_date')->get();
		return View::make('reports.reportExpenseResult')->with('services', $services)->with('exchangerate', $exchangerate);
	}
	
	function reportExpenseByItem(){
		
        return view('reports.reportExpenseByItem');
	}
	
	public function selectReportByExpenseByItem(Request $request, ExpenseAjax $expense){
		$input = $request->all();
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$services = Service::select('sections.name AS section_name', 'services.*', 
								DB::raw('(SELECT SUM(riel_price*qty)) as riel'),									
								DB::raw('(SELECT SUM(dollar_price*qty)) as dollar'))->
							leftJoin('sections', 'sections.id','=','services.section_id')->
							where('sections.is_active',1)->
							where('sections.id','!=', '141')->where('sections.id','!=', '142')->
							whereBetween('services.expense_date', array($input['dateFrom'],$input['dateTo']))->
							orderBy('services.expense_date')->
							groupBy('sections.id')->get();
		return View::make('reports.reportExpenseByItemResult')->with('services', $services)->with('exchangerate', $exchangerate);
	}
			
	function reportGroupExpense(){
		
        $sectionGroups = DB::table('section_groups')->get();
        return view('reports.reportGroupExpense', compact('sectionGroups'));
	}	
	
	public function selectReportByGroupExpense(Request $request, ExpenseAjax $expense){
		$sections = $services = null;
		
		$input = $request->all();
		//Get last exchange rate
		//$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		//Get all section grorups from view.
		$sectionGroups = explode(",",$input['sectionGroup']);
		
		if(count($sectionGroups) > 0 ){
			// Loop to find sections in each section group.
			foreach($sectionGroups as $sectionGroup){
				$sections[] = Section::select('id')->where('section_group_id', $sectionGroup)->get();
			}
			
			for($i=0; $i<count($sections); $i++){
				$services[] = Service::select(
									DB::raw('(SELECT SUM(riel_price*qty)) as riel'),									
									DB::raw('(SELECT SUM(dollar_price*qty)) as dollar')
								)
								->whereIn('section_id', $sections[$i])
								->whereBetween('services.expense_date', array($input['dateFrom'],$input['dateTo']))->first();
			}
			if(!empty($services)){				
				$sectionGroups = DB::table('section_groups')->get();
			}
		}
		
		return View::make('reports.reportGroupExpenseResult')->with('services', $services)->with('sectionGroups', $sectionGroups);
	}
	
	function reportTotalCash(){
		return view('reports.reportTotalCash');
	}
	
	function selectTotalCash(Request $request){
		$input = $request->all();
		$services = Service::select(
							DB::raw('(SELECT SUM(riel_price*qty)) as riel'),									
							DB::raw('(SELECT SUM(dollar_price*qty)) as dollar')
						)
						->whereBetween('services.expense_date', array($input['dateFrom'],$input['dateTo']))->first();
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$totalUserInput = UserSaleLog::select(DB::raw('SUM(total_kh) AS total_kh, SUM(total_us) AS total_us'))->whereBetween('user_sale_logs.dates', array($input['dateFrom'],$input['dateTo']))->first();
        
		return View::make('reports.reportTotalCashResult')->with('services', $services)->with('totalUserInput', $totalUserInput);
	}
	
	function reportByCustomer(){
		return view('reports.reportByCustomer');
	}
	
	function selectByCustomer(Request $request){
		$input = $request->all();
		
		$salsOrders = Customer::select(DB::raw('SUM(total_amount_riel) AS riel, SUM(total_amount_us) AS dollar'), 'customers.firstname')
						->join('sales_orders', 'sales_orders.customer_id','=','customers.id')
						->whereBetween(DB::raw('DATE(sales_orders.order_date)'), array($input['dateFrom'], $input['dateTo']))
						->where('customers.is_active', 1)
						->where('sales_orders.is_active', 1)
						->groupBy('customers.id')
						->get();
		
		return View::make('reports.reportByCustomerResult')->with('salsOrders', $salsOrders);
	}
		
    public function reportSaleLog()
    {
		return view('reports.reportSaleLog');
    }
	
	public function selectReportSaleLog(Request $request){
		$input = $request->all();
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$userSaleLog = UserSaleLog::select('users.username AS u_name', 'user_sale_logs.dates','user_sale_logs.time_in', 'user_sale_logs.time_out', 'user_sale_logs.auto_time_out', 'user_sale_logs.total_kh', 'user_sale_logs.total_us', 
									DB::raw("(SELECT SUM(IF(sales_orders.balance<0 AND amount_kh,amount_kh+sales_orders.balance,amount_kh)+IF(sales_orders.balance<0 AND amount_us>0,amount_us+sales_orders.balance/riel,amount_us)) FROM sales_order_receipts 
											  INNER JOIN exchange_rates ON exchange_rates.id=sales_order_receipts.exchange_rate_id
											  LEFT JOIN sales_orders ON sales_orders.id=sales_order_receipts.sales_order_id WHERE DATE(sales_order_receipts.created_at) = dates AND sales_order_receipts.created_by=users.id AND TIME(sales_order_receipts.created_at) BETWEEN time_in AND time_out) AS sy_total"))->
									join('users', 'users.id','=','user_sale_logs.user_id')->
									where(DB::raw("DATE(dates)"), '=', $input['dates'])->
									where(function ($query) {
										$query->where('user_sale_logs.total_kh', '>', 0)
											  ->orWhere('user_sale_logs.total_us', '>', 0);
									})->
									orderBy('u_name')->get();
									
		$totalSale = 	SaleOrderReceipt::select(DB::raw("SUM(IF(sales_orders.balance<0 AND amount_kh,amount_kh+sales_orders.balance,amount_kh)+IF(sales_orders.balance<0 AND amount_us>0,amount_us+sales_orders.balance/riel,amount_us)) as totalSale"))
						->join('exchange_rates', 'exchange_rates.id', '=', 'sales_order_receipts.exchange_rate_id')
						->leftJoin('sales_orders', 'sales_orders.id', '=', 'sales_order_receipts.sales_order_id')
						->where(DB::raw("DATE(sales_order_receipts.created_at)"), '=', $input['dates'])->first();
						
		return View::make('reports.reportSaleLogResult')->with('userSaleLog', $userSaleLog)->with('exchangerate', $exchangerate)->with('totalSale', $totalSale);
		
	}

}
