<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstitucionSeRemetira>
 */
class InstitucionSeRemitiraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {          
        $institucion = $this->getEnunmsItem('institucion_se_remitiras','institucion');
        $caso = \App\Models\Casos::get()->random()->id;

        while(\App\Models\InstitucionSeRemitira::where(['institucion'=> $institucion, 'caso_fk' => $caso])->exists()){
            $institucion = $this->getEnunmsItem('institucion_se_remitiras','institucion');
        }

        return [
            'caso_fk' => $caso,
            'institucion' => $institucion
        ];
    }

    private function getEnunmsItem($table, $column){
        $array = getEnunms($table, $column);
        $k = array_rand($array);
        return $array[$k];
    }
}
