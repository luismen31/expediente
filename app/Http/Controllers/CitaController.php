<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('citas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
            'fecha_cita' => ['required', 'date', 'date_format:m/d/Y'],
            'cedula' => ['required', 'unique:pacientes,cedula'],
            'primer_nombre' => 'required',
            'apellido_paterno' => 'required',
            'id_tipo_sanguineo' => 'not_in:0',
            'fecha_nacimiento' => ['date', 'date_format:m/d/Y'],
            'fecha_ultima_menstruacion' => ['date', 'date_format:m/d/Y'],
            'fecha_ultimo_parto' => ['date', 'date_format:m/d/Y'],
        ];

        $this->validate($request, $rules);
        
        $datos = $request->all();
        //Registro del paciente
        $paciente = new \App\Paciente;
        $paciente->fill($datos); //Llena todos los campos colocados en el modelo Paciente
        $paciente->save();

        //Registro de ficha clinica
        $ficha = new \App\FichaClinica;
        $ficha->id_paciente = $paciente->id;
        $ficha->id_profesional = session('id_profesional');
        $ficha->fecha_cita = $datos['fecha_cita'];
        $ficha->sintomas = $datos['sintomas'];
        $ficha->diagnostico = $datos['diagnostico'];
        $ficha->laboratorios = $datos['laboratorios'];
        $ficha->examenes = $datos['examenes'];
        $ficha->recetas = $datos['recetas'];
        $ficha->estatura = $datos['estatura'];
        $ficha->presion = $datos['presion'];
        $ficha->pulso = $datos['pulso'];
        $ficha->peso = $datos['peso'];
        $ficha->save();

        //Antecedentes patologicos
        foreach (\App\TipoPatologico::all() as $tipoPatologico) {
            $patologicos = new \App\AntecedentePatologico;
            $patologicos->id_paciente = $paciente->id;
            $patologicos->id_tipo_patologico = $tipoPatologico->id;
            $patologicos->observaciones = $datos[''.strtolower($tipoPatologico->descripcion).''];
            $patologicos->save();
        }

        //Antecedentes No Patologicos
        foreach (\App\TipoNoPatologico::all() as $tipoNoPatologico) {
            $noPatologico = new \App\AntecedenteNoPatologico;
            $noPatologico->id_paciente = $paciente->id;
            $noPatologico->id_tipo_no_patologico = $tipoNoPatologico->id;
            $noPatologico->cantidad_consumo = $datos['cantidad_'.strtolower($tipoNoPatologico->descripcion.'')];
            $noPatologico->save();   
        }
        
        //Antecedentes Familiares
        $familiar = new \App\AntecedenteFamiliar;
        $familiar->id_paciente = $paciente->id;
        $familiar->id_tipo_familiar = 1;
        $familiar->observaciones = $datos['padre'];
        $familiar->save();
        
        $familiar = new \App\AntecedenteFamiliar;
        $familiar->id_paciente = $paciente->id;
        $familiar->id_tipo_familiar = 2;
        $familiar->observaciones = $datos['madre'];
        $familiar->save();

        $familiar = new \App\AntecedenteFamiliar;
        $familiar->id_paciente = $paciente->id;
        $familiar->id_tipo_familiar = 3;
        $familiar->observaciones = $datos['hermanos'];
        $familiar->save();
       
        $familiar = new \App\AntecedenteFamiliar;
        $familiar->id_paciente = $paciente->id;
        $familiar->id_tipo_familiar = 4;
        $familiar->observaciones = $datos['abuelos_materno'];
        $familiar->save();     

        $familiar = new \App\AntecedenteFamiliar;
        $familiar->id_paciente = $paciente->id;
        $familiar->id_tipo_familiar = 5;
        $familiar->observaciones = $datos['abuelos_paterno'];
        $familiar->save();   

        //Antecedentes Ginecoobstetras
        $gineco = new \App\AntecedenteGinecoobstetra;
        $gineco->id_paciente = $paciente->id;
        $gineco->edad_menarca = $datos['edad_menarca'];
        $gineco->fecha_ultima_menstruacion = $datos['fecha_ultima_menstruacion'];
        $gineco->fecha_ultimo_parto = $datos['fecha_ultimo_parto'];
        $gineco->gestas = $datos['gestas'];
        $gineco->partos = $datos['partos'];
        $gineco->abortos = $datos['abortos'];
        $gineco->cesareas = $datos['cesareas'];
        $gineco->save();

        $request->session()->flash('msj_success', 'El paciente '.ucfirst(strtolower($datos['primer_nombre'])).' '.ucfirst(strtolower($datos['apellido_paterno'])).' se ha registrado correctamente.');
        return redirect()->route('cita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $paciente = \App\Paciente::find($id);
        //antecedentes patologicos
        $paciente->enfermedades = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 1)->first()->observaciones;
        $paciente->medicamentos = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 2)->first()->observaciones;
        $paciente->alergias = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 3)->first()->observaciones;
        $paciente->cirugias = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 4)->first()->observaciones;
        $paciente->hospitalizaciones = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 5)->first()->observaciones;
        $paciente->accidentes = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 6)->first()->observaciones;
        $paciente->transfusiones = \App\AntecedentePatologico::where('id_paciente', $id)->where('id_tipo_patologico', 7)->first()->observaciones;
        //antecedentes no patologicos
        $paciente->cantidad_tabaco = \App\AntecedenteNoPatologico::where('id_paciente', $id)->where('id_tipo_no_patologico', 1)->first()->cantidad_consumo; 
        $paciente->cantidad_alcohol = \App\AntecedenteNoPatologico::where('id_paciente', $id)->where('id_tipo_no_patologico', 2)->first()->cantidad_consumo; 
        $paciente->cantidad_drogas = \App\AntecedenteNoPatologico::where('id_paciente', $id)->where('id_tipo_no_patologico', 3)->first()->cantidad_consumo; 
        //antecedentes familiares
        $paciente->padre = \App\AntecedenteFamiliar::where('id_paciente', $id)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->madre = \App\AntecedenteFamiliar::where('id_paciente', $id)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->hermanos = \App\AntecedenteFamiliar::where('id_paciente', $id)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->abuelos_materno = \App\AntecedenteFamiliar::where('id_paciente', $id)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->abuelos_paterno = \App\AntecedenteFamiliar::where('id_paciente', $id)->where('id_tipo_familiar', 1)->first()->observaciones;
                
        $ginecos = \App\AntecedenteGinecoobstetra::where('id_paciente', $id)->first();

        $request->session()->flash('success', 'Se cargó exitosamente los datos del paciente: '.$paciente->primer_nombre.' '.$paciente->apellido_paterno);
        return view('citas.show', compact(['paciente', 'ginecos']));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Permite registrar una nueva cita al paciente.
     *
     *  @param \Illuminate\Http\Request  $request
     *  @param int $id //id del paciente
     *  @return ruta cita.index
     */
    public function nuevaCita(Request $request, $id){
        
        $datos = $request->all();        

        //Registro de ficha clinica
        $ficha = new \App\FichaClinica;
        $ficha->id_paciente = $id;
        $ficha->id_profesional = session('id_profesional');
        $ficha->fecha_cita = $datos['fecha_cita'];
        $ficha->sintomas = $datos['sintomas'];
        $ficha->diagnostico = $datos['diagnostico'];
        $ficha->laboratorios = $datos['laboratorios'];
        $ficha->examenes = $datos['examenes'];
        $ficha->recetas = $datos['recetas'];
        $ficha->estatura = $datos['estatura'];
        $ficha->presion = $datos['presion'];
        $ficha->pulso = $datos['pulso'];
        $ficha->peso = $datos['peso'];
        $ficha->save();

        $request->session()->flash('msj_success', 'La nueva cita del paciente '.ucfirst(strtolower($datos['primer_nombre'])).' '.ucfirst(strtolower($datos['apellido_paterno'])).' ha sido registrado correctamente.');
        return redirect()->route('cita.index');
    }

    /**
     * @param int $id 
     */
    public function showCita($id){
        $ficha = \App\FichaClinica::find($id);
        $id_paciente = $ficha->id_paciente;   
        $paciente = \App\Paciente::find($id_paciente);
        
        //antecedentes patologicos
        $paciente->enfermedades = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 1)->first()->observaciones;
        $paciente->medicamentos = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 2)->first()->observaciones;
        $paciente->alergias = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 3)->first()->observaciones;
        $paciente->cirugias = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 4)->first()->observaciones;
        $paciente->hospitalizaciones = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 5)->first()->observaciones;
        $paciente->accidentes = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 6)->first()->observaciones;
        $paciente->transfusiones = \App\AntecedentePatologico::where('id_paciente', $id_paciente)->where('id_tipo_patologico', 7)->first()->observaciones;
        //antecedentes no patologicos
        $paciente->cantidad_tabaco = \App\AntecedenteNoPatologico::where('id_paciente', $id_paciente)->where('id_tipo_no_patologico', 1)->first()->cantidad_consumo; 
        $paciente->cantidad_alcohol = \App\AntecedenteNoPatologico::where('id_paciente', $id_paciente)->where('id_tipo_no_patologico', 2)->first()->cantidad_consumo; 
        $paciente->cantidad_drogas = \App\AntecedenteNoPatologico::where('id_paciente', $id_paciente)->where('id_tipo_no_patologico', 3)->first()->cantidad_consumo; 
        //antecedentes familiares
        $paciente->padre = \App\AntecedenteFamiliar::where('id_paciente', $id_paciente)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->madre = \App\AntecedenteFamiliar::where('id_paciente', $id_paciente)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->hermanos = \App\AntecedenteFamiliar::where('id_paciente', $id_paciente)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->abuelos_materno = \App\AntecedenteFamiliar::where('id_paciente', $id_paciente)->where('id_tipo_familiar', 1)->first()->observaciones;
        $paciente->abuelos_paterno = \App\AntecedenteFamiliar::where('id_paciente', $id_paciente)->where('id_tipo_familiar', 1)->first()->observaciones;
                
        $ginecos = \App\AntecedenteGinecoobstetra::where('id_paciente', $id_paciente)->first();
        
        return view('citas.show-cita', compact(['ficha', 'paciente', 'ginecos'])); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
