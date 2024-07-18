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
        Schema::create('tipo_violencias', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_violencia', $this->ENUM_TIPOS_VIOLENCIA())->nullable();
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
        Schema::dropIfExists('tipo_violencias');
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
};
