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

 public function usuarios()
{
    return $this->belongsTo(User::class, 'it_id_usuario'); // ajuste 'user_id' para o nome real da foreign key
}

public function tarefas()
{
    return $this->belongsTo(Tarefa::class, 'it_id_tarefa'); // ajuste 'tarefa_id' se necessário
}   
    
}
