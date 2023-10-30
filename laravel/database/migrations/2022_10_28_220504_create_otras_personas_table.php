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
        Schema::create('otras_personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();// Nuevo
            $table->enum('sexo', ['F', 'M'])->nullable();// Nuevo
            $table->integer('edad')->nullable();// Nuevo
            $table->string('grado_escolar')->nullable();// Nuevo
            $table->string('relacion_victima')->nullable();// Nuevo
            $table->bigInteger('persona_fk')->unsigned(); // Nuevo
                        
            // Enums
            $table->enum('vive_con_ella', ['Si', 'No'])->nullable();// Nuevo
            $table->enum('tipo', ['hijo', 'otra'])->nullable();// Nuevo
            $table->enum('discapacidad', ['Si', 'No'])->nullable();// Nuevo

            // Llaves Foreaneas
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
        Schema::dropIfExists('otras_personas');
    }
};
