@extends('layouts.default')
@section('content')
<div id="content">
    <div class="panel panel-success">
        <div class="panel-body">
            <b>Purchased Product</b>
            <ul class="list-group">
                @foreach($items as $item )

                <li class="list-group-item">{{$item['item_brand']}}/{{$item['item_name']}} <b>Qty:{{$item['item_quantity']}}</b></li>
                @endforeach
            </ul>

            <p><b>Total Price of Your Cart  :  {{$total_price}} &#8364;</b></p>

            <p><b>Your details :</b></p>

            <div>
                <label>Email : {{$user->email}}</label>
            </div>

            <div>
                <label>Username : {{$user->username}}</label>
            </div>

            <div>
                <label>Address : {{$user->address}}</label>
            </div>

            <div>
                <label>Shipping Address : {{$user->shipping_address}}</label>
            </div>

            <p><h3>Thank you for having tested my cart , I hope you enjoyed</h3> </p>
        </div>




    </div>
</div>
@stop