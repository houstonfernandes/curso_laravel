@extends('store.template')

@section('content')

    <h3>Pedidos</h3>
    @foreach($orders as $order)
        <div class="destaque">
            <p>Número: {{$order->id}} </p>
            <p>Status: {{$order->statusName()}}</p>
            <h4>Itens</h4>

            <section id="'order_items">
                <div class="table-responsive cart-info">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr class="cart-menu">
                                <td class="name">Nome</td>
                                <td class="price">Preço</td>
                                <td class="price">Qtd</td>
                                <td class="price">Total</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order->items as $item)
                            <tr>
                                <td class="cart_description">
                                    {{$item->product->id}} - {{$item->product->name}}
                                </td>
                                <td class="cart_price">
                                    R$ {{number_format($item->price, 2,',','.')}}
                                </td>
                                <td class="cart_quantity">
                                    {{$item->qtd}}
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"> R$ {{number_format($item->price * $item->qtd, 2,',','.')  }}</p>
                                </td>
                            </tr>
                            @endforeach

                            <tr class="cart_menu">
                                <td colspan='4'>
                                    <div class="pull-right">
                                        <h4>
                                            TOTAL: R$ {{number_format($order->total, 2,',','.')}}
                                        </h4>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    @endforeach
@stop

@section('css')
    <style>
        .destaque{
            background-color: #F2F2F2;
            border: 1px dashed #dff0d8;
        }
        .cart-menu{
            background-color: #000088;
            color:white;
        }
    </style>
@stop