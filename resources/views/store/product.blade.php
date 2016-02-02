@extends('store.template')

@section('categories')
    @include('store._categories')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <h2 class="title text-center">{{$product->name}}</h2>
        <div class="col-sm-3">
                @if(count($product->images))
                    <img src="{{url('uploads/' .$product->images->first()->id . '.' . $product->images->first()->extension) }}" alt="" width="200" />
                @else
                    <img src="{{url('images/no-img.jpg')}}" alt="" width="300" />
                @endif
        </div>
        <div class="col-sm-9">
            <p> {{$product->name}} </p>
            <p>{{$product->description}}</p>
            <h2>R$ {{$product->price}} </h2>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
        </div>
    </div>
@stop