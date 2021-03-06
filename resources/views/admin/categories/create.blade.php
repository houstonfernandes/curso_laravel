@extends('admin.template')

@section('content')
    <h1>Nova Categoria</h1>
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route'=> 'admin.categories.store']) !!}

    <div class ='form-group'>
        {!! Form::label('name', "Nome:") !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('description', "Descrição:") !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::submit('Confirmar', ['class' => "btn btn-primary"]) !!}
        <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection