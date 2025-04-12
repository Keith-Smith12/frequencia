<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $fillable = [
        'id',
        'vc_nome',
        'dt_data_inicio',
        'dt_data_conclusao',
        'it_estado',
        'vc_prioridade',
        'it_id_usuario',
        'ativo',
    ];
}
