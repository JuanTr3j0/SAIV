<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResponsablesCasos>
 */
class ResponsablesCasosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $edadDesconocida = (bool)random_int(0, 1);
        return [
            'primer_nombre'      =>  $this->faker->name,
            'segundo_nombre'     =>  $this->faker->name,
            'primer_apellido'    =>  fake()->lastName().' '.fake()->lastName(),
            'segundo_apellido'   =>  fake()->lastName().' '.fake()->lastName(),
            'empresa'           =>  $this->faker->catchPhrase(),
            'municipio_fk'      =>  \App\Models\Municipios::get()->random()->id,
            'direccion'         =>  $this->faker->address(),
            'edad_desconocida' => $edadDesconocida,
            'edad_agresor' => $edadDesconocida ? null : random_int(18, 50),
            'ocupacion_agresor' => getEnunms('agresores_casos','ocupacion_agresor')->random(),
        ];
    }
}
