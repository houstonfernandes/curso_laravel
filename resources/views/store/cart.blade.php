@extends('store.template')

@section('content')
    <section id="'cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->all() as $k=>$item)
                        <tr>
                            <td class="product">
                                <a href = "{{ route('store.product', $k) }}">
                                    <img src="{{$item['imgPath']}}" width='50px'>
                                </a>
                            </td>
                            <td class="cart_description"> <h4>{{$item['name']}} </h4>
                                <p> Codigo: {{$k}}</p>
                            </td>
                            <td class="'cart_price">
                                R$ {{$item['price']}}
                            </td>
                            <td class="quantity">
                                {{$item['qtd']}}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> RS {{$item['price'] * $item['qtd']  }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{route('store.cart.delete', ['id'=> $k])}}" class="cart_quantity_delete">Delete</a>
                            </td>

                        </tr>
                            @endforeach
                        <tr>
                            <td colspan='6' style='text-align:right;margin-right:20px;'> Total: R$ {{$cart->getTotal()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop