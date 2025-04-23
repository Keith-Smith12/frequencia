<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'vc_nome',
        'vc_email',
        'vc_password',
        'vc_classe',
        'vc_tipo',
    ];
}
