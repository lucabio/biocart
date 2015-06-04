@extends('layouts.default')
@section('content')
<div id="content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">USER DETAILS</h3>
        </div>
        <div class="panel-body">
            <b>Selected Product</b>
            <ul class="list-group">
            @foreach(Session::get('items') as $item )
                <li class="list-group-item">{{$item['item_brand']}}/{{$item['item_name']}} <b>Qty:{{$item['item_quantity']}}</b></li>
            @endforeach
            </ul>

            <p><b>Total Price of Your Cart  :  {{ Product::getTotalInCart() }}&#8364;</b></p>

            <p><b>Enter your home address and shipping address :</b></p>
            {{Form::open(array('action' => array('UserController@store')))}}
            <div>
                {{Form::label('address','Address')}}
                {{Form::input('text','address')}}
                {{ $errors->first('address') }}
            </div>
            <div>
                {{Form::label('shipping_address','Shipping Address')}}
                {{Form::input('text','shipping_address')}}
                {{ $errors->first('shipping_address') }}
            </div>
            <p>{{Form::submit('Proceed with order')}}</p>
            {{Form::close()}}
        </div>
    </div>
</div> <!-- #content -->
@stop
