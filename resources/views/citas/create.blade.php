@extends('app')

@section('title')
	- Registrar Cita
@stop

@section('content')
	
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('cita.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left fa-btn"></i>Regresar</a>
		</div>
	</div>

	<h3 class="page-header title">Registrar Cita Médica</h3>
	
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
		<div class="alert alert-info alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('success') }} </strong>
		</div>
	@endif

	@if(Session::has('msj_error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('msj_error') }} </strong>
		</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading"><i class="fa fa-btn fa-filter"></i>Filtrar Pacientes<span class="filter"><i class="fa fa-chevron-down"></i></span></div>
		<div class="panel-body collapse-filter">
			<div class="table-responsive">
				<table class="table table-bordered" id="patient-filter">
					<thead>
						<th data-field="num">#</th>
						<th data-field="cedula">Cédula</th>
						<th data-field="patient">Paciente</th>
						<th data-field="act">Acción</th>
					</thead>
				</table>			
			</div>
		</div>
	</div>

	{!! Form::open(['route' => 'cita.store', 'method' => 'POST']) !!}
		<div class="row">
			<div class="form-group col-sm-3 {{ $errors->has('fecha_cita') ? ' has-error' : '' }}">
				{!! Form::label('fecha_cita', 'Fecha de la Cita:', ['class' => 'date-cita control-label']) !!}
				{!! Form::text('fecha_cita', \Carbon::now()->setTimezone('America/Panama')->format('m/d/Y'), ['class' => 'form-control datepicker', 'placeholder' => 'DD/MM/AAAA']) !!}
			</div>
		</div>

		<div class="panel with-nav-tabs panel-clinica">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab"><b>Generales del Paciente</b></a></li>
                    <li><a href="#tab2" data-toggle="tab"><b>Antecedentes</b></a></li>
                    <li><a href="#tab3" data-toggle="tab"><b>Consulta</b></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        {{-- Formulario --}}
                        @include('citas.partials.forms')
                    </div>
                    <div class="tab-pane fade" id="tab2">
                    	{{-- Formulario antecedentes --}}
                        @include('citas.partials.form-antecedente')
                    </div>
                    <div class="tab-pane fade" id="tab3">
                    	{{-- Formulario Signos --}}
                        @include('citas.partials.form-consulta')
                    </div>
                    <div class="form-group col-sm-offset-10">
                    	<button class='btn btn-block btn-outline btn-success btn-lg' type="submit"><i class="fa fa-btn fa-save"></i>Guardar</button>
                    </div>
                </div>
            </div>
        </div>

	{!! Form::close() !!}
@stop