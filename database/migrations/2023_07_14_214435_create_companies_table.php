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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nombre');
            $table->string('razon');
            $table->string('rfc', 20);
            $table->text('descripcion');
            $table->string('encargado');
            $table->string('web');
            $table->unsignedBigInteger('sector');
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->string('logo_url');
            $table->string('status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sector')->references('id')->on('sectors');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
