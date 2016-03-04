@extends('admin.template')

@section('content')
    <h1>Usuários</h1>

    <a class='btn btn-primary' href="{{ route('admin.products.create') }}">Create</a>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->endereco}}</td>
                <td>{{$user->numero}}</td>
                <td>{{$user->complemento}}</td>
                <td>{{$user->bairro}}</td>
                <td>{{$user->cidade}}</td>
                <td>{{$user->uf}}</td>
                <td>{{$user->cep}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="pages">
        {!! $users->render() !!}
    </div>
@endsection