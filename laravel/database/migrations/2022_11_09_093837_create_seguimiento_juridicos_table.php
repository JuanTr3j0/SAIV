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
        Schema::create('seguimiento_juridicos', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->nullable()->default(true);
            $table->string('atencion_brindada_otro')->nullable(); 
            $table->dateTime('tipo_servicio_fecha_hora')->nullable(); 
            $table->date('medidas_proteccion_inicio')->nullable(); 
            $table->date('medidas_proteccion_final')->nullable(); 
            $table->dateTime('audiencia_preliminar')->nullable(); 
            $table->dateTime('audiencia_publica')->nullable();          
            $table->dateTime('familia_procuraduria_general_hora_fecha')->nullable();   
            $table->text('familia_procuraduria_general_acuerdo')->nullable();  
            $table->dateTime('familia_audiencia_preliminar_hora_fecha')->nullable(); 
            $table->text('familia_audiencia_preliminar_resolucion')->nullable(); 
            $table->dateTime('familia_audiencia_sentencia_hora_fecha')->nullable(); 
            $table->text('familia_audiencia_sentencia_resolucion')->nullable(); 
            $table->bigInteger('violencia_mujer_sede_municipio_fk')->unsigned()->nullable(); 
           // $table->text('derecho_nines_adolecencia_vulneracion')->nullable(); 
            $table->dateTime('referencia_servicios_hora_fecha')->nullable();
            $table->dateTime('cierre_expediente_hora_fecha')->nullable();
            $table->text('derecho_nines_adolecencia_otro')->nullable();
            $table->text('familia_demanda_otro')->nullable();
            
            // ENUM
            $table->enum('tipo_servicio', ['Primera Vez', 'Seguimiento'])->nullable();
            $table->enum('servicio_que_remite', $this->ENUM_SERVICIO_REMITE())->nullable();
            $table->enum('audiencia_preliminar_resolucion', ['Medidas de Protección', 'Finalización de Proceso', 'Medidas de Protección y Finalización de Proceso'])->nullable();
            $table->enum('audiencia_publica_resolucion', ['Medidas de Protección', 'Sentencia Condenatoria', 'Sentencia Absolutoria'])->nullable();
            $table->enum('familia_demanda', $this->ENUM_FAMILIA_DEMANDA())->nullable();
            $table->enum('violencia_mujer_diligencia', ['Audiencia Inicial', 'Audiencia Cámara Gesell', 'Audiencia Preliminar', 'Audiencia de Sentencia'])->nullable();
            $table->enum('sede_judicial_diligencia', $this->ENUM_SEDE_JUDICIAL_DILIGENCIA())->nullable();
            $table->enum('violencia_mujer_resolucion', $this->ENUM_VIOLENCIA_MUJER_RESOLUCION())->nullable();
            $table->enum('derecho_nines_adolecencia', $this->ENUM_DERECHO_NIÑES_ADOLECENCIA())->nullable();
            $table->enum('referencia_servicios', $this->ENUM_REFERENCIA_A_SERVICIOS())->nullable();
            $table->enum('cierre_expediente', $this->ENUM_CIERRE_EXPEDIENTE())->nullable();
            $table->enum('institucion_a_la_que_se_refiere', $this->ENUM_INSTITUCION_A_LA_QUE_SE_REFIERE())->nullable();
            
            $table->enum('derecho_nines_adolecencia_vulneracion', $this->VULNERACION_DERECHOS())->nullable(); // NUEVO
            $table->enum('derecho_nines_adolecencia_auto_vulneración_de_derechos', $this->AUTO_VULNERACION_DERECHOS())->nullable(); // NUEVO
            
            // Llaves Foreaneas
            $table->bigInteger('caso_fk')->unsigned();
            $table->bigInteger('atencion_brindada_fk')->unsigned()->nullable(); 
            $table->foreign('caso_fk')->references('id')->on('casos');
            $table->foreign('atencion_brindada_fk')->references('id')->on('atencion_brindadas');
            $table->foreign('violencia_mujer_sede_municipio_fk')->references('id')->on('municipios');
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
        Schema::dropIfExists('seguimiento_juridicos');
    }

    private function ENUM_SERVICIO_REMITE(){
        return [
            'Coordinación',
            'Psicología',
            'Ludoteca',
            'Médica',
            'UNIMUJER',
            'Trabajo Social',
        ];
    }

    private function ENUM_FAMILIA_DEMANDA(){
        return [
            'Cuota Alimenticia ',
            'Régimen de Visita',
            'Protección a la Vivienda Familiar ',
            'Divorcio: por Mutuo Consentimiento ',
            'Separación de Uno o Más Años ',
            'Vida Intolerable ',
            'Pérdida de Autoridad Parental ',
            'Suspensión de Autoridad Parental ',
            'Otro',
        ];
    } 

    private function ENUM_SEDE_JUDICIAL_DILIGENCIA(){
        return[
            'Juzgado de Paz',
            'Juzgado de Familia',
            'Juzgado de Primera Instancia',
            'Juzgado de Sentencia',
            'Juzgado de Instrucción Especializado para una Vida Libre de Violencia y Discriminación para las Mujeres',
            'Juzgado de Sentencia Especializado para una Vida Libre de Violencia y Discriminación para las Mujeres',
        ];
    }

    private function ENUM_VIOLENCIA_MUJER_RESOLUCION(){
        return[
            'Sentencia Condenatoria',
            'Sentencia Absolutoria',
            'Suspensión Condicional del Procedimiento',
            'Sobreseimiento Provisional',
            'Sobreseimiento Definitivo',
        ];
    }

    private function ENUM_DERECHO_NIÑES_ADOLECENCIA(){
        return[
            'Vulneración a Derechos',// (especifique)
            'Auto Vulneración a Derechos',
            'Autorización para Salida del País',
            'Otro'
        ];
    }

    private function ENUM_REFERENCIA_A_SERVICIOS(){
        return[
            'Servicio de Coordinación',
            'Servicio Policial',
            'Servicio Psicológico',
            'Servicio Social',
            'Servicio Médico',
            'Servicio lúdico',
            'Servicio Trabajo Social',
            'Toma de Denuncia',
        ];
    }

    private function ENUM_INSTITUCION_A_LA_QUE_SE_REFIERE(){
        return [
            'JPNA',
            'PGR',
            'Juzgados Especializados NA',
        ];
    }

    private function ENUM_CIERRE_EXPEDIENTE(){
        return[
            'Cumplimiento de Objetivos',
            'Inasistencia de Usuaria',
            'Usuaria no Desea Continuar con el Proceso',
            'Usuaria Referida a Otra Institución',
        ];
    }

    private function VULNERACION_DERECHOS(){
        return [
            'Alimentación y Nutrición Balanceada',
            'Vivienda Digna, Segura e Higiénica',
            'Salud',
            'Educación',
            'Vestuario Adecuado',
            'Cultura, Recreación y Sano Esparcimiento',
            'Derecho a la Identidad',
            'Integridad Personal',
            'Integridad Emocional ',
            'Reunificación Familiar ',
            'Derecho al Honor, Imagen, Vida Privada e Intimidad',
            'Acceso a la Justicia',
            'Derecho de Petición y Respuesta ',
            'Derecho al Acceso a la Información',
        ];
    }

    private function AUTO_VULNERACION_DERECHOS(){
        return [
            'Autolesiones',
            'Trastorno Alimenticio',
            'Uso y Abuso de Sustancia Psicotrópica',
            'Pensamiento e Intentos Suicidas',
        ];
    }
};
