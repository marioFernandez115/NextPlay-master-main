<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mensajestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('id_mensaje');
            $table->foreignId('id_emisor')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->foreignId('id_receptor')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->text('mensaje');
            $table->timestamp('fecha_envio');
            $table->boolean('leido')->default(false);
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
