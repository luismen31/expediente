<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-info-circle"></i>
          <strong>Datos de Consulta</strong>          
      </h3>
    </div>
    <div class="panel-body">
    	<div class="row">
        <div class="form-group col-sm-3">
          {!! Form::label('estatura', 'Estatura') !!}
          {!! Form::text('estatura', null, ['class' => 'form-control', 'placeholder' => 'xxxxx']) !!}
        </div>
        <div class="form-group col-sm-3">
          {!! Form::label('presion', 'Presión') !!}
          {!! Form::text('presion', null, ['class' => 'form-control', 'placeholder' => 'xxxxx']) !!}
        </div>
        <div class="form-group col-sm-3">
          {!! Form::label('pulso', 'Pulso') !!}
          {!! Form::text('pulso', null, ['class' => 'form-control', 'placeholder' => 'xxxxx']) !!}
        </div>
        <div class="form-group col-sm-3">
          {!! Form::label('peso', 'Peso') !!}
          {!! Form::text('peso', null, ['class' => 'form-control', 'placeholder' => 'xxxxx']) !!}
        </div>
        <div class="form-group col-sm-6">
          {!! Form::label('sintomas', 'Síntomas', ['class' => 'control-label']) !!}
          {!! Form::textarea('sintomas', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']) !!}
        </div>
        <div class="form-group col-sm-6">
          {!! Form::label('diagnostico', 'Diagnóstico', ['class' => 'control-label']) !!}
          {!! Form::textarea('diagnostico', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']) !!}
        </div>
        <div class="form-group col-sm-6">
          {!! Form::label('laboratorios', 'Laboratorios', ['class' => 'control-label']) !!}
          {!! Form::textarea('laboratorios', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']) !!}
        </div>
        <div class="form-group col-sm-6">
          {!! Form::label('examenes', 'Exámenes', ['class' => 'control-label']) !!}
          {!! Form::textarea('examenes', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']) !!}
        </div>
        <div class="form-group col-sm-6">
          {!! Form::label('recetas', 'Recetas', ['class' => 'control-label']) !!}
          {!! Form::textarea('recetas', null, ['class' => 'form-control', 'placeholder' => 'xxxxxxxxxxxxxxxxxxxxx', 'size' => '1x3']) !!}
        </div>
      </div>
    </div>
</div>