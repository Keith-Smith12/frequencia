<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarefaUsuario extends Model
{
    protected $fillable = [
        'it_id_usuario',
        'it_id_tarefa',
        'dt_data_atribuicao'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'it_id_usuario');
    }

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class, 'it_id_tarefa');
    }
}
