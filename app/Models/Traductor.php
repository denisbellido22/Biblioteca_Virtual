<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traductor extends Model
{
    protected $table = 'traductores';

    protected $primaryKey = 'ID_traductores';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'idioma_nativo',
        'idiomas_traduccion',
        'certificaciones',
        'img_traductores',
    ];
}
