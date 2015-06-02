@extends('layouts.default')
@section('content')
<div id="content">
    <article class="post">
    </article> <!-- /post  -->
    <article>
        <div class="tab-content">
        @foreach($products as $product)
            <div class="tab-pane fade active in">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                {{ HTML::image('images/products/'.$product->image,null,array('width' => 90 , 'height' => 150)); }}
                                <h2>{{$product->price}} &#8364;</h2>
                                <p>{{$product->name}} / {{$product->brand}}</p>
                                <a href="{{ URL::to('add/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
    </article> <!-- /post  -->

</div> <!-- #content -->
@stop