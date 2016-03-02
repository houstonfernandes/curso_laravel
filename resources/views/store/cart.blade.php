@extends('store.template')

@section('content')
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

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
                        @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href = "{{ route('store.product', $k) }}">
                                    <img src="{{$item['imgPath']}}" width='50px'>
                                </a>
                            </td>
                            <td class="cart_description"> <h4>{{$item['name']}} </h4>
                                <p> Código: {{$k}}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{number_format($item['price'], 2,',','.')}}
                            </td>
                            <td class="cart_quantity">
                                {!! Form::open(['route'=>['store.cart.update', $k], 'method'=>'put']) !!}
                                <div class="input-group" style="width: 120px">
                                    {!! Form::text('qtd', $item['qtd'], ['class'=>'form-control','pattern'=>'[0-9]+', 'min'=>'0', 'required'=>'required']) !!}
                                    <span class="input-group-btn">
                                            {!! Form::submit('Alterar', ['class'=>'btn btn-default']) !!}
                                    </span>
                                </div><!-- /input-group -->
                                {!! Form::close() !!}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{number_format($item['price'] * $item['qtd'], 2,',','.')  }}</p>
                            </td>

                            <td class="cart_delete">
                                <a href="{{route('store.cart.delete', ['id'=> $k])}}" class="btn cart_quatity_delete">Excluir</a>
                            </td>

                        </tr>
                        @empty
                            <tr>
                                <td colspan='6' >
                                    <h4>O Carrinho está vazio.</h4>
                                </td>
                            </tr>
                        @endforelse

                        <tr class="cart_menu">
                            <td colspan='6'>
                                <div class="pull-right">
                                    <span style="margin-right: 30px;">
                                        TOTAL: R$ {{$cart->getTotal()}}
                                    </span>
                                    <a href="{{route('store.checkout.place')}}" class="btn btn-success">Fechar a conta</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop

@section('js')
@stop
