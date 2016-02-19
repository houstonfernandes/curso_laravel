@extends('store.template')

@section('content')

    <h3>Pedidos</h3>
    @foreach($orders as $order)

        <p>Número: {{$order->id}} - status: {{$order->status}}</p>
        <h4>Itens</h4>

        <section id="'order_items">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
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
                                        TOTAL: R$ {{$order->total}}
                                    </h4>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
    @endforeach
@stop

@section('js')
@stop