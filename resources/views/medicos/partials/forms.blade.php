	<div class="panel panel-info">
		<div class="panel-heading"><i class="fa fa-btn fa-user-md"></i><strong>Datos Personales</strong></div>
		<div class="panel-body">
			<div class="form-group col-sm-4">
				{!! Form::label('cedula', 'Cédula') !!}
				{!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'x-xxxxx-xxxxx']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('primer_nombre', 'Primer Nombre:') !!}
				{!! Form::text('primer_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ej. José']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
				{!! Form::text('segundo_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ej. Manuel']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Castillo']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('apellido_materno', 'Apellido Materno:') !!}
				{!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Rivera']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('sexo', 'Sexo:') !!}
				{!! Form::select('sexo', ['0' => 'Femenino', '1' => 'Masculino'], null, ['class' => 'form-control']) !!}
			</div>			
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading"><i class="fa fa-btn fa-phone"></i><strong>Datos de Contacto</strong></div>
		<div class="panel-body">
			<div class="form-group col-sm-4">
				{!! Form::label('telefono', 'Teléfono:') !!}
				{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ej. 000-0000']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('celular', 'Celular:') !!}
				{!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'Ej. 0000-0000']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('email', 'Correo Electrónico:') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. xxxxxxx@xxxxxx.xxx']) !!}
			</div>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading"><i class="fa fa-btn fa-lock"></i><strong>Datos de Usuario</strong></div>
		<div class="panel-body">
			<div class="form-group col-sm-4">
				{!! Form::label('usuario', 'Usuario:') !!}
				{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Ej. jmanuel']) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('password', 'Contraseña:') !!}
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
			</div>					
			<div class="form-group col-sm-4">
				{!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '********']) !!}
			</div>			
		</div>
	</div>