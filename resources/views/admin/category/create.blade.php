@extends('app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        {!! Form::open(['route'=> 'admin.categories.store']) !!}

        <div class ='form-group'>
            {!! Form::label('name', "Name:") !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class ='form-group'>
            {!! Form::label('description', "Description:") !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class ='form-group'>
            {!! Form::submit('Add category', ['class' => "btn btn-primary form-control"]) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection