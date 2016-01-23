@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product image</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach ( $errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=> ['admin.products_images.store', $product->id], 'method' => 'post', 'files' => "true"]) !!}

        <div class ='form-group'>
            {!! Form::label('image', "Image:") !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>

        <div class ='form-group'>
            {!! Form::submit('Upload Image', ['class' => "btn btn-primary"]) !!}
            <a class="btn btn-primary" href="{{route('admin.products_images.index', $product->id)}}">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection