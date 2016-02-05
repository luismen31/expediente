@extends('app')

@section('title')
	- Registrar Cita
@stop

@section('content')	
	<h3 class="page-header title">Registrar Cita Médica</h3>
	{{-- Muestra el mensaje si existe la variable success --}}
    @if(Session::has('msj_success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
          <strong> {{ Session::get('msj_success') }} </strong>
        </div>
    @endif

	<div class="alert alert-info" role="alert">
		<p class="text-justify">
			Si el paciente no existe puede proceder a registrarlo <a href="{{ route('cita.create') }}" class="alert-link">AQUÍ</a>
		</p>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading"><i class="fa fa-btn fa-filter"></i>Filtrar Pacientes</div>
		<div class="panel-body">
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
@stop