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
        Schema::create('delitos_leivs', function (Blueprint $table) {
            $table->id();
            $table->enum('delito', $this->DELITOS_LEIV())->nullable();
            $table->bigInteger('caso_fk')->unsigned();
            // Llaves Foreaneas
            $table->foreign('caso_fk')->references('id')->on('casos');

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
        Schema::dropIfExists('delitos_leivs');
    }

    public function DELITOS_LEIV(){
        return [
            'Difusión de pornografía',
            'Difusión ilegal de información',
            'Expresiones de violencia contra las mujeres',
            'Favorecimiento al incumplimiento de los deberes de asistencia económicos',
            'Feminicidio',
            'Feminicidio agravado',
            'Inducción, promoción y favorecimiento de actos sexuales o eróticos por medios informáticos o electrónicos',
            'Obstaculización al acceso de la justica',
            'Suicidio feminicida por inducción',
            'Sustracción de utilidades de las actividades económicas familiares',
            'Sustracción patrimonial',
        ];
    }
};
