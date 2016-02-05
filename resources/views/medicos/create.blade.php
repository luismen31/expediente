@extends('app')

@section('title')
	- Agregar Médicos
@stop

@section('content')
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


	<div class="panel panel-primary">
		<div class="panel-heading"><i class="fa fa-btn fa-filter"></i>Filtrar Médicos</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table" id="medic-filter">
					<thead>
						<tr>
							<th data-field="num">#</th>
							<th data-field="ced">Cédula</th>
							<th data-field="name">Nombre</th>
							<th data-field="act">Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<h3 class="page-header title"><i class="fa fa-btn fa-plus"></i>Agregar Médicos</h3>
	{!! Form::open(['route' => 'medico.store', 'method' => 'POST']) !!}
		
		@include('medicos.partials.forms')

		<div class="form-group col-sm-offset-10">
			
				<button type="submit" class="btn btn-lg btn-block btn-outline btn-primary"><i class="fa fa-btn fa-save"></i>Guardar</button>
		</div>

	{!! Form::close() !!}
@stop