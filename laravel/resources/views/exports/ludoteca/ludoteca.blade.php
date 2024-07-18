

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

                REPORTE {{ $tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio }}

            </th>

        </tr>

        <tr>

            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" colspan="14" height="40">                   

                INFORMACION DE LUDOTECA                                  

            </th>

        </tr>

        <tr>

            <th style="{{ $style_celdas }}" width= "25"> CODIGO </th>
            <th style="{{ $style_celdas }}" width= "25"> PARENTESCO RESPONSABLE</th>
            <th style="{{ $style_celdas }}" width= "25"> PARENTESCO RESPONSABLE OTRO</th>
            <th style="{{ $style_celdas }}" width= "25"> TIPO DE VIOLENCIA</th>
            <th style="{{ $style_celdas }}" width= "25"> TIPO ATENCION</th>
            <th style="{{ $style_celdas }}" width= "25"> ESCOLARIDAD</th>
            <th style="{{ $style_celdas }}" width= "25"> TIPO ATENCION FECHA</th>
            <th style="{{ $style_celdas }}" width= "25"> ORIENTACION RESPONSABLES</th>
            <th style="{{ $style_celdas }}" width= "25"> ORIENTACION RESPONSABLES FECHA</th>
            <th style="{{ $style_celdas }}" width= "25"> PROXIMA CITA</th>

        </tr>

    </thead>

    <tbody>

        @foreach ($ludotecas as $item)

            @php

                $ludoteca = (object) $item;

            @endphp

            <tr>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> codigo ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> parentesco_responsable ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> parentesco_responsable_otro ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> ludoteca_tipo_violencia   }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> tipo_atencion ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> escolaridad ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> tipo_atencion_fecha_hora ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> orientacion_responsables ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> orientacion_responsables_fecha_hora ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $ludoteca -> proxima_cita ?: ' -- '  }}</td>
            </tr>

        @endforeach

    </tbody>        

</table> 