<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaNacimientoToUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('usuarios', function (Blueprint $table) {
        $table->date('fecha_nacimiento')->nullable();
    });
}

public function down()
{
    Schema::table('usuarios', function (Blueprint $table) {
        $table->dropColumn('fecha_nacimiento');
    });
}
}
