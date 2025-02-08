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
        Schema::create('atencion_psicologica', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('caso_fk');
            $table->date('fecha_atencion'); 
            $table->time('hora_atencion');
            $table->integer('numero_sesion');

            $table->enum('objetivo_atencion', $this->ENUM_OBJETIVO_ATENCION());
            $table->string('objetivo_atencion_otro')->nullable();

            $table->enum('situacion_actual_caso', $this->ENUM_SITUACION_ACTUAL_CASO());
            $table->string('situacion_actual_caso_otro')->nullable();

            $table->string('observaciones')->nullable();

            $table->string('recomendaciones')->nullable();

            $table->enum('referencias',$this->ENUM_REFERENCIAS());
            $table->string('referencias_otro')->nullable();

            $table->unsignedBigInteger('profesional_responsable_fk')->nullable();//por defecto el input se llenara con el nombre del usuario logeado, pero se puede modificar ya que puede ser que el nombre del usuario no corresponda

            $table->timestamps();

            
            //Llaves foráneas
            $table->foreign('caso_fk')->references('id')->on('casos');
            $table->foreign('profesional_responsable_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencion_psicologica');
    }

    
    private function ENUM_OBJETIVO_ATENCION(){

        return [
            'Entrevista Inicial',
            'Seguimiento terapéutico',
            'Intervención en crisis',
            'Preparación para audiencia',
            'Acompañamiento a la audiencia',
            'Terapia familiar',
            'Grupo de autoayuda',
            'Evaluación de riesgo',
            'Elaboración de plan de seguridad',           
        ];

    }

    private function ENUM_SITUACION_ACTUAL_CASO(){
        return [
            'Activo',
            'Cierre por cumplimiento de objetivo terapéutico',
            'Cierre por abandono de proceso voluntario',
            'Cierre por abandono por desplazamiento',
            'Cierre por abandono por trabajo',
            'Cierre por abandono por razones económicas',
            'Cierre atención en otra instancia'
        ];
    }

    private function ENUM_REFERENCIAS(){
        return [
            'Referir a trabajo social',
            'Referir a Ludoteca',
            'Referir a Legal',
            'Referir a Educadora',
            'Referir a Médica',
            'Referir a PNC',
            'Referir a Juzgados',
            'Referir a CONAPINA',
            'Otros Especificar'
        ];
    }
};
