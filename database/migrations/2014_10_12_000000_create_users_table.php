<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->bigIncrements('id_usuario');
            $table->string('nombre_usuario');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('avatar')->nullable();
            $table->decimal('saldo', 8, 2)->default(0);
            $table->enum('rol', ['admin', 'usuario'])->default('usuario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
