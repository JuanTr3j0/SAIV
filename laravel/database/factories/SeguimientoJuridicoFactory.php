<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeguimientoJuridico>
 */
class SeguimientoJuridicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $caso_id = \App\Models\Casos::get()->random()->id;
        return [
            'caso_fk'                                    =>  $caso_id,
            'tipo_servicio_fecha_hora'                   =>  $this->faker->dateTimeBetween('-3 years'),
            'medidas_proteccion_inicio'                  =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'medidas_proteccion_final'                   =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'audiencia_preliminar'                       =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'audiencia_publica'                          =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'familia_procuraduria_general_hora_fecha'    =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'familia_audiencia_preliminar_hora_fecha'    =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'familia_audiencia_sentencia_hora_fecha'     =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'referencia_servicios_hora_fecha'            =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            'cierre_expediente_hora_fecha'               =>  $this->faker-> dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
            // Enums
            'tipo_servicio'                              =>  $this->getEnunmsItem('seguimiento_juridicos', 'tipo_servicio'),
            'servicio_que_remite'                        =>  $this->getEnunmsItem('seguimiento_juridicos', 'servicio_que_remite'),
            'audiencia_preliminar_resolucion'           =>  $this->getEnunmsItem('seguimiento_juridicos', 'audiencia_preliminar_resolucion'),
            'audiencia_publica_resolucion'              =>  $this->getEnunmsItem('seguimiento_juridicos', 'audiencia_publica_resolucion'),
            'familia_demanda'                           =>  $this->getEnunmsItem('seguimiento_juridicos', 'familia_demanda'),
            'violencia_mujer_diligencia'                =>  $this->getEnunmsItem('seguimiento_juridicos', 'violencia_mujer_diligencia'),
            'violencia_mujer_sede_judicial_diligencia'  =>  $this->getEnunmsItem('seguimiento_juridicos', 'violencia_mujer_sede_judicial_diligencia'),
            'violencia_mujer_resolucion'                =>  $this->getEnunmsItem('seguimiento_juridicos', 'violencia_mujer_resolucion'),
            'derecho_nines_adolecencia'                 =>  $this->getEnunmsItem('seguimiento_juridicos', 'derecho_nines_adolecencia'),
            'referencia_servicios'                      =>  $this->getEnunmsItem('seguimiento_juridicos', 'referencia_servicios'),
            'cierre_expediente'                         =>  $this->getEnunmsItem('seguimiento_juridicos', 'cierre_expediente'),
            // TEXT
            'familia_procuraduria_general_acuerdo'      =>  $this->faker->text,
            'familia_audiencia_preliminar_resolucion'   =>  $this->faker->text,
            'familia_procuraduria_general_acuerdo'      =>  $this->faker->text,
            'derecho_nines_adolecencia_vulneracion'     =>  $this->faker->text,
        ];
    }

    private function getEnunmsItem($table, $column){
        $array = getEnunms($table, $column);
        $k = array_rand($array);
        return $array[$k];
    }
}
