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
        Schema::create('historico_ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')->references('id')->on('ubicaciones');
            $table->integer('temperatura');
            $table->integer('humedad');
            $table->double('viento');
            $table->string('descripcion');
            $table->timestamp('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_ubicaciones');
    }
};
