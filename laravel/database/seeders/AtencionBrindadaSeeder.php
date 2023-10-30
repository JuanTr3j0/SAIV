<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtencionBrindadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            // Opcion
            'Orientación Legal por Teléfono',
            'Orientación Legal Presencial',
            'Acompañamiento Sede Judicial ',
            'Acompañamiento Trámite Administrativo',
                // Sub Opciones                
            'Seguimiento de Caso vía Telefónica',
            'Seguimiento de Caso Presencial',
            'Revisión de Expediente',
            'Elaboración de Escritos para Juzgados',
             // Sub Opciones             
                [
                    'Juzgado de Familia',
                    'Juzgado de Paz',// (menú municipio)
                    'Juzgado 2° de Paz',// (menú Chalatenango, Dulce Nombre de María, Tejutla y Nueva Concepción)
                    'Otro'
                ],
            'Elaboración Otros Documentos',
            // Sub Opciones
                [
                    'Declaración Jurada',
                    'Declaración de Ingresos y Egresos',
                    'Certificaciones',
                    'Otro',
                ],
            'Referencia a Otras Instituciones',
            // Sub Opciones
                [
                    'PGR',
                    'PDDH',
                    'FGR',
                    'Otro',
                ]
        ];

        $atencion = new \App\Models\AtencionBrindada();
        foreach ($array as $item) {
            if(!is_array($item)){
                $atencion = new \App\Models\AtencionBrindada();
                $atencion->opcion = $item;
                $atencion->save();
            }else{
                foreach ($item as $_value) {
                    $sub_atencion = new \App\Models\AtencionBrindada();
                    $sub_atencion->opcion = $_value;
                    $sub_atencion->atencion_brindada_fk = $atencion->id;
                    $sub_atencion->save();
                }
            }
        }
    }
}
