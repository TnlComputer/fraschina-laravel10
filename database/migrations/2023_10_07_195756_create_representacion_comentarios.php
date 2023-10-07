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
        Schema::create('representacion_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('representacion_id')->nullable();
            $table->date('fecha')->nullable();
            $table->longText('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representacion_comentarios');
    }
};
