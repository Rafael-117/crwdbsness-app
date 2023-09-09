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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('num_acciones');
            $table->double('precio_acccion', 10, 2);
            $table->double('monto', 10, 2);
            $table->double('comision', 10, 2);
            $table->double('impuestos', 10, 2);
            $table->double('total', 10, 2);
            $table->string('tipo');
            $table->string('status');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};


