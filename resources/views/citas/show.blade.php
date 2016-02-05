@extends('app')

@section('title') - Registrar Cita @stop

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('cita.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left fa-btn"></i>Regresar</a>
        </div>
    </div>

    <h3 class="page-header title">Historial del Paciente</h3>
	
    {{-- Muestra el mensaje si existe la variable success --}}
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
          <strong> {{ Session::get('success') }} </strong>
        </div>
    @endif
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-history fa-btn"></i> <strong>Historial de {{ $paciente->primer_nombre.' '.$paciente->apellido_paterno }}</strong><span class="filter"><i class="fa fa-chevron-down"></i></span>
        </div>
        <div class="panel-body collapse-filter">
            <div class="table-responsive">
                <input type="hidden" id="paciente" value="{{ $paciente->id }}">
                <table class="table table-bordered" id="history-patient-filter">
                    <thead>
                        <tr>
                            <th data-field="num">#</th>
                            <th data-field="date">Fecha Cita</th>
                            <th data-field="syntoms">Sintomas</th>
                            <th data-field="diag">Diagnóstico</th>
                            <th data-field="act">Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>    
    </div>

	<h3 class="page-header title">Registrar Cita Médica</h3>

    <div class="panel panel-info">
        <div class="panel-heading">
            <i class="fa fa-btn fa-info-circle"></i><strong>Información del Paciente</strong>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label>Paciente:</label>
                <p>{{ $paciente->primer_nombre.' '.$paciente->apellido_paterno }}</p>
            </div>
            <div class="form-group col-sm-4">
                <label>Edad:</label>
                {{--*/
                    $nacimiento = explode('/', $paciente->fecha_nacimiento);                    
                /*--}}
                <p>{{ \Carbon::createFromDate($nacimiento[2], $nacimiento[0], $nacimiento[1])->age }} años</p>
            </div>
            <div class="form-group col-sm-4">
                <label>Tipo de Sangre:</label>
                <p>{{ \App\TipoSanguineo::where('id', $paciente->id_tipo_sanguineo)->first()->tipos_sanguineos }}</p>
            </div>
        </div>
    </div>

	{!! Form::model($paciente, ['url' => ['cita/nueva-cita', $paciente->id], 'method' => 'POST']) !!}
		<div class="row">
			<div class="form-group col-sm-3 {{ $errors->has('fecha_cita') ? ' has-error' : '' }}">
				{!! Form::label('fecha_cita', 'Fecha de la Cita:', ['class' => 'date-cita control-label']) !!}
				{!! Form::text('fecha_cita', \Carbon::now()->setTimezone('America/Panama')->format('m/d/Y'), ['class' => 'form-control datepicker', 'placeholder' => 'DD/MM/AAAA']) !!}
			</div>
		</div>

		<div class="panel with-nav-tabs panel-clinica">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li><a href="#tab1" data-toggle="tab"><b>Generales del Paciente</b></a></li>
                    <li><a href="#tab2" data-toggle="tab"><b>Antecedentes</b></a></li>
                    <li class="active"><a href="#tab3" data-toggle="tab"><b>Consulta</b></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade" id="tab1">
                        {{-- Formulario --}}
                        @include('citas.partials.forms', ['readonly' => true])
                    </div>
                    <div class="tab-pane fade" id="tab2">
                    	{{-- Formulario antecedentes --}}
                        @include('citas.partials.form-antecedente', [compact('ginecos')])
                    </div>
                    <div class="tab-pane fade in active" id="tab3">
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