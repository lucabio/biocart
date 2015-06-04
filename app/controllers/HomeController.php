<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        $products = Product::all();
        //var_dump(Session::all());
		return View::make('home/index',array('products'=>$products));
	}

    public function indexShop(){
        //var_dump(Session::all());
        return View::make('shop/index');
    }

    public function userDetails(){
        return View::make('shop/user_details');
    }
}
