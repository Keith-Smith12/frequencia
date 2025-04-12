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
        Schema::create(
            'projectos',
            function (Blueprint $table) {
                $table->id();
                $table->string('vc_nome');
                $table->date('dt_data_inicio');
                $table->date('dt_data_conclusao');
                $table->integer('it_estado');
                $table->string('vc_prioridade')->nullable();
                $table->integer('it_id_usuario');
                $table->string('ativo');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projectos');
    }
};
