<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectoUsuario extends Model
{
    protected $fillable =[
        'it_id_user',
        'it_id_projecto'
    ];
}
