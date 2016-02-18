@extends('store.template')

@section('content')
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <h4>Order</h4>
    <p>Id: {{$order->id}}</p>
    <p>User: {{$order->user->name}}</p>
    <p>Email: {{$order->user->email}}</p>

    <section id="'order_items">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Qtd</td>
                        <td class="price">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td class="cart_description">
                            <h4>{{$item['name']}} </h4>
                            <p> Código: {{$item->id}}</p>
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

@section('js')
@stop