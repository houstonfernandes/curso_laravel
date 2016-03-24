@extends('admin.template')

@section('content')
    <h1>Categorias</h1>

    <a class='btn btn-primary' href="{{ route('admin.categories.create') }}">Nova</a>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a class='btn btn-primary' href="{{route('admin.categories.edit',['id' => $category->id])}}"> Editar</a>
                <a class='btn btn-primary' href="{{route('admin.categories.delete',['id' => $category->id])}}"> Deletar</a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <div id="page">
        {!! $categories->render() !!}
    </div>
@endsection