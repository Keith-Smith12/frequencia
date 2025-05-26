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
        Schema::create('tarefa_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('it_id_usuario');
            $table->unsignedBigInteger('it_id_tarefa');
            $table->date('dt_data_atribuicao');
            $table->timestamps();
            $table->foreign('it_id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('it_id_tarefa')->references('id')->on('tarefas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa_usuarios');
    }
};
