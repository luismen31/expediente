@extends('app')

@section('title')
	- Editar Médicos 
@stop

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('medico.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left fa-btn"></i>Regresar</a>
		</div>
	</div>
	{{-- ERRORES DE VALIDACION --}}
	@if(count($errors))
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
		  <strong><i class="fa fa-close"></i> Por favor proceda a verificar los errores que contiene.</strong>
		  <ul>
		  	@foreach($errors->all() as $error)
		  	<li>{{ $error }}</li>
		  	@endforeach
		  </ul>
		</div>
	@endif

	{{-- Muestra el mensaje si existe la variable success --}}
	@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('success') }} </strong>
		</div>
	@endif


	<h3 class="page-header title"><i class="fa fa-btn fa-plus"></i>Editar Médicos</h3>
	{!! Form::model($medico, ['route' => ['medico.update', $medico->id], 'method' => 'PATCH']) !!}
		
		@include('medicos.partials.forms')

		<div class="form-group col-sm-offset-10">
			
				<button type="submit" class="btn btn-lg btn-block btn-outline btn-primary"><i class="fa fa-btn fa-edit"></i>Editar</button>
		</div>

	{!! Form::close() !!}
@stop