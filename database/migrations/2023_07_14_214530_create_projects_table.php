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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companie_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->json('responsables')->nullable();
            $table->double('valor_inicial', 20, 2)->nullable();
            $table->double('valor_final', 20, 2)->nullable();
            $table->double('valor_actual', 20, 2)->nullable();
            $table->double('meta', 20, 2)->nullable();
            $table->string('meta_minima')->nullable();
            $table->string('riesgo')->nullable();
            $table->string('rendimiento')->nullable();
            $table->mediumInteger('acciones')->nullable();
            $table->string('pagos')->nullable();
            $table->string('periodo_pago')->nullable();
            $table->string('oferta_accionaria')->nullable();
            $table->string('monto_financiamiento')->nullable();
            $table->json('informacion_proyecto')->nullable();
            $table->json('campaña_comercial')->nullable();
            $table->json('capitalizacion')->nullable();
            $table->json('evaluacion_financiera')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('portada_url')->nullable();
            $table->string('ubicacion')->nullable();
            $table->json('adjuntos')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('companie_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
