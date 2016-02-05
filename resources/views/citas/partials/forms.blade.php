@if(isset($readonly))
	{{--*/$read = ['readonly' => 'readonly']; /*--}}
@else
	{{--*/$read = []; /*--}}
@endif
{{-- Tab Generales del Paciente --}}
<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-info-circle"></i>
          <strong>Datos de Identificación</strong>
          <small class="small-font">Complete los datos solicitados con la información de identificación básica del paciente</small>
      </h3>
    </div>
    <div class="panel-body">
    	<div class="row">
			<div class="form-group col-sm-4 {{ $errors->has('cedula') ? ' has-error' : '' }}">
				{!! Form::label('cedula', 'Cédula', ['class' => 'control-label']) !!}
				{!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'x-xxxxx-xxxxx'] + $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('seguro_social', 'Seguro Social') !!}
				{!! Form::text('seguro_social', null, ['class' => 'form-control', 'placeholder' => 'x-xxxxx-xxxxx']+ $read) !!}
			</div>		
      	</div>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-user"></i>
          <strong>Datos Personales Del Paciente</strong>
          <small class="small-font">Información detallada sobre el paciente</small>
      </h3>
    </div>
    <div class="panel-body">
    	<div class="row">
			<div class="form-group col-sm-4 {{ $errors->has('primer_nombre') ? ' has-error' : '' }}">
				{!! Form::label('primer_nombre', 'Primer Nombre:', ['class' => 'control-label']) !!}
				{!! Form::text('primer_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ej. José']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
				{!! Form::text('segundo_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ej. Manuel']+ $read) !!}
			</div>
			<div class="form-group col-sm-4 {{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
				{!! Form::label('apellido_paterno', 'Apellido Paterno:', ['class' => 'control-label']) !!}
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Castillo']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('apellido_materno', 'Apellido Materno:') !!}
				{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Rivera']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('sexo', 'Sexo:') !!}
				{!! Form::select('sexo', ['0' => 'Femenino', '1' => 'Masculino'], null, ['class' => 'form-control']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
				{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker', 'placeholder' => 'DD/MM/AAAA']+ $read) !!}
			</div>
			<div class="form-group col-sm-4 {{ $errors->has('id_tipo_sanguineo') ? ' has-error' : ''">
				{!! Form::label('id_tipo_sanguineo', 'Tipo Sanguíneo:', ['class' => 'control-label']) !!}
				{!! Form::select('id_tipo_sanguineo', ['0' => 'Seleccione Tipo Sanguíneo'] + \App\TipoSanguineo::lists('tipos_sanguineos','id')->toArray(), null, ['class' => 'form-control']+ $read) !!}
			</div>	
      	</div>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-map-marker"></i>
          <strong>Contacto/Dirección del Paciente</strong>
          <small class="small-font">Dirección y datos de contacto del paciente</small>
      </h3>
    </div>
    <div class="panel-body">
		<div class="row">
            <div class="form-group col-sm-4">
				{!! Form::label('telefono', 'Teléfono:') !!}
				{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ej. 000-0000']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('celular', 'Celular:') !!}
				{!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'Ej. 0000-0000']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('email', 'Correo Electrónico:') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. xxxxxxx@xxxxxx.xxx']+ $read) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('direccion', 'Dirección:') !!}
				{!! Form::textarea('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ej. xxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']+ $read) !!}
			</div>
		</div>
    </div>
</div>

