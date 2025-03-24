<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JustificativaAtraso extends Model
{
    Protected $fillable = [
        'it_id_atraso',
        'vc_descricao'
    ];
}
