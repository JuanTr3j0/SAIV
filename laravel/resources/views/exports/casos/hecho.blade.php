
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
                INFORMACION DEL HECHO DE VIOLENCIA                                      
            </th>
        </tr>
        <tr>
            <th style="{{ $style_celdas }}" width= "25"> CODIGO </th>
            <th style="{{ $style_celdas }}" width= "25"> FECHA DEL HECHO </th>
            <th style="{{ $style_celdas }}" width= "25"> HORA DEL HECHO </th>
            <th style="{{ $style_celdas }}" width= "25"> DEPARTAMENTO </th>
            <th style="{{ $style_celdas }}" width= "25"> MUNICIPIO </th>
            <th style="{{ $style_celdas }}" width= "30"> CIRCUSTANCIA DEL HECHO </th>
            <th style="{{ $style_celdas }}" width= "30"> TIPO DE VIOLENCIA </th>
            <th style="{{ $style_celdas }}" width= "30"> MODALIDAD DE VIOLENCIA </th>
            <th style="{{ $style_celdas }}" width= "30"> DELITOS CODIGO PENAL </th>
            <th style="{{ $style_celdas }}" width= "30"> DELITOS CODIGO PENAL OTRO </th>
            <th style="{{ $style_celdas }}" width= "30"> INSTITUCION QUE REMITE </th>
            <th style="{{ $style_celdas }}" width= "30"> OTRA INSTITUCION QUE REMITE </th>
            <th style="{{ $style_celdas }}" width= "30"> JUZGADO O INSTITUCION DONDE SE REMITE </th>
            <th style="{{ $style_celdas }}" width= "30"> TIPO DE ASISTENCIA </th>
            <th style="{{ $style_celdas }}" width= "30"> DELITOS LEIV </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hechos as $item)
            @php
                $hecho = (object) $item;
            @endphp
            <tr>
                <td style="{{ $style_celdas }}">{{ $hecho -> codigo ?: ' -- '  }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> fechaHecho ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> horaHecho ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> departamento ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> municipio ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> circunstanciaDelHecho ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> tiposViolencia ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> modalidadViolencia ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> delitoCodigoPenal ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> delitoCodigoPenalOtro ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> institucionRemitente ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> institucionRemitenteOtra ?: ' -- ' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> institucionSeRemite ?: ' -- '}}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> tipoAsistencia ?: ' -- '}}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> delitoLeivs ?: ' -- '}}</td>
            </tr>
        @endforeach
    </tbody>        
</table>    
