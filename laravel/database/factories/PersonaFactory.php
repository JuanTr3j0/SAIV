<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'primer_nombre'     => $this->faker->name,
            'segundo_nombre'    => $this->faker->name,
            'sexo'              => $this->getEnunmsItem('personas','sexo'),
            'genero'            => $this->getEnunmsItem('personas','genero'),
            'ocupacion'         => $this->getEnunmsItem('personas','ocupacion'),
            'discapacidad'      => $this->getEnunmsItem('personas','discapacidad'),
            'primer_apellido'   => fake()->lastName().' '.fake()->lastName(),
            'segundo_apellido'  => fake()->lastName().' '.fake()->lastName(),
            'dui'               => fake()->numberBetween($min = 1111111, $max = 9999999).'-'.fake()->randomDigit(),
            'telefono_casa'     => fake()->numberBetween($min = 1111, $max = 9999).'-'.fake()->numberBetween($min = 1111, $max = 9999),
            'empresa'           => $this->getEnunmsItem('personas','empresa'),
            'municipio_fk'      => \App\Models\Municipios::get()->random()->id,
            'direccion'         => $this->faker->address(),
            'fecha_nacimiento'  => $this->faker -> dateTimeBetween($startDate = '-30 years', $endDate = '-10 years', $timezone = null),
        ];
    }

    private function getEnunmsItem($table, $column){
        $array = getEnunms($table, $column);
        $k = array_rand($array);
        return $array[$k];
    }
}
