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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->unique();
            $table->string('mac')->unique();
            $table->timestamp('fecha_conexion')->nullable();
            $table->timestamp('fin_conexion')->nullable();
            $table->unsignedBigInteger('network_id');
            $table->string('sistema_operativo');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('network_id')->references('id')->on('networks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
