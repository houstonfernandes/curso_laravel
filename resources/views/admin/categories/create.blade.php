@extends('app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach ( $errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
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
            {!! Form::submit('Add category', ['class' => "btn btn-primary"]) !!}
            <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection