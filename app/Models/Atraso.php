<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    protected $fillable = [
        'it_id_tarefa_usuario', 
        'qtd_dias',
    ];

    /**
     * Relacionamento 1:1 com JustificativaAtraso.
     */
    public function justificativaAtraso()
    {
        return $this->hasOne(JustificativaAtraso::class, 'it_id_atraso');
    }

    public function tarefaUsuario()
    {
        return $this->belongsTo(TarefaUsuario::class, 'it_id_tarefa_usuario');
    }

}
