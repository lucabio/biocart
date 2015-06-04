<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luca
 * Date: 04/06/15
 * Time: 15:02
 */
class UserController extends BaseController {
    /**
     * Store User
     * set only address and shipping_address
     */
    public function store(){
        $validation = Validator::make(Input::all(),
            [
                'address'=>'required',
                'shipping_address'=>'required',
            ]
        );

        if($validation->fails()){
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }

        $user = User::find(Auth::id());
        $user->address = Input::get('address');
        $user->shipping_address = Input::get('shipping_address');
        $user->save();

        $items = Session::get('items');
        $total_price = Product::getTotalInCart();
        Session::forget('items');

        return View::make('shop/order_complete',array('user'=>$user,'items'=>$items,'total_price'=>$total_price));
    }
}