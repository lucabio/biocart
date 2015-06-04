@extends('layouts.default')
@section('content')
<div id="content">
    @if(Session::get('flash_messages'))

    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        {{ Session::get('flash_messages') }}
    </div>
    @endif
    <article class="post">
        <div class="tab-content">
        @foreach($products as $product)
            {{Form::open(array('action' => array('SessionsController@addProduct')))}}
            <div class="form-group">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                {{ HTML::image('images/products/'.$product->image,null,array('width' => 90 , 'height' => 150)); }}
                                <h2>{{$product->price}} &#8364;</h2>
                                <p>{{$product->name}} / {{$product->brand}}</p>
                                <p>Quantity : {{Form::number('quantity','1',array('min'=>0))}}</p>
                                {{Form::submit('Add to cart',array('class'=>'btn btn-defaul'))}}
                                {{Form::hidden('product_id',$product->id)}}
                                <!--<a href="{{ URL::to('add/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        @endforeach
        <div>
    </article> <!-- /post  -->
</div> <!-- #content -->
@stop