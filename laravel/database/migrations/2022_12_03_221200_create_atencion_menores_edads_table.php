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
        Schema::create('atencion_menores_edads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('correlativo')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_ingreso')->nullable();
            $table->enum('ubicacion_adulto_responsable', $this->ENUN_UBICACION_ADULTO_RESPONSABLE())->nullable();
            $table->string('ubicacion_adulto_responsable_otro')->nullable();
            $table->string('nombres_menor')->nullable();
            $table->string('apellidos_menor')->nullable();
            $table->integer('edad')->nullable();
            $table->boolean('enfermo')->nullable();
            $table->string('nombres_responsable')->nullable();
            $table->string('apellidos_responsable')->nullable();
            $table->string('dui_responsable')->nullable();
            $table->time('hora_salida')->nullable();
            $table->boolean('caso_saiv')->nullable();

            // Llaves foreaneas
            $table->unsignedBigInteger('caso_fk')->nullable();
            $table->foreign('caso_fk')->references('id')->on('casos');
            $table->boolean('estado')->nullable()->default(true);
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
        Schema::dropIfExists('atencion_menores_edads');
    }

    private function ENUN_UBICACION_ADULTO_RESPONSABLE(){
        return [
            'Asesaría Legal',
            'Coordinación',
            'Denuncia',
            'Otro'
        ];
    }
};
