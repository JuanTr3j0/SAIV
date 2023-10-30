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
        Schema::create('tipo_asistencias', function (Blueprint $table) {
            $table->bigInteger('caso_fk')->unsigned();
            $table->enum('asistencia', $this->ENUN_TIPO_ASISTENCIAS())->nullable();
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
        Schema::dropIfExists('tipo_asistencias');
    }

    private function ENUN_TIPO_ASISTENCIAS(){
        return[
            'Acompañamiento Hospital',
            'Acompañamiento IML',
            'Atención Legal',
            'Atención Lúdica',
            'Atención Psicológica',
            'Atención Trabajo Social',
            'Aviso FGR',
            'Aviso JPNNA',
            'Escucha Activa',
            'Intervención en Crisis',
            'Médica',
            'Resguardo',
            'Ruta Crítica',
            'Toma de Denuncia',
            'Traslado',
        ];
    }
};
