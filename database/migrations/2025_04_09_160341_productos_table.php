<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productostable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->foreignId('id_vendedor')
                ->constrained('usuarios', 'id_usuario')
                ->onDelete('cascade');

            $table->string('titulo');
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->enum('plataforma', ['PC', 'PlayStation', 'Xbox', 'Switch']);
            $table->enum('tipo_producto', ['juego', 'DLC', 'otro']);
            $table->string('imagen');
            $table->date('fecha_publicacion');
            $table->enum('estado', ['disponible', 'vendido', 'inactivo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
