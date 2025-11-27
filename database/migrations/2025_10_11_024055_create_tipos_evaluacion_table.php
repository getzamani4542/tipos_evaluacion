<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipos_evaluacion', function (Blueprint $table) {
            $table->id();
            $table->char('plan_de_estudios', 1)->collation('utf8mb4_unicode_ci');
            $table->char('tipo_evaluacion', 2);
            $table->string('descripcion_evaluacion', 80)->nullable();
            $table->string('descripcion_corta_evaluacion', 10)->nullable();
            $table->integer('calif_minima_aprobatoria')->nullable();
            $table->char('evaluacion_depende', 2)->nullable();
            $table->char('usocurso', 1)->nullable();
            $table->char('nosegundas', 1)->nullable();
            $table->integer('orden')->nullable();
            $table->integer('prioridad')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_evaluacion');
    }
};
