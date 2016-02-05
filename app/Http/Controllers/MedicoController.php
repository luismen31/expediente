<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicos.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'cedula' => 'required',
            'primer_nombre' => 'required',
            'apellido_paterno' => 'required',            
            'usuario' => 'required',
            'password' => ['required', 'confirmed', 'min:6'],
        ];
        //Validamos los datos recibidos
        $this->validate($request, $rules);

        $medico = new \App\Medico;
        $medico->fill($request->all()); //Llena los campos fillable del modelo MEDICO
        $medico->save();

        $user = new \App\User;
        $user->usuario = $request->input('usuario');
        $user->password = bcrypt($request->input('password'));
        $user->rol = 'medico';
        $user->save();

        $profesionalUser = new \App\ProfesionalUsuario;        
        $profesionalUser->id_profesional = $medico->id;
        $profesionalUser->id_usuario = $user->id;
        $profesionalUser->save();


        $request->session()->flash('success', 'El medico '.$request->input('primer_nombre').' '.$request->input('apellido_paterno').' se ha registrado correctamente.');
        return redirect()->route('medico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = \App\Medico::find($id);
        $profesionalUser = \App\ProfesionalUsuario::find($id);
        $medico->usuario = \App\User::where('id', $profesionalUser->id_usuario)->first()->usuario;
        return view('medicos.edit', compact('medico'));
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
        $rules=[
            'cedula' => 'required',
            'primer_nombre' => 'required',
            'apellido_paterno' => 'required',            
            'usuario' => 'required',
            'password' => ['confirmed', 'min:6']   
        ];
        //Validamos los datos recibidos
        $this->validate($request, $rules);

        $medico = \App\Medico::find($id);
        $medico->fill($request->all()); 
        $medico->save();

        $profesionalUser = \App\ProfesionalUsuario::find($id);

        $user = \App\User::find($profesionalUser->id_usuario);
        $user->usuario = $request->input('usuario');
        if(!empty($request->input('password'))){
            $user->password = bcrypt($request->input('password'));
        }
        $user->rol = 'medico';
        $user->save();

        $request->session()->flash('success', 'El medico '.$request->input('primer_nombre').' '.$request->input('apellido_paterno').' se ha editado correctamente.');
        return redirect()->route('medico.index');
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
