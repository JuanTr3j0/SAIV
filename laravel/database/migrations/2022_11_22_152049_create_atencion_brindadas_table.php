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
        Schema::create('atencion_brindadas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('atencion_brindadas_fk')->nullable()->unsigned();
            $table->enum('opcion', $this->ENUN_ATENCION())->nullable();
            
            // Llaves Foreaneas
            $table->foreign('atencion_brindadas_fk')->references('id')->on('atencion_brindadas');
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
        Schema::dropIfExists('atencion_brindadas');
    }

    public function ENUN_ATENCION()
    {
        return [
            // Opcion
            'Orientación Legal por Teléfono',
            'Orientación Legal Presencial',
            'Acompañamiento Sede Judicial ',
            'Acompañamiento Trámite Administrativo',
                // Sub Opciones
                
            'Seguimiento de Caso vía Telefónica',
            'Seguimiento de Caso Presencial',
            'Revisión de Expediente',
            'Elaboración de Escritos para Juzgados',
             // Sub Opciones
                'Juzgado de Familia',
                'Juzgado de Paz',// (menú municipio)
                'Juzgado 2° de Paz',// (menú Chalatenango, Dulce Nombre de María, Tejutla y Nueva Concepción)
                'Otro',
            'Elaboración Otros Documentos',
            // Sub Opciones
                'Declaración Jurada',
                'Declaración de Ingresos y Egresos',
                'Certificaciones',
                //'Otro',
            'Referencia a Otras Instituciones',
            // Sub Opciones
                'PGR',
                'PDDH',
                'FGR',
                //'Otro',
        ];
    }
};
