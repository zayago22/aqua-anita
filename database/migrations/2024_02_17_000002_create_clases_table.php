<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Clases Grupales, Individuales, Matronatación
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('imagen_principal')->nullable();
            $table->string('icono')->default('fas fa-swimming-pool'); // Font Awesome icon
            $table->boolean('activo')->default(true);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });

        Schema::create('clase_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clase_id')->constrained('clases')->onDelete('cascade');
            $table->string('imagen');
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clase_imagenes');
        Schema::dropIfExists('clases');
    }
};
