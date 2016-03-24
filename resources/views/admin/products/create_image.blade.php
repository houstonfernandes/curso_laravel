@extends('admin.template')

@section('content')
    <h1>Nova imagem de produto</h1>
    @if ($errors->any())
        <ul class="alert">
            @foreach ( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['route'=> ['admin.products_images.store', $product->id], 'method' => 'post', 'files' => "true"]) !!}

    <div class ='form-group'>
        {!! Form::label('image', "Imagem:") !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
    </div>

    <div class ='form-group'>
        {!! Form::submit('Confirmar', ['class' => "btn btn-primary"]) !!}
        <a class="btn btn-primary" href="{{route('admin.products_images.index', $product->id)}}">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection