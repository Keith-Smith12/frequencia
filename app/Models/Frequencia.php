<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = [
        'dt_data',
        'tm_hora_entrada',
        'tm_hora_saida',
        'it_id_usuario',
        'vc_tipo',
    ];
}
