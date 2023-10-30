<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoAsistencia>
 */
class TipoAsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $asistencia = $this->getEnunmsItem('tipo_asistencias','asistencia');;
        $caso = \App\Models\Casos::get()->random()->id;

        while(\App\Models\TipoAsistencia::where(['asistencia'=> $asistencia, 'caso_fk' => $caso])->exists()){
            $asistencia = $this->getEnunmsItem('tipo_asistencias','asistencia');
        }

        return [
            'caso_fk' => $caso,
            'asistencia' => $asistencia
        ];
    }

    private function getEnunmsItem($table, $column){
        $array = getEnunms($table, $column);
        $k = array_rand($array);
        return $array[$k];
    }
}
