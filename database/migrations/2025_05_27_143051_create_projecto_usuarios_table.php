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
        Schema::create('projecto_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('it_id_user');
            $table->foreign('it_id_user')->references('id')->on('users');
            $table->unsignedBigInteger('it_id_projecto');
            $table->foreign('it_id_projecto')->references('id')->on('projectos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projecto_usuarios');
    }
};
