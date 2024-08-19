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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('mac');
            $table->timestamp('fecha_conexion')->nullable();
            $table->timestamp('fin_conexion')->nullable();
            $table->unsignedBigInteger('lab_id');
            $table->string('sistema_operativo');
            $table->timestamps();

            // Relación con la tabla de laboratorios
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
