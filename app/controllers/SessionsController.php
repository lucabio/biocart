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

    /**
     * Main funcion for cart
     * this function ad product ad update the array with the quantity
     * passed in input form
     */
    public function addProduct(){
        if(Input::has('product_id')){
            $prod = Product::find(Input::get('product_id'));

            if (Session::has('items')) {
                Session::push('items', [
                    'item_id' => $prod->id,
                    'item_quantity' => Input::get('quantity'),
                    'item_price'=>$prod->price,
                    'item_name'=>$prod->name,
                    'item_brand'=>$prod->brand

                ]);
                $array = Session::get('items');
                $total = array();
                $name =  array();
                $brand =  array();

                foreach ($array as $key => $value) {

                    $id = $value['item_id'];
                    $quantity = $value['item_quantity'];
                    $_name = $value['item_name'];
                    $_brand = $value['item_brand'];

                    if (!isset($total[$id])) {
                        $total[$id] = 0;
                    }

                    $total[$id] += $quantity;
                    $name[$id]  = $_name;
                    $brand[$id] = $_brand;

                    //echo $total[$id];
                }
                $items = array();

                foreach($total as $item_id => $item_quantity) {
                    $_curr_prod = Product::find($item_id);
                    $items[] = array(
                        'item_id' => $item_id,
                        'item_quantity' => $item_quantity,
                        'item_price'=>$_curr_prod->price * $item_quantity,
                        'item_name'=>$name[$item_id],
                        'item_brand'=>$brand[$item_id]
                    );
                }

                Session::put('items', $items);
            } else {
                Session::put('items', [
                    0 => [
                        'item_id' => $prod->id,
                        'item_quantity' => Input::get('quantity'),
                        'item_price'=>$prod->price,
                        'item_name'=>$prod->name,
                        'item_brand'=>$prod->brand
                    ]
                ]);
            }
        }
        return Redirect::action('HomeController@index');
    }

    /**
     * Update Quantity
     * update only the items array
     */
    public function updateQuantityProduct(){
        if(Input::has('product_id')){
            $prod = Product::find(Input::get('product_id'));

            if (Session::has('items')) {
                $array = Session::get('items');
                foreach($array as $key => $value){
                    if($value['item_id']==Input::get('product_id')){

                        Session::put('items.'.$key, [
                                'item_id' => $prod->id,
                                'item_quantity' => Input::get('quantity'),
                                'item_price'=>$prod->price * Input::get('quantity'),
                                'item_name'=>$prod->name,
                                'item_brand'=>$prod->brand
                        ]);
                    }
                }
                return Redirect::action('HomeController@indexShop');
            }
        }
    }

    public function emptyCart(){
        if(Session::has('items')){
            Session::forget('items');
        }
        return Redirect::action('HomeController@index');
    }

    public function removeProduct($id){
        if(Session::has('items')){
            $array = Session::get('items');
            foreach($array as $key => $value){
                if($value['item_id']==$id){
                    Session::forget('items.'.$key);
                }
            }
        }

        if(count(Session::get('items'))===0){
            Session::forget('items');
        }
        return Redirect::action('HomeController@indexShop');
    }
}