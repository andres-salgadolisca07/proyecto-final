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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iden')->nullable();
            $table->string('email');
            $table->string('tel')->nullable();
            $table->string('tipo_p')->nullable();
            $table->string('nom_empresa')->nullable();
            $table->string('tipo_solicitud')->nullable();
            $table->string('solicitud')->nullable();
            $table->string('documento')->nullable();
            $table->string('metodo_respuesta')->nullable();
            $table->string('respuesta')->nullable();

            $table->date('plazo_respuesta')->nullable();
            $table->timestamps();
            $table->foreignId('dependencia_id')->references('id')->on('dependencias');
            $table->foreignId('opcion_id')->references('id')->on('opciones');
            $table->foreignId('estados_id')->references('id')->on('estados');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
