<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductosCategoriastable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->foreignId('id_producto')->constrained('productos', 'id_producto')->onDelete('cascade');
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria')->onDelete('cascade');
            $table->primary(['id_producto', 'id_categoria']);
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
