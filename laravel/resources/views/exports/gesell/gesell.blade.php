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
                INFORMACION DE CÁMARA GESELL
            </th>

        </tr>

        <tr>
            <th style="{{ $style_celdas }}" > CORRELATIVO</th>
            <th style="{{ $style_celdas }}" > OFICINA</th>
            <th style="{{ $style_celdas }}" > FECHA</th>
            <th style="{{ $style_celdas }}" > HORA</th>
            <th style="{{ $style_celdas }}" > SOLICITADO POR</th>
            <th style="{{ $style_celdas }}" > NOMBRES</th>
            <th style="{{ $style_celdas }}" > APELLIDOS</th>
            <th style="{{ $style_celdas }}" > REALIZADA</th>
        </tr>

    </thead>

    <tbody>

        @foreach ($gesells as $item)

        @php

        $gesell = (object) $item;

        @endphp

        <tr>
            <td style="{{ $style_celdas }}">{{ $gesell->correlativo ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->nombreOficina ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->fecha ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->hora ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->solicitado_por ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->nombres ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->apellidos ?: ' -- ' }}</td>
            <td style="{{ $style_celdas }}">{{ $gesell->realizada ?: ' -- ' }}</td>
        </tr>

        @endforeach

    </tbody>

</table>