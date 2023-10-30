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
        Schema::create('institucion_se_remitiras', function (Blueprint $table) {
            $table->enum('institucion', $this->ENUM_INSTITUCION())->nullable();
            $table->bigInteger('caso_fk')->unsigned();
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
        Schema::dropIfExists('institucion_se_remetiras');
    }

    private function ENUM_INSTITUCION(){
        return [
            'FGR',
            'JPNNA',
            'Juzgados Especializados LEIV',
            'Juzgado de Familia',
            'Juzgado de Paz',
            'PGR',
			'PDDH',
			'ISRI',
			'ONG´s',
			'Universidades',
			'Otra',
        ];
    }
};
