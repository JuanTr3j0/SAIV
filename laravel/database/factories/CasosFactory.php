<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casos>
 */
class CasosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   $edad = (bool)random_int(0, 1);
        $fecha_hecho =$this->faker-> dateTimeBetween($startDate = '-10 years', $endDate = '-5 years', $timezone = null);
        return [
            'correlativo' => random_int(1, 100),
            'denuncia' => $this->faker->randomElement(['DCH', 'SDCH', 'DSS', 'SDSS', 'DILCH', 'DILSS']),
            'mes' => intval($fecha_hecho->format('m')) ,
            'anio' => intval($fecha_hecho->format('Y')),
            'victima_fk' =>\App\Models\Persona::get()->random()->id,
            'fecha_hecho' => $fecha_hecho,
            'hora_hecho' => date('H:i:s', rand(1,54000)),
            
            'responsable_fk'=> $edad ? null :\App\Models\Persona::get()->random()->id,
            'tipos_violencia' => $this->getEnunmsItem('casos','tipos_violencia'),
            'modalidad_violencia' => $this->getEnunmsItem('casos','modalidad_violencia'),
            'delito_codigo_penal' => $this->getEnunmsItem('casos','delito_codigo_penal'),
            'municipio_ocurrencia_fk' => \App\Models\Municipios::get()->random()->id,
            'institucion_remitente' => $this->getEnunmsItem('casos','institucion_remitente'),
        ];
    }

    private function getEnunmsItem($table, $column){
        $array = getEnunms($table, $column);
        $k = array_rand($array);
        return $array[$k];
    }
}
