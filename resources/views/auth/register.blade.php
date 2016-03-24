@extends('store.template')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrar-se</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Opa!</strong> Falhou ao validar dados.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme sua senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class ='form-group'>
							{!! Form::label('endereco', "Endereço:") !!}
							{!! Form::text('endereco', null, ['class' => 'form-control', 'required'=>'required']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('numero', "Número:") !!}
							{!! Form::text('numero', null, ['class' => 'form-control', 'required'=>'required']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('complemento', "Complemento:") !!}
							{!! Form::text('complemento', null, ['class' => 'form-control']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('bairro', "Bairro:") !!}
							{!! Form::text('bairro', null, ['class' => 'form-control', 'required'=>'required']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('cidade', "Cidade:") !!}
							{!! Form::text('cidade', null, ['class' => 'form-control', 'required'=>'required']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('uf', "UF:") !!}
							{!! Form::text('uf', null, ['class' => 'form-control', 'required'=>'required','pattern'=>'[a-zA-Z]{2}']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('cep', "CEP:") !!}
							{!! Form::text('cep', null, ['class' => 'form-control', 'pattern'=>'[0-9]{5}-[0-9]{3}', 'required'=>'required']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('tel', "Tel:(xx)xxxx-xxxx") !!}
							{!! Form::text('tel', null, ['class' => 'form-control', 'pattern'=>'\([0-9]{2}\)[0-9]{4}-[0-9]{4}']) !!}
						</div>

						<div class ='form-group'>
							{!! Form::label('cel', "Cel:(xx)x xxxx-xxxx)") !!}
							{!! Form::text('cel', null, ['class' => 'form-control', 'pattern'=>'\([0-9]{2}\)[0-9]{1,1} [0-9]{4}-[0-9]{4}']) !!}
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Confirmar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
	<script src="{{url('js/jquery.mask.min.js')}}"></script>
	<script type="application/javascript">
		$("[name=tel]").mask("(99)9999-9999");
		$("[name=cel]").mask("(99)9 9999-9999");
		$("[name=cep]").mask("99999-999");
	</script>
@stop