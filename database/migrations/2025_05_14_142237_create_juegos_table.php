<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_lanzamiento')->nullable();
            $table->string('imagen', 255); // Ruta o nombre de la imagen
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('plataforma_id');
            $table->string('desarrollador')->nullable();
            $table->string('clasificacion_edad')->nullable(); // PEGI, ESRB, etc.
            $table->integer('stock')->default(0);
            $table->timestamps();

            // Claves foráneas con onDelete('cascade') y onUpdate('cascade')
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
