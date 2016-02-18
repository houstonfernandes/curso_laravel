@extends('admin.template')

@section('content')
    <h1>Edit Category - {{$category->name}}</h1>
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route'=> ['admin.categories.update', $category->id],'method' =>'put']) !!}

    <div class ='form-group'>
        {!! Form::label('name', "Name:") !!}
        {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('description', "Description:") !!}
        {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::submit('Save category', ['class' => "btn btn-primary"]) !!}
        <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Cancel</a>
    </div>

    {!! Form::close() !!}
@endsection