<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    //Campos para llenar directo a la BD
    protected $fillable = [
    	'cedula',
    	'seguro_social',
    	'primer_nombre',
    	'segundo_nombre',
    	'apellido_paterno',
    	'apellido_materno',
    	'sexo',
    	'id_tipo_sanguineo',
    	'fecha_nacimiento',
    	'telefono',
    	'celular',
    	'email',
    	'direccion',
    ];
}
