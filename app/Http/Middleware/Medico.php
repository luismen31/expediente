<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Medico
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //Si el usuario tiene rol de medico ingresa a registrar cita directamente
        //sino redirige al administrador a registro de medicos.
        if($this->auth->user()->rol == 'medico'){
            $idProfesional = \App\ProfesionalUsuario::where('id_usuario', \Auth::user()->id)->first()->id_profesional;
            session(['id_profesional' => $idProfesional]);
            return redirect()->route('cita.index');
        }else{
            return redirect()->route('medico.index');
        }
        return $next($request);
    }
}
