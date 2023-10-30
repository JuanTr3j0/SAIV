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
       
        Schema::create('agresores_casos', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre')->nullable();
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('ocupacion_agresor_otro')->nullable();
            $table->bigInteger('edad_agresor')->nullable()->default(12); 
            $table->bigInteger('municipio_fk')->unsigned()->nullable();
            $table->bigInteger('caso_fk')->unsigned();
            $table->text('direccion')->nullable();
            $table->text('lugar_trabajo')->nullable();
            $table->text('direccion_trabajo')->nullable();
            $table->text('tipo_arma_otra')->nullable();
            $table->text('relacion_victima_agresor_otra')->nullable();

            // enums
            $table->enum('posee_arma', ['Si', 'No', 'No se Sabe'])->nullable()->default('No se Sabe');
            $table->enum('tipo_arma', $this->ENUM_TIPO_ARMA())->nullable()->default('No Tiene / No se Sabe');
            $table->enum('formacion_militar_policial', ['Si', 'No', 'No se Sabe'])->nullable()->default('No se Sabe');
            $table->enum('relacion_victima_agresor', $this->ENUM_RELACION_VICTIMA_AGRESOR())->nullable()->default('Ninguna, desconocido');
            $table->enum('ocupacion_agresor', $this->ENUM_OCUPACION_AGRESOR())->nullable()->default('Desconocida');   
            $table->enum('zona_residencial', $this->ENUM_ZONA_RESIDENCIAL())->nullable(); // Nuevo

            // Booleanos
            $table->boolean('edad_desconocida')->nullable()->default(false); 
            $table->boolean('nombre_desconocido')->nullable()->default(false);
            
            // Llaves Foreaneas
            $table->foreign('caso_fk')->references('id')->on('casos');
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
        Schema::dropIfExists('agresores_casos');
    }

    private function ENUM_OCUPACION_AGRESOR(){
        return[
            'Desconocida',
            'Asalariada/o Temporal Agricultura (Obtiene Ingresos por Temporadas)',
            'Asalariada/o Temporal Construcción',
            'Asalariada/o Permanente',
            'Desocupada/o o Desempleado/a (No Estudia, Ni Trabaja en Nada)',
            'Estudiante (Activo-a)',
            'Trabajador/a Agrícola no Remunerado',
            'Trabajador/a Por Cuenta Propia Agricultura',
            'Trabajador/a Por Cuenta Propia Comercio (Obtiene Ingresos)',
            'Trabajo Doméstico no Remunerado',
            'Trabajo Doméstico Remunerado (Lavar, Planchar, etc)',
            'Otro',
        ];
    }

    private function ENUM_RELACION_VICTIMA_AGRESOR(){
        return[
            'Ninguna, desconocido',
            'Abuelo',
            'Amiga/o',
            'Autoridad Religiosa',
            'Compañera/o de Estudio',
            'Compañera/o de Trabajo',
            'Esposa/o',
            'Pareja Sentimiental',
            'Compañera/o de Vida (Conviviente)',
            'Ex Esposa/o',
            'Ex Pareja',
            'Hermanos',
            'Jefe',
            'Novia/o',
            'Padre',
            'Padre Afín',
            'Prima/os',
            'Tía/o',
            'Vecina/o',
            'Otra'
        ];
    }

    private function ENUM_ZONA_RESIDENCIAL(){
        return [
            'Urbana',
            'Rural',
            'Desconocida',
        ];
    }

    private function ENUM_TIPO_ARMA(){
        return [
            'No Tiene / No se Sabe',
            'Blancas (Machetes, Cuchillos, Navajas)',
            'Arma de Fuego Corta (Pistola, Revolver)',
            'Arma de Fuego Larga',
            'Otra',
        ];
    }
};
