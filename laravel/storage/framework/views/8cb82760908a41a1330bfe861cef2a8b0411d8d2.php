
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
            <th style="<?php echo e('vertical-align: middle;'); ?> margin: 15%; font: bold;" colspan="33" height="40">                   
                <?php echo e('SAIV'.strtoupper($oficina)); ?>                                   
            </th>
        </tr>
        <tr>
            <th style="<?php echo e('vertical-align: middle;'); ?>" colspan="33" height="40">
                DATOS DE LA VICTIMA
            </th>
        </tr>
        <tr>               
            <th style="<?php echo e($style_celdas); ?>" width="20"> CODIGO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> FECHA REGISTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> FECHA NACIMIENTO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> DUI </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> PRIMER NOMBRE </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> SEGUNDO NOMBRE </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> PRIMER APELLIDO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> SEGUNDO APELLIDO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> DEPARTAMENTO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> MUNICIPIO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> DIRECCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> SEXO </th>
            <th style="<?php echo e($style_celdas); ?>" width="20"> GENERO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> TELF. MOVIL </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> EMPRESA DE TELF. MOVIL </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> TELF. CASA </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> DISCAPACIDAD </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> LUGAR DE TRABAJO </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> DIRECCION DEL TRABAJO </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> NACIONALIDAD </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> OTRA NACIONALIDAD </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> OCUPACION </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> OTRA OCUPACION </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> ZONA RESIDENCIAL </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> SABE LEER Y ESCRIBIR </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> NIVEL EDUCACION </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> ESTADO FAMILIAR </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> EMBARAZADA </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> FUENTE INGRESO </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> FUENTE INGRESO OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> PROPIETARIA/O RESIDENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> PROPIETARIA/O RESIDENCIA OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> RELACION CON LA VICTIMA </th>
            <th style="<?php echo e($style_celdas); ?>" width="30"> RELACION CON LA VICTIMA OTRO </th>
        </tr>
    </thead>
    <tbody>
    </tbody>        
</table>    <?php /**PATH F:\Github\SIAVCH\laravel\resources\views/exports/persona.blade.php ENDPATH**/ ?>