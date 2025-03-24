<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaTarefa extends Model
{
    Protected $fillable = [
        'vc_nome',
        'vc_descricao',
        'vc_prioridade',
        'it_tempo_estimado',
        'vc_tipo',
    ];
}
