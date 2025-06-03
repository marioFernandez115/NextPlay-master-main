<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comprastable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->foreignId('id_producto')->constrained('productos', 'id_producto')->onDelete('cascade');
            $table->foreignId('id_comprador')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->date('fecha_compra');
            $table->decimal('precio_final', 10, 2);
            $table->enum('estado_compra', ['pendiente', 'completada', 'cancelada']);
            $table->string('clave_entregada')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
