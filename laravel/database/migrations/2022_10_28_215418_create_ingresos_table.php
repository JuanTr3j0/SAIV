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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('persona_fk')->unsigned(); // Nuevo
            $table->enum('fuente_ingreso', $this->ENUM_FUENTE_INGRESO()); // Nuevo

            $table->foreign('persona_fk')->references('id')->on('personas'); // Nuevo
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
        Schema::dropIfExists('ingresos');
    }

    private function ENUM_FUENTE_INGRESO(){
        return [
            'Aporte Económico de Pareja',
            'Ayuda Familiar',
            'Pensión',
            'Remesas',
            'Rentas',
            'Salario',
            'Ventas o Servicios',
            'Otra',            
        ];
    }
};
