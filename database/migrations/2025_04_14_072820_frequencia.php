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
        Schema::create('frequencia', function (Blueprint $table) {
            $table->id();
            $table->date('dt_data');
            $table->time('tm_hora_entrada');
            $table->time('tm_hora_saida');
            $table->integer('id_usuario');
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
