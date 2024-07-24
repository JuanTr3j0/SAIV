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
            <th style="<?php echo e('vertical-align: middle;'); ?> margin: 15%; font: bold;" colspan="21" height="40">
                REPORTE <?php echo e($tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio); ?>
            </th>
        </tr>
        <tr>
            <th style="<?php echo e('vertical-align: middle;'); ?>" colspan="21" height="40">
                INFORMACION DE AGRESORES DEL CASO
            </th>
        </tr>
        <tr>  
            <th style="<?php echo e($style_celdas); ?>" width="25"> CODIGO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25">PRIMER NOMBRE</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">SEGUNDO NOMBRE</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">PRIMER APELLIDO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">SEGUNDO APELLIDO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">DIRECCION</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">EDAD</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">EDAD DESCONOCIDA</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">OCUPACION</th>
            <th style="<?php echo e($style_celdas); ?>" width="35">RELACION VICTIMA</th>
            <th style="<?php echo e($style_celdas); ?>" width="35">OTRA RELACION VICTIMA</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">OCUPACION OTRO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">MUNICIPIO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">DEPARTAMENTO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">NOMBRE DESCONOCIDO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">LUGAR TRABAJO</th>
            <th style="<?php echo e($style_celdas); ?>" width="35">DIRECCION TRABAJO</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">POSEE ARMA</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">TIPO DE ARMA</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">FORMACION MILITAR/POLICIAL</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">ZONA RESIDENCIAL</th>
            <th style="<?php echo e($style_celdas); ?>" width="25">TIPO ARMA OTRO</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $agresores?:[]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $agresor = ((object) $item);
        ?>
        <tr>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> codigo ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> primerNombre?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> segundoNombre?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> primerApellido?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> segundoApellido?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> direccion?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> edad?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e(($agresor -> edadDesconocida ? 'Si':'No')); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> ocupacion?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> relacionVictimaAgresor?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> otraRelacionVictima?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> ocupacionOtro?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> municipio?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> departamento?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e(($agresor -> nombreDesconocido ? 'Si':'No')); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> lugarTrabajo?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> direccionTrabajo?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> poseeArma?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> tipoArma?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> formacionMilitarPolicial?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> zonaResidencial?:' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($agresor -> tipoArmaOtro?:' -- '); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views/exports/casos/agresores.blade.php ENDPATH**/ ?>