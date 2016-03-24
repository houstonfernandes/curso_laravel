@extends('admin.template')

@section('content')
    <h1>Produtos</h1>

    <a class='btn btn-primary' href="{{ route('admin.products.create') }}">Novo</a>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <a class='btn btn-primary' href="{{route('admin.products.edit',['id' => $product->id])}}"> editar</a>
                    <a class='btn btn-primary' href="{{route('admin.products_images.index',['id' => $product->id])}}"> imagens</a>
                    <a class='btn btn-primary' href="{{route('admin.products.delete',['id' => $product->id])}}"> deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="pages">
        {!! $products->render() !!}
    </div>
@endsection