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
    Schema::create('distribucion_linea_pedidos', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('pedido_id')->nullable();
      $table->date('fecha')->nullable();
      $table->unsignedBigInteger('producto_id')->nullable();
      $table->decimal('cantidad', 8, 0)->nullable();
      $table->double('precio_unitario', 12, 2)->nullable();
      $table->string('totalPedido', 12)->nullable();
      $table->double('totalPedidoN', 12, 2)->nullable();
      $table->double('total_factura', 12, 2)->nullable();
      $table->string('nombre_producto', 120)->nullable();
      $table->string('linea', 2)->nullable();
      $table->string('bandera', 2)->nullable();
      $table->unsignedBigInteger('distribucion_id')->nullable();
      $table->date('fechaEntrega')->nullable();
      $table->string('prePed', 1)->nullable();
      $table->string('cambiar', 2)->nullable();
      $table->string('retirar', 2)->nullable();
      $table->decimal('estado_pedido', 1, 0)->nullable();
      $table->decimal('estado_tarea', 1, 0)->nullable();
      $table->string('chofer', 2)->nullable();
      $table->decimal('orden', 1, 0)->nullable();
      $table->date('fechaFactura')->nullable();
      $table->decimal('nroFactura', 20)->nullable();
      $table->decimal('estado_stock', 1, 0)->nullable();
      $table->string('status', 1)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('distribucion_linea_pedidos');
  }
};
