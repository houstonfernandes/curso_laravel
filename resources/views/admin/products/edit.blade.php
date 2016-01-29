@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Product - {{$product->name}}</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach ( $errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=> ['admin.products.update', $product->id], 'method' => 'put']) !!}

        <div class ='form-group'>
            {!! Form::label('name', "Category:") !!}
            {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
        </div>
        <div class ='form-group'>
            {!! Form::label('name', "Name:") !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class ='form-group'>
            {!! Form::label('description', "Description:") !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class ='form-group'>
            {!! Form::label('price', "Price:") !!}
            {!! Form::text('price', $product->price) !!}

            {!! Form::label('featured', "Featured:") !!}
            {!! Form::hidden('featured', 0) !!}<!--gambiarra-->
            {!! Form::checkbox('featured', true, $product->featured) !!}
            {!! Form::label('recommend', "Recommend:") !!}
            {!! Form::hidden('recommend', 0) !!}<!--gambiarra-->
            {!! Form::checkbox('recommend', true, $product->recommend) !!}
        </div>

        <div class ='form-group'>
            {!! Form::label('tags', "Tags:") !!}
            {!! Form::textarea('tags', $tags) !!}
        </div>

        <div class ='form-group'>
            {!! Form::submit('Save', ['class' => "btn btn-primary"]) !!}
            <a class="btn btn-primary" href="{{route('admin.products.index')}}">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection