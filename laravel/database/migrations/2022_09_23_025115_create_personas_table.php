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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_nacimiento')->nullable();
            
            $table->string('dui')->nullable();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('telefono_movil')->nullable();
            $table->string('telefono_casa')->nullable();
            $table->string('direccion')->nullable();
            $table->string('lugar_trabajo')->nullable();// Nuevo
            $table->string('direccion_trabajo')->nullable();// Nuevo
            $table->string('otra_nacionalidad')->nullable();// Nuevo

            $table->string('ocupacion_otra')->nullable();// Nuevo
            $table->string('propietario_residencia_otro')->nullable();
            $table->string('fuente_ingresos_otro')->nullable();
            $table->string('relacion_victima_otro')->nullable();
            
            // Enums
            $table->enum('relacion_victima', $this->RELACION_VICTIMA())->nullable();
            $table->enum('empresa', ['Claro', 'Digicel', 'Movistar', 'Tigo'])->nullable();
            $table->enum('discapacidad', $this->ENUM_DISCAPACIDAD())->nullable()->default('Ninguna');
            $table->enum('ocupacion', $this->ENUM_OCUPACION())->nullable();// Nuevo
            $table->enum('zona_residencial', $this->ENUM_ZONA_RESIDENCIAL())->nullable(); // Nuevo
            $table->enum('sexo', $this->ENUM_SEXO())->nullable(); // Nuevo
            $table->enum('genero', $this->ENUM_GENERO())->nullable(); // Nuevo
            $table->enum('sabe_escribir_leer', ['Si', 'No', 'Solo Sabe Firmar'])->nullable(); // Nuevo
            $table->enum('nivel_educacion', $this->ENUN_NIVEL_EDUCATIVO())->nullable(); // Nuevo
            $table->enum('estado_familiar', $this->ENUN_ESTADO_FAMILIAR())->nullable(); // Nuevo
            $table->enum('nacionalidad', $this->ENUM_NACIONALIDAD())->nullable(); // Nuevo
            $table->enum('embarazada', ['Si', 'No'])->nullable(); // Nuevo
            $table->enum('propietario_residencia', $this->ENUM_PROPIETARIO_RESIDENCIA())->nullable();
            $table->enum('hijos_vivos', ['Si', 'No'])->default('No'); // Nuevo
            $table->enum('otras_personas_convivientes', ['Si', 'No'])->default('No'); // Nuevo
            
            // Llaves foraneas
            $table->bigInteger('municipio_fk')->unsigned()->nullable();
            $table->foreign('municipio_fk')->references('id')->on('municipios');

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
        Schema::dropIfExists('personas');
    }

    /**ENUM'S */
    private function ENUM_OCUPACION(){
        return [
            'Aprendiz',
            'Asalariada(o) Permanente',
            'Asalariada(o) Temporal',
            'Cooperativista',
            'Cuenta Propia con Local',
            'Cuenta Propia sin Local',
            'Desempleada/o',
            'Empleador/a o Patrona/o',
            'Estudiante',
            'Familiar no Remunerado Agrícola',
            'Familiar no Remunerado de la Casa',
            'Ocupación Militar Pública o Privada',
            'Pensionada/o',
            'Servicios Profesionales',
            'Trabajador/a Sexual',
            'Trabajador/a del Hogar Remunerada/o',
            'Otra',
        ];
    }

    private function ENUM_NACIONALIDAD(){
        return [
            'El Salvador',
            'Estados Unidos',
            'Costa Rica',
            'Guatemala',
            'Honduras',
            'Nicaragua',
            'Otra',           
        ];
    }

    private function ENUN_ESTADO_FAMILIAR(){
        return [
            'Casada/o',
			'Unión no Matrimonial',
			'Soltera/o',
			'Viuda/o',
			'Divorciada/o',
        ];
    }

    private function ENUN_NIVEL_EDUCATIVO(){
        return [
            'Primaria Incompleta',
            'Primaria Completa',
            'Tercer Ciclo Incompleto',
            'Tercer Ciclo Completo',
            'Bachillerato Incompleto',
            'Bachillerato Completo',
            'Técnico o Universitario Incompleto',
            'Técnico Completo',
            'Graduado Universitario',
        ];
    }
    
    private function ENUM_ZONA_RESIDENCIAL(){
        return [
            'Urbana',
            'Rural',
            'Desconocida',
        ];
    }

    private function ENUM_SEXO(){
        return [
            'Femenino',
            'Masculino',
            'Intersexual',
        ];
    }

    private function ENUM_GENERO(){
        return [
            'Mujer',
            'Hombre',
            'Diverso (LGBTIQ+)',
        ];
    }
    
    private function ENUM_PROPIETARIO_RESIDENCIA(){
        return [
            'Agresor',
            'Víctima',
            'Agresor y Víctima',
            'Familiar Víctima',
            'Familiar Agresor',
            'Alquilada',
            'Otro',
        ];
    }

    private function ENUM_DISCAPACIDAD(){
        return [
            'Ninguna',
            'Discapacidades Conductuales',
            'Discapacidades de la Comunicación y Comprensión del Lenguaje',
            'Discapacidades de las Extremidades Inferiores, Tronco, Cuello y Cabeza',
            'Discapacidades de las Extremidades Superiores',
            'Discapacidades Intelectuales (Retraso Mental)',
            'Discapacidades Múltiples y Otras',
            'Discapacidades para Hablar (Mudez)',
            'Discapacidades para Oír',
            'Discapacidades para Ver',
        ];
    }

    private function RELACION_VICTIMA(){
        return [
            'Abuela',
            'Hermana/o',
            'Madre Afin',
            'Padre',
            'Padre Afin',
            'Madre',
            'Tía/o',
            'Otra',
        ];
    }
};
