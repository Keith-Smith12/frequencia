<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categoria_Tarefas', function(Blueprint $table){
            $table->id();
            $table->string('vc_nome');
            $table->string('dt_descricao')->nullable();
            $table->string('vc_prioridade');
            $table->integer('it_tempo_estimado');
            $table->string('vc_tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
