@extends('store.template')

@section('categories')
    @include('store._categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($productsFeatured as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            @if(count($product->images))
                                <img src="{{url('uploads/' .$product->images->first()->id . '.' . $product->images->first()->extension) }}" alt="" width="200" />
                            @else
                                <img src="{{url('images/no-img.jpg')}}" alt="" width="200" />
                            @endif
                            <h2>R$ {{$product->price}} </h2>
                            <p> {{$product->name}} </p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{$product->price}} </h2>
                                <p> {{$product->name}} </p>
                                <a href="{{route('store.product', $product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @foreach($productsRecommended as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            @if(count($product->images))
                                <img src="{{url('uploads/' .$product->images->first()->id . '.' . $product->images->first()->extension) }}" alt="" width="200" />
                            @else
                                <img src="{{url('images/no-img.jpg')}}" alt="" width="200" />
                            @endif
                            <h2>R$ {{$product->price}} </h2>
                            <p> {{$product->name}} </p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{$product->price}} </h2>
                                <p> {{$product->name}} </p>
                                <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--recommended-->

    </div>
@stop