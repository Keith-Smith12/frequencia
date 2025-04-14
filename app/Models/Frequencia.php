<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = [
        'id',
        'dt_data',
        'tm_hora_entrada',
        'tm_hora_saida',
        'id_usuario',
        'vc_tipo'
    ];
}
