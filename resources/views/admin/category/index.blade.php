@extends('app')
@section('content')

    <div class="container">
        <h1>Categories</h1>

        <a class='btn btn-primary' href="{{ route('admin.categories.create') }}">Create</a>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@endsection