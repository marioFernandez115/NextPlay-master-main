<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Valoracionestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id('id_valoracion');
            $table->foreignId('id_compra')->constrained('compras', 'id_compra')->onDelete('cascade');
            $table->foreignId('id_receptor')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->tinyInteger('puntuacion')->unsigned(); // 1-5
            $table->text('comentario')->nullable();
            $table->date('fecha_valoracion');
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
