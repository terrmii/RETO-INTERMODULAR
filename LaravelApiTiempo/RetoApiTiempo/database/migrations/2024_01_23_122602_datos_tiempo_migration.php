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
        Schema::create('datos_tiempo', function (Blueprint $table) {
            $table->id();
            $table->integer('temperatura_real');
            $table->integer('temperatura_fake');
            $table->integer('humedad');
            $table->double('viento');
            $table->string('descripcion');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')->references('id')->on('ubicaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_tiempo');
    }
};
