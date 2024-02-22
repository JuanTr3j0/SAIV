@php

$style_celdas = '

text-align: center;

vertical-align: middle;

border-style: solid;

border: 10px solid #000;

';

$style_font_bold = 'font-weight: bold';

@endphp

<table>

    <thead>

        <tr>

            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" height="80" rowspan="2"></th>

            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" colspan="14" height="40">

                REPORTE {{ $tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio
                }}

            </th>

        </tr>

        <tr>

            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" colspan="14" height="40">

                INFORMACION DE SEGUIMIENTO JURIDICO

            </th>

        </tr>

        <tr>

            <th style="{{ $style_celdas }}" width="25"> CODIGO </th>
            <th style="{{ $style_celdas }}" width="25"> ESTADO </th>
            <th style="{{ $style_celdas }}" width="25"> ATENCION BRINDADA OTRO </th>
            <th style="{{ $style_celdas }}" width="25"> TIPO SERVICIO FECHA HORA </th>
            <th style="{{ $style_celdas }}" width="25"> MEDIDAS PROTECCION INICIO </th>
            <th style="{{ $style_celdas }}" width="25"> MEDIDAS PROTECCION FINAL </th>
            <th style="{{ $style_celdas }}" width="25"> AUDIENCIA PRELIMINAR </th>
            <th style="{{ $style_celdas }}" width="25"> AUDIENCIA PUBLICA </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA PROCURADURIA GENERAL HORA FECHA </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA PROCURADURIA GENERAL ACUERDO </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA AUDIENCIA PRELIMINAR HORA FECHA </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA AUDIENCIA PRELIMINAR RESOLUCION </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA AUDIENCIA SENTENCIA HORA FECHA </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA AUDIENCIA SENTENCIA RESOLUCION </th>
            <th style="{{ $style_celdas }}" width="25"> VIOLENCIA MUJER SEDE MUNICIPIO FK </th>
            <th style="{{ $style_celdas }}" width="25"> DERECHO NINES ADOLECENCIA VULNERACION </th>
            <th style="{{ $style_celdas }}" width="25"> REFERENCIA SERVICIOS HORA FECHA </th>
            <th style="{{ $style_celdas }}" width="25"> CIERRE EXPEDIENTE HORA FECHA </th>
            <th style="{{ $style_celdas }}" width="25"> DERECHO NINES ADOLECENCIA OTRO </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA DEMANDA OTRO </th>
            <th style="{{ $style_celdas }}" width="25"> TIPO SERVICIO </th>
            <th style="{{ $style_celdas }}" width="25"> SERVICIO QUE REMITE </th>
            <th style="{{ $style_celdas }}" width="25"> AUDIENCIA PRELIMINAR RESOLUCION </th>
            <th style="{{ $style_celdas }}" width="25"> AUDIENCIA PUBLICA RESOLUCION </th>
            <th style="{{ $style_celdas }}" width="25"> FAMILIA DEMANDA </th>
            <th style="{{ $style_celdas }}" width="25"> VIOLENCIA MUJER DILIGENCIA </th>
            <th style="{{ $style_celdas }}" width="25"> SEDE JUDICIAL DILIGENCIA </th>
            <th style="{{ $style_celdas }}" width="25"> VIOLENCIA MUJER RESOLUCION </th>
            <th style="{{ $style_celdas }}" width="25"> DERECHO NINES ADOLECENCIA </th>
            <th style="{{ $style_celdas }}" width="25"> REFERENCIA SERVICIOS </th>
            <th style="{{ $style_celdas }}" width="25"> CIERRE EXPEDIENTE </th>
            <th style="{{ $style_celdas }}" width="25"> INSTITUCION A LA QUE SE REFIERE </th>
            <th style="{{ $style_celdas }}" width="25"> ATENCION BRINDADA FK </th>


        </tr>

    </thead>

    <tbody>

        @foreach ($juridicos as $item)

        @php

        $juridico = (object) $item;

        @endphp

        <tr>
            <td style="{{ $style_celdas }}">{{ $juridico -> codigo ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->estado ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->atencion_brindada_otro ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->tipo_servicio_fecha_hora ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->medidas_proteccion_inicio ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->medidas_proteccion_final ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->audiencia_preliminar ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->audiencia_publica ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_procuraduria_general_hora_fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_procuraduria_general_acuerdo ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_audiencia_preliminar_hora_fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_audiencia_preliminar_resolucion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_audiencia_sentencia_hora_fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_audiencia_sentencia_resolucion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->violencia_mujer_sede_municipio_fk ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->derecho_nines_adolecencia_vulneracion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->derecho_nines_adolecencia_auto_vulneración_de_derechos ?: ' --
                ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->referencia_servicios_hora_fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->cierre_expediente_hora_fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->derecho_nines_adolecencia_otro ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_demanda_otro ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->tipo_servicio ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->servicio_que_remite ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->audiencia_preliminar_resolucion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->audiencia_publica_resolucion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->familia_demanda ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->violencia_mujer_diligencia ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->sede_judicial_diligencia ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->violencia_mujer_resolucion ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->derecho_nines_adolecencia ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->referencia_servicios ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->cierre_expediente ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->institucion_a_la_que_se_refiere ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->atencion_brindada_fk ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->created_at ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $juridico->updated_at ?: ' -- ' }}</td>



        </tr>

        @endforeach

    </tbody>

</table>