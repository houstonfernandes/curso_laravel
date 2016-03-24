@extends('admin.template')

@section('content')
    <h1>Imagens de produto - {{$product->name}}</h1>

    <a class='btn btn-primary' href="{{ route('admin.products_images.create', $product->id) }}">Nova Imagem</a>

    <table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Extensão</th>
        <th>Imagem</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    @forelse($product->images as $image)
        <tr>
            <td>{{$image->id}}</td>
            <td>{{$image->extension}}</td>
            <td><img src="{{ url('uploads/' . $image->id . '.' . $image->extension) }}" width = '80px'></td>
            <td>
                <a href="{{ route('admin.products_images.delete',['id' => $image->id]) }}" class="btn btn-primary">Deletar</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Nenhuma imagem encontrada.</td>
        </tr>

    @endforelse
    </tbody>
    </table>
    <div id="pages">
    </div>
@endsection