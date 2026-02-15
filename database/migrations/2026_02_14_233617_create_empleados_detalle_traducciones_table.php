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
        Schema::create('d_empleados_traducciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('empleado_id')->constrained('m_empleados')->onDelete('cascade');
            $table->text('acerca_de_mi')->nullable();
            $table->text('pasatiempos')->nullable();
            $table->string('idioma', 5); // ej: es, en, fr
            $table->timestamps();
            $table->unique(['empleado_id', 'idioma']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados_detalle_traducciones');
    }
};
