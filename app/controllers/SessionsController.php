<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luca
 * Date: 26/03/15
 * Time: 11:55
 */
class SessionsController extends BaseController{
    //Setting Login
    public function store(){

        //$errors_login = new MessageBag; // initiate MessageBag
        $rules = array(
            'username'    => 'required', // make sure the email is an actual email
            'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::intended('/')
                ->withErrors($validation->messages()) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }else{

            $credentials = [
                'username'     => Input::get('username'),
                'password'  => Input::get('password')
            ];

            if(Auth::attempt($credentials))
                return Redirect::intended('/');

            return Redirect::intended('/')->with('flash_messages','Username or Password is incorrect!')->withInput(Input::except('password'));
        }
    }


    //logout
    public function destroy(){

        Auth::logout();

        return Redirect::action('HomeController@index');
    }

    //add element to cart
    public function addProduct($id){
        $prod = Product::find($id);

        if (Session::has('items')) {
            Session::push('items', [
                'item_id' => $prod->id,
                'item_quantity' => 1
            ]);
            $array = Session::get('items');
            $total = array(); //move outside foreach loop because we don't want to reset it

            foreach ($array as $key => $value) {

                $id = $value['item_id'];
                $quantity = $value['item_quantity'];

                if (!isset($total[$id])) {
                    $total[$id] = 0;
                }

                $total[$id] += $quantity;
                //echo $total[$id];
            }
            $items = array();

            foreach($total as $item_id => $item_quantity) {
                $items[] = array(
                    'item_id' => $item_id,
                    'item_quantity' => $item_quantity
                );
            }

            Session::put('items', $items);
        } else {
            Session::put('items', [
                0 => [
                    'item_id' => $prod->id,
                    'item_quantity' => 1,
                    'item_price'=>$prod->price
                ]
            ]);
        }
        var_dump(Session::all());
        //$products = Product::all();
        return Redirect::action('HomeController@index');
    }
}