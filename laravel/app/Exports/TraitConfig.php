<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

trait TraitConfig{
    public function title(): string
    {
        return $this->title;
    }  

    public function drawings(): array
    {
        try {
            $drawing = new Drawing();
            $drawing->setPath(public_path('images/logo.png'));
            $drawing->setWidth(10);
            $drawing->setHeight(100);
            $drawing->setCoordinates('A1');
            $drawing->setOffsetX(15);
            $drawing->setOffsetY(5);
            return [$drawing];
        } catch (\Exception $e) {
            bitacora_errores('TraitCasos.php', $e);
        }
    }

    public function configHead($sheet, $cellTextLargeArray = []){

        // En resumen, este código define un estilo de relleno para una celda de hoja de cálculo 
        // en Excel que incluye un relleno sólido con un color de inicio específico.        
        $fill = [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'rgb' => '696cff'
            ]
        ];

        //Color del fondo de la celda que contienen el logo
        $sheet->getStyle('A1')->applyFromArray([
            'fill' => $fill
        ]);

        //Estilos para letras de titulo en el excel para las celdas B1 Y B2
        $sheet->getStyle('B1')->applyFromArray([
            'font' => [
                'name' => 'Arial',
                'size' => 24,
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => 'left',
                'vertical' => 'center'
            ],
            'fill' => $fill,
        ]);

        $sheet->getStyle('B2')->applyFromArray([
            'font' => [
                'name' => 'Arial',
                'size' => 20,
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => 'left',
                'vertical' => 'center'
            ],
            'fill' => $fill,
        ]);

        // Ajustar automáticamente el tamaño de la celda para que el texto se ajuste al tamaño de la celda
        // y limitar el ancho de la celda a 20 caracteres      
        foreach ($cellTextLargeArray as $value) {
            $this->cellTextLarge($sheet, $value);
        }
        
        if(count($cellTextLargeArray))
            $sheet->getStyle($cellTextLargeArray[0].'3:'.$cellTextLargeArray[count($cellTextLargeArray)-1].'3')->applyFromArray(
                [
                    'font' => [
                        'bold' => true,
                        'color' => [
                            'rgb' => 'FFFFFF'
                        ]
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '696cff'
                        ],
                    ]
                ]
            );      

        // Este código en Laravel Excel establece la celda A4 como la última fila y columna visible en la pantalla,
        // manteniendo las filas y columnas anteriores fijas. Es decir, las celdas A1 hasta A3 permanecerán fijas 
        // mientras se desplaza hacia abajo o hacia la derecha en la hoja de cálculo.        
        $sheet->freezePane('A4');
    }

    public function cellTextLarge($sheet, $letter)
    {
        // En general, estos comandos se utilizan para formatear y ajustar el contenido de las celdas de 
        // una hoja de cálculo en Excel usando la biblioteca Laravel Excel.
        $sheet->getColumnDimension($letter)->setAutoSize(true);
        $sheet->getColumnDimension($letter)->setWidth(20);
        $sheet->getStyle($letter)->getAlignment()->setWrapText(true);
    }

    public function concatenarArray($array)
    {
        // En resumen, esta función toma un arreglo como entrada y devuelve una cadena de texto que enumera los 
        // valores del arreglo, separados por comas y con un punto al final, o " -- " si el arreglo está vacío.
        if (!count($array))
            return ' -- ';

        $string = null;

        foreach ($array as $key => $value) {
            count($array) > 1 && $string .= $value . ', ';
            $key === (count($array) - 1) && $string .= $value . '.';
        }
        
        return $string;
    }
}