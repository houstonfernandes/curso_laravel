@extends('store.template')
<h1>email de teste</h1>
@section('content')
    <p> USER, obrigado por comprar na nossa loja.</p>

    <h3>Dados do pedido</h3>
        <p>Número: </p>
        <p> Status: /p>
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

                    <tr class="cart_menu">
                        <td colspan='4'>
                            <div class="pull-right">
                                <h4>
                                    TOTAL: R$
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
@stop