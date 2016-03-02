@extends('store.template')

@section('content')
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if ($cart == 'empty')
        @include('store.partial.categories')
        <h3>Carrinho de compras vazio!</h3>

    @else
        <h3>Pedido realizado com sucesso.</h3>
        <h4>Order</h4>
        <p>Id: {{$order->id}}</p>
        <p>User: {{$order->user->name}}</p>
        <p>Email: {{$order->user->email}}</p>
        <p>Situação: {{$order->statusName()}}</p>

    @endif

@stop

@section('js')
@stop