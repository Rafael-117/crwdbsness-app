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
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('estado')->nullable();
            $table->json('responsables');
            $table->double('valor_inicial', 20, 2);
            $table->double('valor_final', 20, 2)->nullable();
            $table->double('valor_actual', 20, 2)->nullable();
            $table->double('meta', 20, 2);
            $table->string('riesgo')->nullable();
            $table->string('rendimiento')->nullable();
            $table->mediumInteger('acciones')->nullable();
            $table->string('pagos')->nullable();
            $table->string('periodo_pago')->nullable();
            $table->json('informacion_proyecto');
            $table->json('campaña_comercial');
            $table->json('capitalizacion');
            $table->json('evaluacion_financiera');
            $table->string('logo_url');
            $table->string('portada_url');
            $table->string('ubicacion')->nullable();
            $table->string('editable');
            $table->string('status');
            $table->timestamps();
            $table->foreign('companie_id')->references('id')->on('companies');
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
