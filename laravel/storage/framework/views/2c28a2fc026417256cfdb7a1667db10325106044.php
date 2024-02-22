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

                INFORMACION DE SEGUIMIENTO JURIDICO

            </th>

        </tr>

        <tr>

            <th style="<?php echo e($style_celdas); ?>" width="25"> CODIGO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> ESTADO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> ATENCION BRINDADA OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> TIPO SERVICIO FECHA HORA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> MEDIDAS PROTECCION INICIO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> MEDIDAS PROTECCION FINAL </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> AUDIENCIA PRELIMINAR </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> AUDIENCIA PUBLICA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA PROCURADURIA GENERAL HORA FECHA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA PROCURADURIA GENERAL ACUERDO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA AUDIENCIA PRELIMINAR HORA FECHA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA AUDIENCIA PRELIMINAR RESOLUCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA AUDIENCIA SENTENCIA HORA FECHA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA AUDIENCIA SENTENCIA RESOLUCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> VIOLENCIA MUJER SEDE MUNICIPIO FK </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> DERECHO NINES ADOLECENCIA VULNERACION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> REFERENCIA SERVICIOS HORA FECHA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> CIERRE EXPEDIENTE HORA FECHA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> DERECHO NINES ADOLECENCIA OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA DEMANDA OTRO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> TIPO SERVICIO </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> SERVICIO QUE REMITE </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> AUDIENCIA PRELIMINAR RESOLUCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> AUDIENCIA PUBLICA RESOLUCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> FAMILIA DEMANDA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> VIOLENCIA MUJER DILIGENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> SEDE JUDICIAL DILIGENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> VIOLENCIA MUJER RESOLUCION </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> DERECHO NINES ADOLECENCIA </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> REFERENCIA SERVICIOS </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> CIERRE EXPEDIENTE </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> INSTITUCION A LA QUE SE REFIERE </th>
            <th style="<?php echo e($style_celdas); ?>" width="25"> ATENCION BRINDADA FK </th>


        </tr>

    </thead>

    <tbody>

        <?php $__currentLoopData = $juridicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php

        $juridico = (object) $item;

        ?>

        <tr>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico -> codigo ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->estado ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->atencion_brindada_otro ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->tipo_servicio_fecha_hora ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->medidas_proteccion_inicio ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->medidas_proteccion_final ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->audiencia_preliminar ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->audiencia_publica ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_procuraduria_general_hora_fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_procuraduria_general_acuerdo ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_audiencia_preliminar_hora_fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_audiencia_preliminar_resolucion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_audiencia_sentencia_hora_fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_audiencia_sentencia_resolucion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->violencia_mujer_sede_municipio_fk ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->derecho_nines_adolecencia_vulneracion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->derecho_nines_adolecencia_auto_vulneración_de_derechos ?: ' --
                '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->referencia_servicios_hora_fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->cierre_expediente_hora_fecha ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->derecho_nines_adolecencia_otro ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_demanda_otro ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->tipo_servicio ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->servicio_que_remite ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->audiencia_preliminar_resolucion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->audiencia_publica_resolucion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->familia_demanda ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->violencia_mujer_diligencia ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->sede_judicial_diligencia ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->violencia_mujer_resolucion ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->derecho_nines_adolecencia ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->referencia_servicios ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->cierre_expediente ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->institucion_a_la_que_se_refiere ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->atencion_brindada_fk ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->created_at ?: ' -- '); ?></td>
            <td style="<?php echo e($style_celdas); ?>"><?php echo e($juridico->updated_at ?: ' -- '); ?></td>



        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table><?php /**PATH C:\Users\Pc\Desktop\SAIV\laravel\resources\views/exports/juridico/juridico.blade.php ENDPATH**/ ?>