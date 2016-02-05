<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfesionalUsuario extends Model
{
    protected $table = 'profesionales_usuarios';
    public $timestamps = false;
    protected $primaryKey = 'id_profesional';
}
