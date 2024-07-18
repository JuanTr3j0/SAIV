

<?php

    $style_celdas = '

        text-align: center; 

        vertical-align: middle;

        border-style: solid;

        border: 10px solid #000;

    ';

    $style_font_bold = 'font-weight: bold';

?>

<table>

    <thead>

        <tr>

            <th style="<?php echo e('vertical-align: middle;'); ?> margin: 15%; font: bold;" height="80" rowspan="2"></th>

            <th style="<?php echo e('vertical-align: middle;'); ?> margin: 15%; font: bold;" colspan="14" height="40">                   

                REPORTE <?php echo e($tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio); ?>


            </th>

        </tr>

        <tr>

            <th style="<?php echo e('vertical-align: middle;'); ?> margin: 15%; font: bold;" colspan="14" height="40">                   

                INFORMACION DE LUDOTECA                                  

            </th>

        </tr>

        <tr>

            <th style="<?php echo e($style_celdas); ?>" width= "25"> CODIGO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> PARENTESCO RESPONSABLE</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> PARENTESCO RESPONSABLE OTRO</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> TIPO DE VIOLENCIA</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> TIPO ATENCION</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> ESCOLARIDAD</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> TIPO ATENCION FECHA</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> ORIENTACION RESPONSABLES</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> ORIENTACION RESPONSABLES FECHA</th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> PROXIMA CITA</th>

        </tr>

    </thead>

    <tbody>

        <?php $__currentLoopData = $ludotecas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php

                $ludoteca = (object) $item;

            ?>

            <tr>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> codigo ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> parentesco_responsable ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> parentesco_responsable_otro ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> ludoteca_tipo_violencia); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> tipo_atencion ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> escolaridad ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> tipo_atencion_fecha_hora ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> orientacion_responsables ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> orientacion_responsables_fecha_hora ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($ludoteca -> proxima_cita ?: ' -- '); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>        

</table> <?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views/exports/ludoteca/ludoteca.blade.php ENDPATH**/ ?>