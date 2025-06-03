<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaccionestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id('id_transaccion');
            $table->foreignId('id_compra')->constrained('compras', 'id_compra')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_transaccion');
            $table->enum('tipo_transaccion', ['entrada', 'salida']);
            $table->enum('estado_transaccion', ['pendiente', 'completada', 'fallida']);
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
