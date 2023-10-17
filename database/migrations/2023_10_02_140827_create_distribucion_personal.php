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
    Schema::create('distribucion_personal', function (Blueprint $table) {
      $table->id();
      $table->string('nombre')->nullable();
      $table->string('apellido')->nullable();
      $table->unsignedBigInteger('distribucion_id')->nullable();
      $table->unsignedBigInteger('area_id')->nullable();
      $table->unsignedBigInteger('cargo_id')->nullable();
      $table->unsignedBigInteger('categoriacargo_id')->nullable();
      $table->string('teldirecto')->nullable();
      $table->string('interno')->nullable();
      $table->string('telcelular')->nullable();
      $table->unsignedBigInteger('profesion_id')->nullable();
      $table->string('telparticular')->nullable();
      $table->string('email')->nullable();
      $table->longText('observaciones')->nullable();
      $table->boolean('fuera')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('distribucion_personal');
  }
};
