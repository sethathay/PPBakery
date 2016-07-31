<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function(){
	/*
	$data = [
		'title' => 'Test Send The Email',
		'Content' => 'Body Email!!!'
	];
	Mail::send('/layout/index', $data, function($ms){
		$ms->to('setha.thay@workevolve.com', 'Setha')->subject("Hello Phou Lin");
	});
	*/
	
	if ( Auth::check()) // use Auth::check instead of Auth::user
	{
		if(Session::get('group_id') == 1){
			return View::make('/layout/dashboard')->with('flash_notice', 'You are already logged in!');
		}else{
			return View::make('/layout/pos');
		}
	} else{
		return View::make('/layout/index');
	}
});

Route::get('/dashboard', array('as' => 'dashboard', function () {
	if ( Auth::check() ) // use Auth::check instead of Auth::user
	{
		return View::make('/layout/dashboard');
	} else{
		return View::make('/layout/index');
	}
}));

Route::get('/pos', array('as' => 'pos', function () {
	if ( Auth::check() ) // use Auth::check instead of Auth::user
	{
		return View::make('/layout/pos');
	} else{
		return View::make('/layout/index');
	}	
}));

Route::get('users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('users/create', 'UsersController@create');
Route::get('users/show/{id}', 'UsersController@show');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('users/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
Route::get('users/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

Route::post('users/doLogin', ['as' => 'users.doLogin', 'uses' => 'UsersController@doLogin']);
Route::get('users/login', array('as' => 'users.login', function () { }));
Route::get('users/logout', 'UsersController@logout');

//Route::resource('users', 'UsersController');
Route::get('user_sale_logs/index', ['as' => 'user_sale_logs.index', 'uses' => 'UserSaleLogsController@index']);
Route::get('user_sale_logs/create', 'UserSaleLogsController@create');
Route::get('user_sale_logs/edit/{id}', 'UserSaleLogsController@edit');
Route::post('user_sale_logs/update', 'UserSaleLogsController@update');

// Route of products by Thay Setha
Route::post('products/searchProdctByCode', ['as' => 'products.searchProdctByCode', 'uses' => 'ProductsController@searchProdctByCode']);
// Route of products by Phou Lin
Route::post('products/checkProductExist', ['as' => 'products.checkProductExist', 'uses' => 'ProductsController@checkProductExist']);

Route::post('products/searchProdctByCodeWidthDiscount', ['as' => 'products.searchProdctByCodeWidthDiscount', 'uses' => 'ProductsController@searchProdctByCodeWidthDiscount']);

//Route of products by Thay Setha
Route::resource('products','ProductsController');


//Route of inventories by Phou Lin
Route::get('inventories/index','InventoriesController@index');
Route::post('inventories/save','InventoriesController@save');
Route::post('inventories/searchInventory', ['as' => 'inventories.searchInventory', 'uses' => 'inventoriesController@searchInventory']);

//Route of sections for expense group by Thay Setha
Route::get('sections/index', ['as' => 'sections.index', 'uses' => 'SectionsController@index']);
Route::get('sections/create', 'SectionsController@create');
Route::post('sections/store', ['as' => 'sections.store', 'uses' => 'SectionsController@store']);
Route::get('sections/show/{id}', 'SectionsController@show');
Route::get('sections/edit/{id}', ['as' => 'sections.edit', 'uses' => 'SectionsController@edit']);
Route::post('sections/update', ['as' => 'sections.update', 'uses' => 'SectionsController@update']);
Route::get('sections/destroy/{id}', ['as' => 'sections.destroy', 'uses' => 'SectionsController@destroy']);


Route::get('uomexpenses/index', ['as' => 'uomexpenses.index', 'uses' => 'UomExpensesController@index']);
Route::get('uomexpenses/create', ['as' => 'uomexpenses.create', 'uses' => 'UomExpensesController@create']);
Route::post('uomexpenses/store', ['as' => 'uomexpenses.store', 'uses' => 'UomExpensesController@store']);
Route::get('uomexpenses/show/{id}', 'UomExpensesController@show');
Route::get('uomexpenses/edit/{id}', ['as' => 'uomexpenses.edit', 'uses' => 'UomExpensesController@edit']);
Route::post('uomexpenses/update', ['as' => 'uomexpenses.update', 'uses' => 'UomExpensesController@update']);
Route::get('uomexpenses/destroy/{id}', ['as' => 'uomexpenses.destroy', 'uses' => 'UomExpensesController@destroy']);

// Route for pos
Route::post('pos/sale', 'PosController@sale');
Route::get('pos/print/{id}/{footer}', 'PosController@printReceipt');
/*
Route::get('/printReceipt', array('as' => 'printReceipt', function () {
	return View::make('/layout/printReceipt');
}));
*/

//Route of services for daily expense input by Thay Setha
Route::get('saleOrders/index', ['as' => 'saleOrders.index', 'uses' => 'SaleOrdersController@index']);
Route::get('saleOrders/edit/{id}', ['as' => 'saleOrders.edit', 'uses' => 'SaleOrdersController@edit']);
Route::get('saleOrders/destroy/{id}','SaleOrdersController@destroy');
Route::post('saleOrders/sale', 'SaleOrdersController@sale');
Route::get('saleOrders/print/{id}/{footer}', 'SaleOrdersController@printReceipt');
Route::get('saleOrders/create', ['as' => 'saleOrders.create', 'uses' => 'SaleOrdersController@create']);
Route::post('saleOrders/store', 'SaleOrdersController@store');
Route::get('saleOrders/ajax', 'SaleOrdersController@ajax');
Route::get('saleOrders/remain', 'SaleOrdersController@remain');
Route::get('saleOrders/ajaxRemain', 'SaleOrdersController@ajaxRemain');
Route::get('saleOrders/remainPay/{id}', 'SaleOrdersController@remainPay');
Route::post('saleOrders/paidRemain/', 'SaleOrdersController@paidRemain');


Route::get('bookers/index', ['as' => 'bookers.index', 'uses' => 'BookersController@index']);
Route::get('bookers/book', ['as' => 'bookers.book', 'uses' => 'BookersController@book']);
Route::post('bookers/storeBook', 'BookersController@storeBook');
Route::get('bookers/edit/{id}', ['as' => 'bookers.edit', 'uses' => 'BookersController@edit']);
Route::post('bookers/sale', 'BookersController@sale');
Route::post('bookers/pay', 'BookersController@pay');
Route::get('bookers/print/{id}/{footer}', 'BookersController@printReceipt');
Route::get('bookers/printPaid/{id}/{footer}', 'BookersController@printPreviewReceipt');


Route::get('reports/reportInvoice', 'ReportsController@index');
Route::post('reports/selectReport', 'ReportsController@selectReport');
Route::get('reports/reportProduct', 'ReportsController@reportProduct');
Route::post('reports/selectReportByProduct', 'ReportsController@selectReportByProduct');
Route::get('reports/reportExpense', 'ReportsController@reportExpense');
Route::post('reports/selectReportByExpense', 'ReportsController@selectReportByExpense');
Route::get('reports/reportSaleLog', 'ReportsController@reportSaleLog');
Route::post('reports/selectReportSaleLog', 'ReportsController@selectReportSaleLog');

Route::get('pricingRules/index', ['as' => 'pricingRules.index', 'uses' => 'PricingRulesController@index']);
Route::get('pricingRules/create', 'PricingRulesController@create');
Route::post('pricingRules/getProductPrice', 'PricingRulesController@getProductPrice');
Route::post('pricingRules/store', 'PricingRulesController@store');
Route::get('pricingRules/show/{id}', 'PricingRulesController@show');
Route::get('pricingRules/edit/{id}', ['as' => 'pricingRules.edit', 'uses' => 'PricingRulesController@edit']);
Route::post('pricingRules/update', ['as' => 'pricingRules.update', 'uses' => 'PricingRulesController@update']);
Route::get('pricingRules/destroy/{id}', ['as' => 'pricingRules.destroy', 'uses' => 'PricingRulesController@destroy']);

//Route of services for daily expense input by Thay Setha
//Route::resource('services','ServicesController');
Route::get('services/index', 'ServicesController@index');
Route::get('services/destroy/{id}', 'ServicesController@destroy');
Route::get('services/expense', 'ServicesController@expense');
Route::post('services/addExpense', 'ServicesController@addExpense');
Route::get('services/create', 'ServicesController@create');

//Route of exchange rate by Thay Setha
Route::resource('exchangerates','ExchangeRatesController');

//Route of location by Thay Setha
Route::resource('locations','LocationsController');

//Route of uom by Thay Setha
Route::resource('uoms','UomsController');

//Route of uom conversion by Thay Setha
Route::resource('uomconversions','UomConversionsController');

//Route of product group by Thay Setha
Route::resource('pgroups','PGroupsController');

//Route of customer group by Thay Setha
Route::resource('cgroups','CGroupsController');

//Route of user group by Thay Setha
Route::resource('groups','GroupsController');

//Route of customer by Thay Setha
Route::resource('customers','CustomersController');

//Route of discount by Thay Setha
Route::resource('discounts','DiscountsController');