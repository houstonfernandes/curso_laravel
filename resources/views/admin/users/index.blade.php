@extends('app')

@section('content')
    <h1>Users</h1>

    <a class='btn btn-primary' href="{{ route('admin.products.create') }}">Create</a>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="pages">
        {!! $users->render() !!}
    </div>
@endsection