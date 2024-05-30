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
        Schema::create('reservas', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('habitacion_id');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->string('estado');
            $table->decimal('total', 8, 2);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
