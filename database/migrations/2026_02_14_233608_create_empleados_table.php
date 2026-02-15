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
        Schema::create('m_empleados', function (Blueprint $table) {
            $table->id();
            $table->string('clave_empleado')->unique();
            $table->string('nombre');
            $table->integer('edad');
            $table->date('fecha_nacimiento');
            $table->string('genero', 20);
            $table->decimal('sueldo_base', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
