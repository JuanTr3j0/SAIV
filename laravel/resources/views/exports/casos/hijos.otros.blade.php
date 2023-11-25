<div>
    @php
      $style_celdas = 'text-align: center; vertical-align: middle; ';
      $style_font_bold = 'font-weight: bold';
    @endphp
    <table border="3">
        <thead>
            <tr>
                <th style="{{ 'vertical-align: middle;' }}" colspan="27">DATOS DEL HECHO DE VIOLENCIA</th>
            </tr>
            <tr>               
                <th style="{{ $style_celdas }}" width="25"> CODIGO </th>
                <th style="{{ $style_celdas }}" width="24"> FECHA DEL HECHO </th>
                <th style="{{ $style_celdas }}" width="24"> HORA DEL HECHO </th>
                <th style="{{ $style_celdas }}" width="24"> DEPARTAMENTO </th>
                <th style="{{ $style_celdas }}" width="24"> MUNICIPIO </th>
                <th style="{{ $style_celdas }}" width="34"> CIRCUSTANCIA DEL HECHO </th>
                <th style="{{ $style_celdas }}" width="34"> TIPO DE VIOLENCIA </th>
                <th style="{{ $style_celdas }}" width="34"> MODALIDAD DE VIOLENCIA </th>
                <th style="{{ $style_celdas }}" width="34"> DELITOS CODIGO PENAL </th>
                <th style="{{ $style_celdas }}" width="34"> DELITOS CODIGO PENAL OTRO </th>
                <th style="{{ $style_celdas }}" width="34"> INSTITUCION QUE REMITE </th>
                <th style="{{ $style_celdas }}" width="34"> OTRA INSTITUCION QUE REMITE </th>
                <th style="{{ $style_celdas }}" width="34"> JUZGADO O INSTITUCION DONDE SE REMITE </th>
                <th style="{{ $style_celdas }}" width="34"> TIPO DE ASISTENCIA </th>
                <th style="{{ $style_celdas }}" width="34"> DELITOS LEIV </th>
            </tr>
        </thead>
        <tbody>
            @if ($hecho)
            <tr>
                <td style="{{ $style_celdas }}">{{ $codigo }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho->fechaHecho ? date("d/m/Y", strtotime($hecho->fechaHecho)) : 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho->horaHecho ? date("H:i", strtotime($hecho->horaHecho)) : 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $departamento ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $municipio ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> circunstanciaDelHecho ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> tiposViolencia ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> modalidadViolencia ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> delitoCodigoPenal ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> delitoCodigoPenalOtro ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> institucionRemitente ?: 'N/A' }}</td>
                <td style="{{ $style_celdas }}">{{ $hecho -> institucionRemitenteOtra ?: 'N/A' }}</td>
            </tr>
            @endif
        </tbody>        
    </table>    
</div>