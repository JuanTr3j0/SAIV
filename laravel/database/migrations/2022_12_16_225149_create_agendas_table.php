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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->enum('modulo', ['Ludoteca', 'Seguimiento Juridico', 'Camara Gessell Programacion', 'Camara Gessell Atencion de Menores'])->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('estado')->default(true);

            $table->bigInteger('oficina')->unsigned()->nullable();
            $table->foreign('oficina')->references('id')->on('oficinas');
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
        Schema::dropIfExists('agendas');
    }
};
