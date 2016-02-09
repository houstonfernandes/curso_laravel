@extends('store.template')

@section('content')
    <section id="'cart_items">
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
                            {{$item['qtd']}}
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"> R$ {{number_format($item['price'] * $item['qtd'], 2,',','.')  }}</p>
                        </td>
                        <td class="cart_delete">

                            <a href ="#form_edit" class="btn cart_quantity_button"  data-toggle="modal" data-item_id="{{$k}}" data-item_name="{{$item['name']}}" data-item_price="{{$item['price']}}" data-item_qtd="{{$item['qtd']}}">Editar</a>
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
                                <a href="#" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id='form_edit' class="modal fade" tabindex="-1" role="dialog">
            <input type="hidden" id="id_product">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar item</h4>
                    </div>
                    <div class="modal-body">
                        <div class='col-sm-12'>
                            Produto: <span id="edit_name"></span>
                        </div>
                        <div class='col-sm-6'>
                            Valor unitario: R$ <span id="edit_price"></span>
                        </div>
                        <div class="col-sm-6">
                            Quantidade: <input type="number" data-id='123' pattern="[0-9]+" min='0' id="edit_qtd">
                        </div>
                        <hr>
                        <div class="col-sm-12 right">
                            <h4>
                                Total: R$ <span id="edit_price_total"></span>
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btConfirm" url="{{route('store.cart.edit',['id'=>-1,'qtd'=>-2])}}">Confirmar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>

@stop

@section('js')
    <script type="application/javascript" src="{{url('js/store/cart_edit.js')}}"></script>
@stop