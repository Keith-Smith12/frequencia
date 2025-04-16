<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria_tarefas extends Model
{
    protected $fillable = [
        'vc_nome',
        'dt_descricao',
        'vc_prioridade',
        'it_tempo_estimado',
        'vc_tipo'
    ];
}
