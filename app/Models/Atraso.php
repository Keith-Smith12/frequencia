<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    Protected $fillable = [
        'it_id_tarefa_usuario',
        'qtd_dias'
    ];
}
