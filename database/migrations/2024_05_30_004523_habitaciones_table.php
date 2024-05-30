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
        Schema::create('habitaciones', function (Blueprint $table) {

            $table->id();

            $table->string('nombre');
            $table->string('numero_habitacion');
            $table->string('tipo_habitacion');
            $table->string('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('capacidad');
            $table->string('estado');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
