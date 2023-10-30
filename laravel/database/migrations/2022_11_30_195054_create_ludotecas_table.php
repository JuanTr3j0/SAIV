<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\FuncCall;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ludotecas', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('caso_fk');
            $table -> string('parentesco_responsable_otro')->nullable();
            
            $table -> dateTime('tipo_atencion_fecha_hora')->nullable();
            $table -> dateTime('orientacion_responsables_fecha_hora')->nullable();
            $table -> dateTime('proxima_cita')->nullable();  
            
            // Enum's
            $table -> enum('parentesco_responsable', $this->ENUM_PARENTESCO())->nullable();
            $table -> enum('tipo_atencion', $this->ENUM_TIPO_ATENCION_MENORES())->nullable();
            $table -> enum('orientacion_responsables', $this->ENUM_ORIENTACION_RESPONSABLE())->nullable();
            $table -> enum('escolaridad', $this->ENUM_ESCOLARIDAD())->nullable();
            
            //Llaves foráneas
            $table -> unsignedBigInteger('adolecente_nino_fk')->nullable();
            $table -> unsignedBigInteger('responsable_fk')->nullable();

            $table -> foreign('responsable_fk')->references('id')->on('personas');
            $table -> foreign('adolecente_nino_fk')->references('id')->on('personas');
            
            $table->boolean('estado')->nullable()->default(true);  // Agregado Nuevo
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ludotecas');
    }

    private function ENUM_PARENTESCO(){
        return [
            'Ninguno',
            'Madre',
            'Tia/o',
            'Abuela/o',
            'Otro'
        ];
    }

    private function ENUM_TIPO_ATENCION_MENORES(){
        return [
            'Terapia Lúdica Primera Vez',
            'Seguimiento',
            'Resguardo',
            'Intervención en Crisis',
            'Grupo de Apoyo de Adolescentes',
            'Resguardo para Diligencia en Cámara Gessell',
            'Preparación para Diligencia en Cámara Gessell',
        ];
    }

    private function ENUM_ORIENTACION_RESPONSABLE(){
        return [
            'Primera Vez',
            'Seguimiento',
            'Seguimiento Telefónico',
            'Atención Grupal'
        ];
    }

    private function ENUM_ESCOLARIDAD(){
        return [
            'Preescolar',
            '1° Grado',
            '2° Grado',
            '3° Grado',
            '4° Grado',
            '5° Grado',
            '6° Grado',
            '7° Grado',
            '8° Grado',
            '9° Grado',
            '1° Bachillerato',
            '2° Bachillerato',
            '3° Bachillerato',
        ];
    }
};
