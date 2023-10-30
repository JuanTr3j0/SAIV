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
        Schema::create('archivos_casos', function (Blueprint $table) {
            
            $table->bigInteger('caso_fk')->unsigned();
            $table->bigInteger('archivo_fk')->unsigned();

            // Llaves Foreaneas
            $table->foreign('caso_fk')->references('id')->on('casos');
            $table->foreign('archivo_fk')->references('id')->on('archivos');
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
        Schema::dropIfExists('archivos_casos');
    }
};
