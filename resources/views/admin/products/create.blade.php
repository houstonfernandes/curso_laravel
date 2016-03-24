@extends('admin.template')

@section('content')

    <h1>Novo Produto</h1>
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route'=> 'admin.products.store']) !!}

    <div class ='form-group'>
        {!! Form::label('name', "Categoria:") !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class ='form-group'>
        {!! Form::label('name', "Nome:") !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('description', "Descrição:") !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('price', "Preço:") !!}
        {!! Form::text('price', null) !!}
        {!! Form::label('featured', "Destaque:") !!}
        {!! Form::hidden('featured', 0) !!}<!--gambiarra-->
        {!! Form::checkbox('featured', true,null) !!}
        {!! Form::label('recommend', "Recomendado:") !!}
        {!! Form::hidden('recommend', 0) !!}<!--gambiarra-->
        {!! Form::checkbox('recommend', true,null) !!}
    </div>

    <div class ='form-group'>
        {!! Form::label('tags', "Tags:") !!}
        {!! Form::textarea('tags', null) !!}
    </div>


    <div class ='form-group'>
        {!! Form::submit('Confirmar', ['class' => "btn btn-primary"]) !!}
        <a class="btn btn-primary" href="{{route('admin.products.index')}}">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection