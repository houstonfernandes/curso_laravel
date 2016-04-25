@extends('store.template')

@section('content')

    <h3>Pedidos</h3>
    @forelse($orders as $order)
        <div class="destaque">
            <section id="'order_items">
                <div class="table-responsive cart-info">
                    <table class="table table-condensed table-hover table-border">
                        <thead>
                            <tr class="order-title">
                                <td>Número: {{$order->id}} </td>
                                <td>Data da compra: {{ date("d/m/Y h:i:s", strtotime($order->created_at)) }}</td>
                                <td colspan="2">Status: {{ $order->status ? "Aprovado" : "Pendente"}}</td>
                            </tr>
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
        @empty
        <p>
            Nenhum pedido encontrado.
        </p>

    @endforelse
@stop

@section('css')
    <style>
        .destaque{
            background-color: #F2F2F2;
            border: 1px dashed #dff0d8;
        }
        .order-title{
            background-color: #3C6C96;
            color:white;
        }
        .cart-menu{
            background-color: #99bad6;
            /*color:white;*/
        }
        .table-border{
            border: 1px dashed #3C6C96;
        }
    </style>
@stop