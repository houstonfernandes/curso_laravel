@extends('app')
@section('content')

    <div class="container">
        <h1>Categories</h1>

        <a class='btn btn-primary' href="{{ route('admin.categories.create') }}">Create</a>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td><a class='btn btn-primary' href="{{route('admin.categories.edit',['id' => $category->id])}}"> edit</a></td>
                <td><a class='btn btn-primary' href="{{route('admin.categories.delete',['id' => $category->id])}}"> delete</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@endsection