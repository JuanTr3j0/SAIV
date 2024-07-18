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
            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" colspan="21" height="40">
                REPORTE {{ $tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio }}
            </th>
        </tr>
        <tr>
            <th style="{{ 'vertical-align: middle;' }}" colspan="21" height="40">
                INFORMACION DE AGRESORES DEL CASO
            </th>
        </tr>
        <tr>  
            <th style="{{ $style_celdas }}" width="25"> CODIGO </th>
            <th style="{{ $style_celdas }}" width="25">PRIMER NOMBRE</th>
            <th style="{{ $style_celdas }}" width="25">SEGUNDO NOMBRE</th>
            <th style="{{ $style_celdas }}" width="25">PRIMER APELLIDO</th>
            <th style="{{ $style_celdas }}" width="25">SEGUNDO APELLIDO</th>
            <th style="{{ $style_celdas }}" width="25">DIRECCION</th>
            <th style="{{ $style_celdas }}" width="25">EDAD</th>
            <th style="{{ $style_celdas }}" width="25">EDAD DESCONOCIDA</th>
            <th style="{{ $style_celdas }}" width="25">OCUPACION</th>
            <th style="{{ $style_celdas }}" width="35">RELACION VICTIMA</th>
            <th style="{{ $style_celdas }}" width="35">OTRA RELACION VICTIMA</th>
            <th style="{{ $style_celdas }}" width="25">OCUPACION OTRO</th>
            <th style="{{ $style_celdas }}" width="25">MUNICIPIO</th>
            <th style="{{ $style_celdas }}" width="25">DEPARTAMENTO</th>
            <th style="{{ $style_celdas }}" width="25">NOMBRE DESCONOCIDO</th>
            <th style="{{ $style_celdas }}" width="25">LUGAR TRABAJO</th>
            <th style="{{ $style_celdas }}" width="35">DIRECCION TRABAJO</th>
            <th style="{{ $style_celdas }}" width="25">POSEE ARMA</th>
            <th style="{{ $style_celdas }}" width="25">TIPO DE ARMA</th>
            <th style="{{ $style_celdas }}" width="25">FORMACION MILITAR/POLICIAL</th>
            <th style="{{ $style_celdas }}" width="25">ZONA RESIDENCIAL</th>
            <th style="{{ $style_celdas }}" width="25">TIPO ARMA OTRO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($agresores?:[] as $item)
        @php
            $agresor = ((object) $item);
        @endphp
        <tr>
            <td style="{{ $style_celdas }}">{{ $agresor -> codigo ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> primerNombre?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> segundoNombre?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> primerApellido?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> segundoApellido?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> direccion?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> edad?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ ($agresor -> edadDesconocida ? 'Si':'No')}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> ocupacion?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> relacionVictimaAgresor?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> otraRelacionVictima?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> ocupacionOtro?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> municipio?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> departamento?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ ($agresor -> nombreDesconocido ? 'Si':'No')}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> lugarTrabajo?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> direccionTrabajo?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> poseeArma?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> tipoArma?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> formacionMilitarPolicial?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> zonaResidencial?:' -- '}}</td>
            <td style="{{ $style_celdas }}">{{ $agresor -> tipoArmaOtro?:' -- '}}</td>
        </tr>
        @endforeach
    </tbody>
</table>