@extends('app')

@section('content')
    <div class="container">
        <h1>Product Images - {{$product->name}}</h1>

        <a class='btn btn-primary' href="{{ route('admin.products_images.create', $product->id) }}">Create Image</a>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Extension</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td>{{$image->extension}}</td>
                    <td><img src="{{ url('uploads/' . $image->id . '.' . $image->extension) }}" width = '80px'></td>
                    <td>
                        <a href="{{ route('admin.products_images.delete',['id' => $image->id]) }}" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="pages">
        </div>
    </div>
@endsection