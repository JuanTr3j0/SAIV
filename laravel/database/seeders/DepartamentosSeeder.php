<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamentos;
class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamentos::insert([            
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>1,'departamento'=>'Ahuachapán',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>2,'departamento'=>'Cabañas',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>3,'departamento'=>'Chalatenango',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>4,'departamento'=>'Cuscatlán',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>5,'departamento'=>'La Libertad',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>6,'departamento'=>'La Paz',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>7,'departamento'=>'La Unión',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>8,'departamento'=>'Morazán',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>9,'departamento'=>'San Miguel',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>10,'departamento'=>'San Salvador',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>11,'departamento'=>'San Vicente',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>12,'departamento'=>'Santa Ana',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>13,'departamento'=>'Sonsonate',],
            ['created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'), 'id'=>14,'departamento'=>'Usulután',],
        ]);
    }
}
