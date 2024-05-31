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
        Schema::create('casos_tipos_violencias', function (Blueprint $table) {
            //crea las columnas en la tabla
            $table->unsignedBigInteger('casos_fk');
            $table->unsignedBigInteger('tipos_violencia_fk');

            //crea las llaves foraneas para conectar con las tablas
            $table->foreign('casos_fk')->references('id')->on('casos')->foreign();
            $table->foreign('tipos_violencia_fk')->references('id')->on('tipo_violencias')->foreign();

            //creamos una llave compuesta
            $table->primary(['casos_fk','tipos_violencia_fk']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos_tipos_violencias');
    }
};
