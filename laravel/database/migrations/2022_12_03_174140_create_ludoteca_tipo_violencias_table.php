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
        Schema::create('ludoteca_tipo_violencias', function (Blueprint $table) {
            $table->id();
            $table->enum('opcion', $this->ENUM_TIPO_VIOLENCIA());

            //Llave Foreanea
            $table->unsignedBigInteger('ludoteca_fk');
            $table->foreign('ludoteca_fk')->references('id')->on('ludotecas');
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
        Schema::dropIfExists('ludoteca_tipo_violencias');
    }
    
    private function ENUM_TIPO_VIOLENCIA(){
        return [
            'Psicológica/Emocional',
            'Económica',
            'Física',
            'Abuso Sexual',
            'Agresión Sexual',
            'Violencia Intrafamiliar',
            'Maltrato Infantil',
            'Auto Vulneración De Derechos',
            'Violencia Feminicida',
        ];
    }
};
