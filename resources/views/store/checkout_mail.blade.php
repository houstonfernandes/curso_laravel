@extends('store.template')

@section('content')
    <p> {{$order->user->name}}, obrigado por comprar na nossa loja.</p>

    <h3>Dados do pedido</h3>
        <p>Número: {{$order->id}}</p>
        <p> Status: {{$order->statusName()}}</p>
        <h4>Itens</h4>

        <section id="'order_items">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="price">Quantidade</td>
                        <td class="price">Total</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td class="cart_description">
                                 {{$item->product->id}} -
                                <h4>{{$item->product->name}} </h4>
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
                                    TOTAL: R$ {{$order->total}}
                                </h4>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </section>
@stop

@section('css')
    <style>
        .cart-menu{
            background-color: #000088;
            color:white;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@stop
@section('js')
    <script src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' type="application/javascript"></script>
@stop