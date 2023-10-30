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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('denuncia');
            $table->string('mes');
            $table->string('anio');
            $table->bigInteger('correlativo')->nullable();
            $table->bigInteger('victima_fk')->nullable()->unsigned();
            
            $table->date('fecha_hecho')->nullable();
            $table->time('hora_hecho')->nullable();
            $table->dateTime('fecha_registro')->nullable();
            
            $table->bigInteger('responsable_fk')->unsigned()->nullable();
            $table->bigInteger('municipio_ocurrencia_fk')->unsigned()->nullable();
            $table->string('institucion_remitente_otra')->nullable();
            $table->text('delito_codigo_penal_otro')->nullable();
            
            $table->enum('circunstancia_del_hecho', ['Primero', 'Reincidente', 'Múltiple'])->nullable(); // Nuevo
            $table->enum('institucion_remitente', $this->ENUM_INSTITUCION_QUE_REMITE())->nullable();
            $table->enum('tipos_violencia', $this->ENUM_TIPOS_VIOLENCIA())->nullable();
            $table->enum('modalidad_violencia', $this->ENUM_MODALIDAD_VIOLENCIA())->nullable();
            $table->enum('delito_codigo_penal', $this->ENUM_DELITOS_CODIGO_PENAL())->nullable();
            
            $table->boolean('estado')->default(true);
            
            // Llaves foreaneas
            $table->foreign('victima_fk')->references('id')->on('personas');
            $table->foreign('responsable_fk')->references('id')->on('personas');
            $table->foreign('municipio_ocurrencia_fk')->references('id')->on('municipios');
            
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
        Schema::dropIfExists('casos');
    }


    private function ENUM_TIPOS_VIOLENCIA() {
        return[
            'Ciberviolencia o Ciberacoso',
            'Económica',
            'Feminicida',
            'Física',
            'Física / Feminicida',
            'Patrimonial',
            'Psicológica / Emocional',
            'Psicológica / Emocional y Física',
            'Psicológica / Emocional y Patrimonial',
            'Psicológica / Emocional y Sexual',
            'Sexual',
            'Simbólica',
        ];
    }
    
    private function ENUM_MODALIDAD_VIOLENCIA() {
        return[
            'Violencia Intrafamiliar',
            'Violencia Comunitaria ',
            'Violencia Institucional',
            'Violencia Laboral',
            'Violencia Política',
            'Violencia no Convencional',
        ];
    }

    private function ENUM_DELITOS_CODIGO_PENAL(){
        return [           
            'Agresión Sexual en Menor e Incapaz',
            'Amenazas',
            'Estupro',
            'Incumplimiento de los Deberes de Asistencia Económica',
            'Lesiones',
            'Maltrato Infantil',
            'Otras Agresiones Sexuales',
            'Otro',
            'Trata',
            'Violación',
            'Violación en Menor e Incapaz',
            'Violencia Intrafamiliar',
            'Acoso Sexual',
        ];
    }

    private function ENUM_INSTITUCION_QUE_REMITE(){
        return [
            'Asociaciones y ONG',
            'Ciudad Mujer',
            'FGR',
            'ISDEMU',
            'JPNNA',
            'Juzgados',
            'Ministerio de Salud ',
            'Otra',
            'PDDH',
            'Personal',
            'PGR',
            'PNC - 911',
            'UMM',
            'UNIMUJER',
            'UNIMUJER / ODAC',
        ];
    }
};