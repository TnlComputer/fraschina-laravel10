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
    Schema::create('distribucions', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('clisg_id')->nullable();
      $table->unsignedBigInteger('cliCDant_id')->nullable();
      $table->string('razonsocial', 50)->nullable();
      $table->string('nomfantasia', 100)->nullable();
      $table->unsignedBigInteger('dire_calle_id')->nullable();
      $table->string('dire_nro', 30)->nullable();
      $table->string('dire_obs', 100)->nullable();
      $table->string('codpost', 30)->nullable();
      $table->unsignedBigInteger('barrio_id')->nullable();
      $table->unsignedBigInteger('zona_id')->nullable();
      $table->string('telefono', 200)->nullable();
      $table->string('fax', 50)->nullable();
      $table->string('cuit', 50)->nullable();
      $table->string('fac_imp', 2)->nullable();
      $table->unsignedBigInteger('municipio_id')->nullable();
      $table->string('marcas', 200)->nullable();
      $table->longText('info')->nullable();
      $table->unsignedBigInteger('contacto_id')->nullable();
      $table->string('horario', 50)->nullable();
      $table->longText('objetivos')->nullable();
      $table->longText('comentarios')->nullable();
      $table->date('fechagira')->nullable();
      $table->unsignedBigInteger('rubro_id')->nullable();
      $table->unsignedBigInteger('tamanio_id')->nullable();
      $table->unsignedBigInteger('modo_id')->nullable();
      $table->unsignedBigInteger('localidad_id')->nullable();
      $table->string('correo')->nullable();
      $table->string('piso', 4)->nullable();
      $table->string('dpto', 4)->nullable();
      $table->time('desde')->nullable();
      $table->time('hasta')->nullable();
      $table->string('lunes', 2)->nullable();
      $table->string('sabado', 2)->nullable();
      $table->unsignedBigInteger('productos_id')->nullable();
      $table->unsignedBigInteger('veraz_id')->nullable();
      $table->unsignedBigInteger('estado_id')->nullable();
      $table->longText('obsrecep')->nullable();
      $table->time('desde1')->nullable();
      $table->time('hasta1')->nullable();
      $table->string('auto', 2)->nullable();
      $table->string('productCDA', 200)->nullable();
      $table->unsignedBigInteger('cobro_id')->nullable();
      $table->unsignedBigInteger('tcobro_id')->nullable();
      $table->unsignedBigInteger('cobrar_id')->nullable();
      $table->string('status', 1)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('distribucions');
  }
};
