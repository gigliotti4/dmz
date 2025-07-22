<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Añadir el campo categoria_id
            $table->unsignedBigInteger('categoria_id')->nullable()->after('id');
            
            // Crear la relación con la tabla categorías
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar la clave foránea
            $table->dropForeign(['categoria_id']);
            
            // Eliminar el campo
            $table->dropColumn('categoria_id');
        });
    }
};
