@extends('layouts.default')
@section('content')
<div id="content">
    <article class="post">
    @if(Session::has('items'))
        @foreach(Session::get('items') as $item )
            {{ Form::open(array('action' => array('SessionsController@updateQuantityProduct'),'class'=>'form-inline')) }}
            <div class="form-group">
                <p><label>{{$item['item_name']}}</label>{{Form::number('quantity',$item['item_quantity'],array('min'=>1))}} <a href="{{URL::to('remove/'.$item['item_id'])}}">Remove</a></p>
            </div>
            {{Form::hidden('product_id',$item['item_id'])}}
            {{Form::hidden('in_shop',1)}}
            {{ Form::submit('Update Quantity',array('class'=>'btn btn-default'))}}
            {{ Form::close() }}
        @endforeach
        <p><b>Total Price of Your Cart  :  {{ Product::getTotalInCart() }}&#8364;</b></p>
        <p><a href="{{URL::to('shop/user_details')}}">Go to next step</a></p>
    @else
        <p>Your Cart is Empty</p>
    @endif
    </article>
</div>
@stop
