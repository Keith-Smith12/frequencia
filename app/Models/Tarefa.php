<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'id',
        'vc_nome',
        'vc_descricao',
        'dt_data_entrega',
        'vc_portador',
        'ativo'
    ];
}
