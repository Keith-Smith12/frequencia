<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarefa extends Model
{

    protected $fillable = [
        'vc_nome',
        'it_id_projecto',
        'it_id_cat_tarefa',
        'dt_data_entrega'
    ];
    
    protected $dates = [
        'dt_data_entrega',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Relacionamento com Projecto
     */
    public function projecto(): BelongsTo
    {
        return $this->belongsTo(Projecto::class, 'it_id_projecto');
    }

    /**
     * Relacionamento com CategoriaTarefa
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaTarefa::class, 'it_id_cat_tarefa');
    }
    // Tarefa.php


}

