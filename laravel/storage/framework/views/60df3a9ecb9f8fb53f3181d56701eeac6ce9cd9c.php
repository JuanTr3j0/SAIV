

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

                REPORTE <?php echo e($tipo.' SAIV'.' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio); ?>


            </th>

        </tr>

        <tr>

            <th style="<?php echo e('vertical-align: middle;'); ?>" colspan="33" height="40">

                INFORMACION DE <?php echo e(strtoupper($title)); ?>


            </th>

        </tr>

        <tr>               

            <th style="<?php echo e($style_celdas); ?>" width="25"> CODIGO </th>

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

        <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php

            $persona = (object) $item;

        ?>

        <tr>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> codigo ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> fechaRegistro ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> fechaNacimiento ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> dui ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> primerNombre ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> segundoNombre ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> primerApellido ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> segundoApellido ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> departamento ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> municipio ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> direccion ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> sexo ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> genero ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> telefonoMovil ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> empresa ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> telefonoCasa ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> discapacidad ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> lugarTrabajo ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> direccionTrabajo ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> nacionalidad ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> nacionalidadOtra ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> ocupacion ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> ocupacionOtra ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> zonaResidencial ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> sabeEscribirLeer ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> nivelEducacion ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> estadoFamiliar ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> embarazada ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> fuenteIngresos ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> fuenteIngresosOtro ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> propietarioResidencia ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> propietarioResidenciaOtro ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> relacionVictima ?: ' -- '); ?></td>

            <td style="<?php echo e($style_celdas); ?>"><?php echo e($persona -> relacionVictimaOtra ?: ' -- '); ?></td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>        

</table>    <?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views/exports/casos/persona.blade.php ENDPATH**/ ?>