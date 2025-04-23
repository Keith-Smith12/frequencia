<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JustificativaAtraso extends Model
{
    protected $fillable = [
        'it_id_atraso',
        'vc_descricao',
    ];

    /**
     * Relacionamento 1:1 com Atraso.
     */
    public function atraso()
    {
        return $this->belongsTo(Atraso::class, 'it_id_atraso');
    }
}
