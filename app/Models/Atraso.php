<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atraso extends Model
{
    protected $fillable = [
        'it_id_tarefa_usuario',
        'qtd_dias',
    ]; 
}
