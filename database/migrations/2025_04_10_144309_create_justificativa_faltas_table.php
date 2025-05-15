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
        Schema::create('justificativa_faltas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('it_id_frequencia');
            $table->foreign('it_id_frequencia')->references('id')->on('frequencias')->cascadeOnDelete();
            $table->String('vc_descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justificativa_faltas');
    }
};
