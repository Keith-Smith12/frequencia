<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exemplo extends Model
{
    //

    protected $fillable = [
            'nome',
            'valor',
            'descricao',
            'observacao',
            'ativo'
        ];

}
