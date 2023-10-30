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
        Schema::create('programacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('correlativo')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->text('solicitado_por')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->boolean('caso_saiv')->nullable()->default(false);
            $table->boolean('realizada')->nullable()->default(false);

            // Llaves foreaneas
            $table->unsignedBigInteger('caso_fk')->nullable();
            $table->foreign('caso_fk')->references('id')->on('casos');
            $table->boolean('estado')->nullable()->default(true);  // Agregado Nuevo
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
        Schema::dropIfExists('programacions');
    }
};
