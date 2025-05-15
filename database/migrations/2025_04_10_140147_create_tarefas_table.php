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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id(); 
            $table->string('vc_nome'); 
            $table->unsignedBigInteger('it_id_projecto'); 
            $table->unsignedBigInteger('it_id_cat_tarefa');
            $table->date('dt_data_entrega'); 
            $table->timestamps();

            $table->foreign('it_id_projecto')->references('id')->on('projectos')->cascadeOnDelete();
            $table->foreign('it_id_cat_tarefa')->references('id')->on('categoria_tarefas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};