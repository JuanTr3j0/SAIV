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
                INFORMACION DE CÁMARA GESELL
            </th>

        </tr>

        <tr>
            <th style="<?php echo e($style_celdas); ?>" > CORRELATIVO</th>
            <th style="<?php echo e($style_celdas); ?>" > OFICINA</th>
            <th style="<?php echo e($style_celdas); ?>" > FECHA</th>
            <th style="<?php echo e($style_celdas); ?>" > HORA</th>
            <th style="<?php echo e($style_celdas); ?>" > SOLICITADO POR</th>
            <th style="<?php echo e($style_celdas); ?>" > NOMBRES</th>
            <th style="<?php echo e($style_celdas); ?>" > APELLIDOS</th>
            <th style="<?php echo e($style_celdas); ?>" > REALIZADA</th>
        </tr>

    </thead>

    <tbody>

        <?php $__currentLoopData = $gesells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php

        $gesell = (object) $item;

        ?>

        <tr>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->correlativo ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->nombreOficina ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->hora ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->solicitado_por ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->nombres ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->apellidos ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($gesell->realizada ?: ' -- '); ?></td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table><?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views\exports\gesell\gesell.blade.php ENDPATH**/ ?>