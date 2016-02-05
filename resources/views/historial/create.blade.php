@extends('app')

@section('title') - Historial Médico @stop

@section('content')
	
	<h3 class="page-header title">Historial Médico</h3>
	
	<div class="panel panel-primary">
		<div class="panel-heading"><i class="fa fa-btn fa-filter"></i>Filtrar Historial Médico</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="history-filter">
					<thead>
						<th data-field="num">#</th>
						<th data-field="date-cite">Fecha Cita</th>
						<th data-field="cedula">Cédula</th>
						<th data-field="patient">Paciente</th>
						<th data-field="act">Acción</th>
					</thead>
				</table>			
			</div>
		</div>
	</div>
@stop