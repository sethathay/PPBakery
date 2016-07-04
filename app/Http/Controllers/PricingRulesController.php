<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\PricingRule;
use App\Product;
use App\Customer;
use Input;
use DB;

class PricingRulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Index of sections refer as expense group
        $price = PricingRule::select('pricing_rules.*', 'products.code AS pro_code', 'products.name AS pro_name', 'customers.firstname AS cus_name')->join('customers', 'customers.id','=','pricing_rules.customer_id')->
							  join('products', 'products.id','=','pricing_rules.product_id')->where('pricing_rules.is_active', 1)->get();
        $prices = json_encode($price);
        return view('pricingRules/index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //New Group Expenses
		$customers = DB::table('customers')->where('is_active','1')->lists('firstname','id');
		$products = DB::table('products')->where('is_active','1')->orderBy(DB::raw('CONVERT(SUBSTRING(code, LOCATE("-", code) + 1), SIGNED INTEGER)'),'asc')->lists(DB::raw('CONCAT(products.code, " -- ", products.name) AS name'),'products.id');
		
        return view('pricingRules/create',compact('customers', 'products'));
    }
	
	public function getProductPrice(Request $request){
		$product_id = $request->get('product_id');
		$price = Product::select("price")->whereId($product_id)->first();		
		echo $price->price;exit;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricingRule $pric, Request $request)
    {
        //
        $pricing = $request->all();
		//dd($pricing);
        $pricing['created_by']    = \Auth::user()->id;
        $pricing['updated_by']    = \Auth::user()->id;
        $pricing['is_active']    = 1;
        $pric->fill($pricing)->save();
				
        return Redirect::route('pricingRules.index');
        //return view('pricingRules/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pric = PricingRule::whereId($id)->first();
		$customers = DB::table('customers')->where('is_active','1')->lists('firstname','id');
		$products = DB::table('products')->where('is_active','1')->orderBy(DB::raw('CONVERT(SUBSTRING(code, LOCATE("-", code) + 1), SIGNED INTEGER)'),'asc')->lists(DB::raw('CONCAT(products.code, " -- ", products.name) AS name'),'products.id');
		
        $pric->updated_at = $pric->updated_at->timezone('Asia/Phnom_Penh');
        return view('pricingRules/show', compact('pric','customers', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pricing = PricingRule::find($id);
		$customers = DB::table('customers')->where('is_active','1')->lists('firstname','id');
		$products = DB::table('products')->where('is_active','1')->orderBy(DB::raw('CONVERT(SUBSTRING(code, LOCATE("-", code) + 1), SIGNED INTEGER)'),'asc')->lists(DB::raw('CONCAT(products.code, " -- ", products.name) AS name'),'products.id');
		
        return view('pricingRules/edit', compact('pricing','customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricingRule $pric, Request $request)
    {
        //
        $pricing = $request->all();
        unset($pricing['_token']);
        $pric['created_by']    = \Auth::user()->id;
        $pric['updated_by']    = \Auth::user()->id;
        $pric['is_active']    = 1;
        $pric->whereId(Input::get('id'))->update($pricing);
        return Redirect::route('pricingRules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pric = new PricingRule;
        $pric->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('pricingRules.index')->with('flash_notice', 'You are successfully delete!');
    }
}
