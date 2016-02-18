@extends('admin.template')

@section('content')

    <h1>Create Product</h1>
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route'=> 'admin.products.store']) !!}

    <div class ='form-group'>
        {!! Form::label('name', "Category:") !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class ='form-group'>
        {!! Form::label('name', "Name:") !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('description', "Description:") !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('price', "Price:") !!}
        {!! Form::text('price', null) !!}
        {!! Form::label('featured', "Featured:") !!}
        {!! Form::hidden('featured', 0) !!}<!--gambiarra-->
        {!! Form::checkbox('featured', true,null) !!}
        {!! Form::label('recommend', "Recommend:") !!}
        {!! Form::hidden('recommend', 0) !!}<!--gambiarra-->
        {!! Form::checkbox('recommend', true,null) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('tags', "Tags:") !!}
        {!! Form::textarea('tags', null) !!}
    </div>


    <div class ='form-group'>
        {!! Form::submit('Save', ['class' => "btn btn-primary"]) !!}
        <a class="btn btn-primary" href="{{route('admin.products.index')}}">Cancel</a>
    </div>

    {!! Form::close() !!}
@endsection