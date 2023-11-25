
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
                INFORMACION DEL HECHO DE VIOLENCIA                                      
            </th>
        </tr>
        <tr>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> CODIGO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> FECHA DEL HECHO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> HORA DEL HECHO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> DEPARTAMENTO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "25"> MUNICIPIO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> CIRCUSTANCIA DEL HECHO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> TIPO DE VIOLENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> MODALIDAD DE VIOLENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> DELITOS CODIGO PENAL </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> DELITOS CODIGO PENAL OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> INSTITUCION QUE REMITE </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> OTRA INSTITUCION QUE REMITE </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> JUZGADO O INSTITUCION DONDE SE REMITE </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> TIPO DE ASISTENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width= "30"> DELITOS LEIV </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $hechos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $hecho = (object) $item;
            ?>
            <tr>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> codigo ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> fechaHecho ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> horaHecho ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> departamento ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> municipio ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> circunstanciaDelHecho ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> tiposViolencia ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> modalidadViolencia ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> delitoCodigoPenal ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> delitoCodigoPenalOtro ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> institucionRemitente ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> institucionRemitenteOtra ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> institucionSeRemite ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> tipoAsistencia ?: ' -- '); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> delitoLeivs ?: ' -- '); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>        
</table>    
<?php /**PATH F:\Github\SIAVCH\laravel\resources\views/exports/casos/hecho.blade.php ENDPATH**/ ?>