<div>
    <?php
      $style_celdas = 'text-align: center; vertical-align: middle; ';
      $style_font_bold = 'font-weight: bold';
    ?>
    <table border="3">
        <thead>
            <tr>
                <th style="<?php echo e('vertical-align: middle;'); ?>" colspan="27">DATOS DEL HECHO DE VIOLENCIA</th>
            </tr>
            <tr>               
                <th style="<?php echo e($style_celdas); ?>" width="25"> CODIGO </th>
                <th style="<?php echo e($style_celdas); ?>" width="24"> FECHA DEL HECHO </th>
                <th style="<?php echo e($style_celdas); ?>" width="24"> HORA DEL HECHO </th>
                <th style="<?php echo e($style_celdas); ?>" width="24"> DEPARTAMENTO </th>
                <th style="<?php echo e($style_celdas); ?>" width="24"> MUNICIPIO </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> CIRCUSTANCIA DEL HECHO </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> TIPO DE VIOLENCIA </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> MODALIDAD DE VIOLENCIA </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> DELITOS CODIGO PENAL </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> DELITOS CODIGO PENAL OTRO </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> INSTITUCION QUE REMITE </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> OTRA INSTITUCION QUE REMITE </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> JUZGADO O INSTITUCION DONDE SE REMITE </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> TIPO DE ASISTENCIA </th>
                <th style="<?php echo e($style_celdas); ?>" width="34"> DELITOS LEIV </th>
            </tr>
        </thead>
        <tbody>
            <?php if($hecho): ?>
            <tr>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($codigo); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho->fechaHecho ? date("d/m/Y", strtotime($hecho->fechaHecho)) : 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho->horaHecho ? date("H:i", strtotime($hecho->horaHecho)) : 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($departamento ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($municipio ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> circunstanciaDelHecho ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> tiposViolencia ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> modalidadViolencia ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> delitoCodigoPenal ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> delitoCodigoPenalOtro ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> institucionRemitente ?: 'N/A'); ?></td>
                <td style="<?php echo e($style_celdas); ?>"><?php echo e($hecho -> institucionRemitenteOtra ?: 'N/A'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>        
    </table>    
</div><?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views\exports\casos\hijos.otros.blade.php ENDPATH**/ ?>