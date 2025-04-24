<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JustificativaFalta extends Model
{
    protected $fillable = [
        'it_id_frequencia',
        'vc_descricao',
    ];
}
