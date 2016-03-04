@extends('admin.template')

@section('content')
    <h1>Pedidos</h1>
    <div class="destaque">
        <section id="'order_items">

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Data compra</th>
                <th>Status</th>
                <th>Funções</th>
            </tr>
            </thead>
            <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->user->email}}</td>
                <td>{{ date("d/m/Y h:i:s", strtotime($order->created_at)) }}</td>
                <td>{{ $order->statusName() }}</td>
                <td>
                    <a class='btn btn-primary' href="{{route('admin.orders.view',['id' => $order->id])}}"> Exibir </a>
                </td>
            </tr>
            @empty
                <tr colspan="6">
                    Nenhum pedido encontrado.
                </tr>

            @endforelse
            </tbody>
        </table>
        </section>
    </div>

    <div id="page">
        {!! $orders->render() !!}
    </div>
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