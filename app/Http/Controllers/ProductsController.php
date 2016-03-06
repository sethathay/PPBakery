<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Product;
use Input;
use Response;
use Validator;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index()
    {
    	$products = Product::where('is_active', 1)->orderBy('updated_at','desc')->simplePaginate(12);
        $pgroups = DB::table('pgroups')->lists('name', 'id');
        return view('products/index', compact('products','pgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pgroups = DB::table('pgroups')->where('is_active',1)->lists('name','id');
        return view('products/create',compact('pgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;

        if (Input::file('image')) {
            $destinationPath = 'img/product'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $data['photo'] = $fileName;
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        }

        $product->fill($data)->save();
        return Redirect::route('products.index');
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
        $product = Product::whereId($id)->first();
        $pgroups = DB::table('pgroups')->lists('name', 'id');
        return view('products/show', compact('product','pgroups'));
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
        $product = Product::find($id);
        $pgroups = DB::table('pgroups')->lists('name', 'id');
        return view('products/edit', compact('product','pgroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;

        if (Input::file('image')) {
            $destinationPath = 'img/product'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $data['photo'] = $fileName;
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        }

        unset($data['image']);

        $products->whereId(Input::get('id'))->update($data);
        return Redirect::route('products.index');
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
        $product = new Product;
        $product->where('id', $id)->update(['is_active' => 0]);
        return Redirect::route('products.index')->with('flash_notice', 'You are successfully delete!');
    }
    
    /**
     * Search product from POS
     * @param string $code
     */
    public function searchProdctByCode(){
    	$code = Input::get('codeNumber');
    	$products = Product::where('is_active', 1)->where('code', $code)->first();
    	return Response::json($products);
    }
}
