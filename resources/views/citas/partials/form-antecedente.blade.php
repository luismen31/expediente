@if(!isset($ginecos))  
  {{-- Tab Antecedentes --}}
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    {{-- Patológicos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
            <b>Patológicos</b>
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('enfermedades', 'Enfermedades:') !!}
                  {!! Form::textarea('enfermedades', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('medicamentos', 'Medicamentos:') !!}
                  {!! Form::textarea('medicamentos', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('alergias', 'Alergias:') !!}
                  {!! Form::textarea('alergias', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('cirugias', 'Cirugías Previas:') !!}
                  {!! Form::textarea('cirugias', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('hospitalizaciones', 'Hospitalizaciones Previas:') !!}
                  {!! Form::textarea('hospitalizaciones', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('accidentes', 'Accidentes:') !!}
                  {!! Form::textarea('accidentes', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('transfusiones', 'Transfusiones:') !!}
                  {!! Form::textarea('transfusiones', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
            </div>
        </div>
      </div>
    </div>

    {{-- No Patológicos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <b>No Patológicos</b>
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Fuma?</label>
                        <div class="form-group">
                            <label>Tabaco</label>
                            <label class="radio-inline">
                                <input type="radio" name="tabaco" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tabaco" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_tabaco', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_tabaco', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
                        </div>                      
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Consume Bebidas Alcohólicas?</label>
                        <div class="form-group">
                            <label>Alcohol</label>
                            <label class="radio-inline">
                                <input type="radio" name="alcohol" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="alcohol" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_alcohol', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_alcohol', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Consume algún tipo de Drogas?</label>
                        <div class="form-group">
                            <label>Drogas</label>
                            <label class="radio-inline">
                                <input type="radio" name="drogas" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="drogas" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_drogas', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_drogas', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
                        </div>

                    </div>
                </div>
            </div>


        </div>
      </div>
    </div>

    {{-- Familiares --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
            <b>Familiares</b>
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('padre', 'Padre:') !!}
                  {!! Form::textarea('padre', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('madre', 'Madre:') !!}
                  {!! Form::textarea('madre', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('hermanos', 'Hermanos:') !!}
                  {!! Form::textarea('hermanos', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abuelos_materno', 'Abuelos Maternos:') !!}
                  {!! Form::textarea('abuelos_materno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abuelos_paterno', 'Abuelos Paternos:') !!}
                  {!! Form::textarea('abuelos_paterno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3']) !!}
              </div>            
          </div>
        </div>
      </div>
    </div>

    {{-- Gineco-obstétricos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
            <b>Gineco-obstétricos</b>
          </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('edad_menarca', 'Menarca (Edad):') !!}
                  {!! Form::text('edad_menarca', null, ['class' => 'form-control input-sm', 'placeholder' => 'Menarca (Edad)']) !!}
              </div>
              <div class="form-group col-sm-6 {{ $errors->has('fecha_ultima_menstruacion') ? ' has-error' : '' }}">
                  {!! Form::label('fecha_ultima_menstruacion', 'Fecha Última Menstruación (FUM):', ['class' => 'control-label']) !!}
                  {!! Form::text('fecha_ultima_menstruacion', null, ['class' => 'form-control input-sm datepicker', 'placeholder' => 'FUM']) !!}
              </div>
              <div class="form-group col-sm-6 {{ $errors->has('fecha_ultimo_parto') ? ' has-error' : '' }}">
                  {!! Form::label('fecha_ultimo_parto', 'Fecha Último Parto (FUP):', ['class' => 'control-label']) !!}
                  {!! Form::text('fecha_ultimo_parto', null, ['class' => 'form-control input-sm datepicker', 'placeholder' => 'FUP']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('gestas', 'Gestas:') !!}
                  {!! Form::text('gestas', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('partos', 'Partos:') !!}
                  {!! Form::text('partos', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abortos', 'Abortos:') !!}
                  {!! Form::text('abortos', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('cesareas', 'Cesáreas:') !!}
                  {!! Form::text('cesareas', null, ['class' => 'form-control input-sm', 'placeholder' => '0']) !!}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
@else
  {{--*/$read = ['readonly' => 'readonly']; /*--}}
  {{-- Tab Antecedentes --}}
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    {{-- Patológicos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
            <b>Patológicos</b>
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('enfermedades', 'Enfermedades:') !!}
                  {!! Form::textarea('enfermedades', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('medicamentos', 'Medicamentos:') !!}
                  {!! Form::textarea('medicamentos', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('alergias', 'Alergias:') !!}
                  {!! Form::textarea('alergias', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('cirugias', 'Cirugías Previas:') !!}
                  {!! Form::textarea('cirugias', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('hospitalizaciones', 'Hospitalizaciones Previas:') !!}
                  {!! Form::textarea('hospitalizaciones', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('accidentes', 'Accidentes:') !!}
                  {!! Form::textarea('accidentes', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('transfusiones', 'Transfusiones:') !!}
                  {!! Form::textarea('transfusiones', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
            </div>
        </div>
      </div>
    </div>

    {{-- No Patológicos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <b>No Patológicos</b>
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Fuma?</label>
                        <div class="form-group">
                            <label>Tabaco</label>
                            <label class="radio-inline">
                                <input type="radio" name="tabaco" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tabaco" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_tabaco', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_tabaco', null, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
                        </div>                      
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Consume Bebidas Alcohólicas?</label>
                        <div class="form-group">
                            <label>Alcohol</label>
                            <label class="radio-inline">
                                <input type="radio" name="alcohol" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="alcohol" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_alcohol', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_alcohol', null, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-sm">
                        <label>¿Usted Consume algún tipo de Drogas?</label>
                        <div class="form-group">
                            <label>Drogas</label>
                            <label class="radio-inline">
                                <input type="radio" name="drogas" id="inlineRadio1" value="1"> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="drogas" id="inlineRadio2" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cantidad_drogas', '¿Cuánto?', ['class' => 'control-label']) !!}
                            {!! Form::text('cantidad_drogas', null, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
                        </div>

                    </div>
                </div>
            </div>


        </div>
      </div>
    </div>

    {{-- Familiares --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
            <b>Familiares</b>
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('padre', 'Padre:') !!}
                  {!! Form::textarea('padre', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('madre', 'Madre:') !!}
                  {!! Form::textarea('madre', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('hermanos', 'Hermanos:') !!}
                  {!! Form::textarea('hermanos', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abuelos_materno', 'Abuelos Maternos:') !!}
                  {!! Form::textarea('abuelos_materno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abuelos_paterno', 'Abuelos Paternos:') !!}
                  {!! Form::textarea('abuelos_paterno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ninguno', 'size' => '1x3'] + $read) !!}
              </div>            
          </div>
        </div>
      </div>
    </div>

    {{-- Gineco-obstétricos --}}
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
            <b>Gineco-obstétricos</b>
          </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('edad_menarca', 'Menarca (Edad):') !!}
                  {!! Form::text('edad_menarca', $ginecos->edad_menarca, ['class' => 'form-control input-sm', 'placeholder' => 'Menarca (Edad)'] + $read) !!}
              </div>
              <div class="form-group col-sm-6 {{ $errors->has('fecha_ultima_menstruacion') ? ' has-error' : '' }}">
                  {!! Form::label('fecha_ultima_menstruacion', 'Fecha Última Menstruación (FUM):', ['class' => 'control-label']) !!}
                  {!! Form::text('fecha_ultima_menstruacion', $ginecos->fecha_ultima_menstruacion, ['class' => 'form-control input-sm datepicker', 'placeholder' => 'FUM'] + $read) !!}
              </div>
              <div class="form-group col-sm-6 {{ $errors->has('fecha_ultimo_parto') ? ' has-error' : '' }}">
                  {!! Form::label('fecha_ultimo_parto', 'Fecha Último Parto (FUP):', ['class' => 'control-label']) !!}
                  {!! Form::text('fecha_ultimo_parto', $ginecos->fecha_ultimo_parto, ['class' => 'form-control input-sm datepicker', 'placeholder' => 'FUP'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('gestas', 'Gestas:') !!}
                  {!! Form::text('gestas', $ginecos->gestas, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('partos', 'Partos:') !!}
                  {!! Form::text('partos', $ginecos->partos, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('abortos', 'Abortos:') !!}
                  {!! Form::text('abortos', $ginecos->abortos, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
              </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('cesareas', 'Cesáreas:') !!}
                  {!! Form::text('cesareas', $ginecos->cesareas, ['class' => 'form-control input-sm', 'placeholder' => '0'] + $read) !!}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif