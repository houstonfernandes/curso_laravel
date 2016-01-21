@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <a class='btn btn-primary' href="{{ route('admin.products.create') }}">Create</a>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
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
                        <a class='btn btn-primary' href="{{route('admin.products.edit',['id' => $product->id])}}"> edit</a>
                        <a class='btn btn-primary' href="{{route('admin.products.delete',['id' => $product->id])}}"> delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="pages">
            {!! $products->render() !!}
        </div>
    </div>
@endsection