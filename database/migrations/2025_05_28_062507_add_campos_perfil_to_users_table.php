<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposPerfilToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'salario')) {
                $table->decimal('salario', 8, 2)->default(0)->after('avatar');
            }
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (Schema::hasColumn('usuarios', 'salario')) {
                $table->dropColumn('salario');
            }
        });
    }
}
