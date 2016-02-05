<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [
    	'cedula', 
    	'primer_nombre', 
    	'segundo_nombre', 
    	'apellido_paterno', 
    	'apellido_materno', 
    	'sexo',
    	'telefono',
    	'celular',
    	'email',    	
    ];
}
