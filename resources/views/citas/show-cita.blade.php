@extends('app')

@section('title') - Visualizar Cita @stop

@section('content')

    <div class="row">
        <div class="col-sm-12">        	
            <a href="{{ $_SERVER['HTTP_REFERER'] }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left fa-btn"></i>Regresar</a>
        </div>
    </div>

    <h3 class="page-header title">Visualizar Cita</h3>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-btn fa-info-circle"></i><strong>Información del Paciente</strong>
        </div>
        <div class="panel-body">
        	<div class="form-group col-sm-3 col-xs-6">
                <label>Cédula:</label>
                <p>{{ $paciente->cedula }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">            	
                <label>Paciente:</label>
                <p>{{ $paciente->primer_nombre.' '. $paciente->segundo_nombre .' '.$paciente->apellido_paterno.' '.$paciente->apellido_materno }}</p>
            </div>
			<div class="form-group col-sm-3 col-xs-6">
                <label>Fecha Nacimiento:</label>
                {{--*/
                	setlocale(LC_TIME, 'Spanish');
                    $nacimiento = explode('/', $paciente->fecha_nacimiento);       
                    $fecha = \Carbon::create($nacimiento[2], $nacimiento[0], $nacimiento[1]);
                /*--}}
                <p>{{ $fecha->formatLocalized('%e de %B de %Y') }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Edad:</label>
                <p>{{ \Carbon::createFromDate($nacimiento[2], $nacimiento[0], $nacimiento[1])->age }} años</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Tipo de Sangre:</label>
                <p>{{ \App\TipoSanguineo::where('id', $paciente->id_tipo_sanguineo)->first()->tipos_sanguineos }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Dirección:</label>
                <p>{{ (!empty($paciente->direccion)) ?  $paciente->direccion  : 'No especificada' }}</p>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-btn fa-history"></i><strong>Antecedentes</strong>
        </div>
        <div class="panel-body">
        	<div class="panel panel-info">
        		<div class="panel-heading"><strong>Patológicos</strong></div>
        		<div class="panel-body">
        			<div class="form-group col-sm-3 col-xs-6">
		                <label>Enfermedades:</label>
		                <p>{{ (!empty($paciente->enfermedades)) ?  $paciente->enfermedades  : 'Ninguna'  }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Medicamentos:</label>
		                <p>{{ (!empty($paciente->medicamentos)) ?  $paciente->medicamentos  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Alergias:</label>
		                <p>{{ (!empty($paciente->alergias)) ?  $paciente->alergias  : 'Ninguna'  }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Cirugías Previas:</label>
		                <p>{{ (!empty($paciente->cirugias)) ?  $paciente->cirugias  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Hospitalizaciones Previas:</label>
		                <p>{{ (!empty($paciente->hospitalizaciones)) ?  $paciente->hospitalizaciones  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Accidentes:</label>
		                <p>{{ (!empty($paciente->accidentes)) ?  $paciente->accidentes  : 'Ninguna'  }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Transfusiones:</label>
		                <p>{{ (!empty($paciente->transfusiones)) ?  $paciente->transfusiones  : 'Ninguna' }}</p>
		            </div>
        		</div>
        	</div>
        	<div class="panel panel-info">
        		<div class="panel-heading"><strong>No Patológicos</strong></div>
        		<div class="panel-body">
        			<div class="form-group col-sm-3 col-xs-6">
		                <label>¿Cuanto Fuma?:</label>
		                <p>{{ (!empty($paciente->cantidad_tabaco)) ?  $paciente->cantidad_tabaco  : '0' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>¿Cuanto Alcohol?:</label>
		                <p>{{ (!empty($paciente->cantidad_alcohol)) ?  $paciente->cantidad_alcohol  : '0' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Cantidad de comsumo de droga:</label>
		                <p>{{ (!empty($paciente->cantidad_drogas)) ?  $paciente->cantidad_drogas  : '0' }}</p>
		            </div>
        		</div>
        	</div>
        	<div class="panel panel-info">
        		<div class="panel-heading"><strong>Familiares</strong></div>
        		<div class="panel-body">
        			<div class="form-group col-sm-3 col-xs-6">
		                <label>Padre:</label>
		                <p>{{ (!empty($paciente->padre)) ?  $paciente->padre  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Madre:</label>
		                <p>{{ (!empty($paciente->madre)) ?  $paciente->madre  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Hermanos:</label>
		                <p>{{ (!empty($paciente->hermanos)) ?  $paciente->hermanos  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Abuelos Maternos:</label>
		                <p>{{ (!empty($paciente->abuelos_materno)) ?  $paciente->abuelos_materno  : 'Ninguna' }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Abuelos Paternos:</label>
		                <p>{{ (!empty($paciente->abuelos_paterno)) ?  $paciente->abuelos_paterno  : 'Ninguna' }}</p>
		            </div>
        		</div>
        	</div>
        	{{-- Solo se muestra si el paciente es mujer --}}
        	@if($paciente->sexo == 0)
        	<div class="panel panel-info">
        		<div class="panel-heading"><strong>Gieneco-obstétricos</strong></div>
        		<div class="panel-body">
        			<div class="form-group col-sm-3 col-xs-6">
		                <label>Edad Menarca:</label>
		                <p>{{ $gineco->edad_menarca }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Fecha Ultima Menstruación:</label>
		                <p>{{ $gineco->fecha_ultima_menstruacion }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Fecha Ultimo Parto:</label>
		                <p>{{ $gineco->fecha_ultimo_parto }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Gestas:</label>
		                <p>{{ $gineco->gestas }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Partos:</label>
		                <p>{{ $gineco->partos }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Abortos:</label>
		                <p>{{ $gineco->abortos }}</p>
		            </div>
		            <div class="form-group col-sm-3 col-xs-6">
		                <label>Cesáreas:</label>
		                <p>{{ $gineco->cesareas }}</p>
		            </div>
        		</div>
        	</div>
        	@endif
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-btn fa-heart"></i><strong>Consulta</strong>
        </div>
        <div class="panel-body">
        	<div class="form-group col-sm-3 col-xs-6">
                <label>Estatura:</label>
                <p>{{ $ficha->estatura }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Peso:</label>
                <p>{{ $ficha->peso }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Presion:</label>
                <p>{{ $ficha->presion }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Pulso:</label>
                <p>{{ $ficha->pulso }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Síntomas:</label>
                <p>{{ $ficha->sintomas }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Diagnóstico:</label>
                <p>{{ $ficha->diagnostico }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Laboratorios:</label>
                <p>{{ $ficha->laboratorios }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Exámenes:</label>
                <p>{{ $ficha->examenes }}</p>
            </div>
            <div class="form-group col-sm-3 col-xs-6">
                <label>Recetas:</label>
                <p>{{ $ficha->recetas }}</p>
            </div>
        </div>
    </div>
@stop