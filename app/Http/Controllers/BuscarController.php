<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuscarController extends Controller
{   
    //Funcion para obtener todos los pacientes que ha atendido el medico logueado.
    public function getPaciente(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();
        $inputs = $request->all();        
        $idProfesional = session('id_profesional');

        if(empty($inputs['search'])){

            $pacientes = \DB::table('ficha_clinica AS fc')
            ->join('pacientes AS pa', 'fc.id_paciente', '=', 'pa.id')
            ->where('fc.id_profesional', $idProfesional)
            ->where('fc.id', '>', 0)
            ->select(\DB::raw('DISTINCT fc.id_paciente'), 'fc.id_paciente', 'pa.cedula', 'pa.primer_nombre', 'pa.apellido_paterno')
            ->orderBy('fc.fecha_cita', 'ASC')->take($inputs['limit'])->skip($inputs['offset'])->get();
            
        }else{

            $pacientes = \DB::table('ficha_clinica AS fc')
            ->join('pacientes AS pa', 'fc.id_paciente', '=', 'pa.id')
            ->where('fc.id_profesional', $idProfesional)
            ->where('fc.id', '>', 0)
            ->where(\DB::raw('CONCAT(pa.cedula," ",pa.primer_nombre," ",pa.apellido_paterno)'), 'LIKE', '%'.$inputs['search'].'%')
            ->select(\DB::raw('DISTINCT fc.id_paciente'), 'fc.id_paciente', 'pa.cedula', 'pa.primer_nombre', 'pa.apellido_paterno')
            ->orderBy('fc.fecha_cita', 'ASC')->take($inputs['limit'])->skip($inputs['offset'])->get();            
        }

        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($pacientes as $paciente) {
            
            $url = '<a href="'.route('cita.show', $paciente->id_paciente).'" class="btn btn-xs btn-outline btn-success"><i class="fa fa-btn fa-plus"></i>Nueva Cita</a>';
            
            $datos[] = [
                'num' => $n++,
                'cedula' => $paciente->cedula,
                'patient' => $paciente->primer_nombre.' '.$paciente->apellido_paterno,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);

    }

    //Funcion para obtener los datos del paciente que se le registra una cita
    public function postPaciente(Request $request){
        $v = \Validator::make($request->all(), ['search_paciente' => 'required']);
        if($v->fails()){
            return redirect()->route('cita.index')->withErrors($v);
        }

        $paciente = \App\Paciente::where('cedula', $request->input('search_paciente'))->first();
        if ($paciente == null) {
            \Session::flash('msj_error', 'El paciente NO EXISTE proceda a registrarlo');
            return redirect()->route('cita.index');
        }else{
            \Session::flash('success', 'Se cargó exitosamente los datos del paciente: '.$paciente->primer_nombre.' '.$paciente->apellido_paterno);
            return redirect()->route('cita.show', [$paciente->id]);
        }
    }

    //ADMINISTRADOR:Funcion para obtener todos los medicos
    public function getMedicos(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();
        $inputs = $request->all();

        if(empty($inputs['search'])){
            $medicos = \App\Medico::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('apellido_paterno', 'ASC')->get();
        }else{
            $medicos = \App\Medico::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where(\DB::raw('CONCAT(cedula," ",primer_nombre," ",apellido_paterno)'), 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('apellido_paterno', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($medicos as $medico) {
            $url = '<a href="'.route('medico.edit', $medico->id).'" class="btn btn-xs btn-outline btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'ced' => $medico->cedula,
                'name' => $medico->primer_nombre.' '.$medico->apellido_paterno,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);
    }

    //Funcion que obtiene todo el historial de paciente que ha atendido el profesional logueado
    public function getHistory(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();
        $inputs = $request->all();
        $idProfesional = session('id_profesional');

        if(empty($inputs['search'])){

            $historiales = \DB::table('ficha_clinica AS fc')
            ->join('pacientes AS pa', 'fc.id_paciente', '=', 'pa.id')
            ->where('fc.id_profesional', $idProfesional)
            ->where('fc.id', '>', 0)
            ->select(\DB::raw('SQL_CALC_FOUND_ROWS fc.*'), 'fc.id_paciente', 'pa.cedula', 'pa.primer_nombre', 'pa.apellido_paterno')
            ->orderBy('fc.fecha_cita', 'ASC')->take($inputs['limit'])->skip($inputs['offset'])->get();
            
        }else{

            $historiales = \DB::table('ficha_clinica AS fc')
            ->join('pacientes AS pa', 'fc.id_paciente', '=', 'pa.id')
            ->where('fc.id_profesional', $idProfesional)
            ->where('fc.id', '>', 0)
            ->where(\DB::raw('CONCAT(pa.cedula," ",pa.primer_nombre," ",pa.apellido_paterno)'), 'LIKE', '%'.$inputs['search'].'%')
            ->select(\DB::raw('SQL_CALC_FOUND_ROWS fc.*'), 'fc.id_paciente', 'pa.cedula', 'pa.primer_nombre', 'pa.apellido_paterno')
            ->orderBy('fc.fecha_cita', 'ASC')->take($inputs['limit'])->skip($inputs['offset'])->get();            
        }

        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($historiales as $historial) {
            
            $url = '<a href="'.url('ver-cita', ['id' => $historial->id]).'" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-btn fa-eye"></i>Ver Cita</a>';
            
            $datos[] = [
                'num' => $n++,
                'date-cite' => $historial->fecha_cita,
                'cedula' => $historial->cedula,
                'patient' => $historial->primer_nombre.' '.$historial->apellido_paterno,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);
    }

    public function getHistorialpaciente(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();
        $inputs = $request->all();
        $idProfesional = session('id_profesional');
                
        $historialPaciente = \DB::table('ficha_clinica AS fc')
        ->join('pacientes AS pa', 'fc.id_paciente', '=', 'pa.id')
        ->where('fc.id_profesional', $idProfesional)
        ->where('fc.id', '>', 0)
        ->where('id_paciente', $inputs['paciente'])
        ->select(\DB::raw('SQL_CALC_FOUND_ROWS fc.*'),'fc.id', 'fc.fecha_cita', 'fc.sintomas', 'fc.diagnostico')
        ->orderBy('fc.fecha_cita', 'ASC')->get();   

        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($historialPaciente as $historial) {
            $url = '<a href="'.url('ver-cita', ['id' => $historial->id]).'" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-eye fa-btn"></i>Ver Cita</a>';
            
            $datos[] = [
                'num' => $n++,
                'date' => $historial->fecha_cita,
                'syntoms' => $historial->sintomas,
                'diag' => $historial->diagnostico,
                'act' => $url
            ];
        }

        return response()->json(['total' => $cantidad, 'rows' => $datos]);

    }
}
