

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

            <th style="{{ 'vertical-align: middle;' }} margin: 15%; font: bold;" colspan="33" height="40">                   

                REPORTE {{ $tipo.' SAIV'.strtoupper($oficina).' '.($tipo==='MENSUAL' ? obtener_mes($mes):'').' '.$anio }}

            </th>

        </tr>

        <tr>

            <th style="{{ 'vertical-align: middle;' }}" colspan="33" height="40">

                INFORMACION DE {{strtoupper($title)}}

            </th>

        </tr>

        <tr>               

            <th style="{{ $style_celdas }}" width="25"> CODIGO </th>

            <th style="{{ $style_celdas }}" width="20"> FECHA REGISTRO </th>

            <th style="{{ $style_celdas }}" width="20"> FECHA NACIMIENTO </th>

            <th style="{{ $style_celdas }}" width="20"> DUI </th>

            <th style="{{ $style_celdas }}" width="20"> PRIMER NOMBRE </th>

            <th style="{{ $style_celdas }}" width="20"> SEGUNDO NOMBRE </th>

            <th style="{{ $style_celdas }}" width="20"> PRIMER APELLIDO </th>

            <th style="{{ $style_celdas }}" width="20"> SEGUNDO APELLIDO </th>

            <th style="{{ $style_celdas }}" width="20"> DEPARTAMENTO </th>

            <th style="{{ $style_celdas }}" width="20"> MUNICIPIO </th>

            <th style="{{ $style_celdas }}" width="20"> DIRECCION </th>

            <th style="{{ $style_celdas }}" width="20"> SEXO </th>

            <th style="{{ $style_celdas }}" width="20"> GENERO </th>

            <th style="{{ $style_celdas }}" width="25"> TELF. MOVIL </th>

            <th style="{{ $style_celdas }}" width="25"> EMPRESA DE TELF. MOVIL </th>

            <th style="{{ $style_celdas }}" width="25"> TELF. CASA </th>

            <th style="{{ $style_celdas }}" width="30"> DISCAPACIDAD </th>

            <th style="{{ $style_celdas }}" width="30"> LUGAR DE TRABAJO </th>

            <th style="{{ $style_celdas }}" width="30"> DIRECCION DEL TRABAJO </th>

            <th style="{{ $style_celdas }}" width="30"> NACIONALIDAD </th>

            <th style="{{ $style_celdas }}" width="30"> OTRA NACIONALIDAD </th>

            <th style="{{ $style_celdas }}" width="30"> OCUPACION </th>

            <th style="{{ $style_celdas }}" width="30"> OTRA OCUPACION </th>

            <th style="{{ $style_celdas }}" width="30"> ZONA RESIDENCIAL </th>

            <th style="{{ $style_celdas }}" width="30"> SABE LEER Y ESCRIBIR </th>

            <th style="{{ $style_celdas }}" width="30"> NIVEL EDUCACION </th>

            <th style="{{ $style_celdas }}" width="30"> ESTADO FAMILIAR </th>

            <th style="{{ $style_celdas }}" width="30"> EMBARAZADA </th>

            <th style="{{ $style_celdas }}" width="30"> FUENTE INGRESO </th>

            <th style="{{ $style_celdas }}" width="30"> FUENTE INGRESO OTRO </th>

            <th style="{{ $style_celdas }}" width="30"> PROPIETARIA/O RESIDENCIA </th>

            <th style="{{ $style_celdas }}" width="30"> PROPIETARIA/O RESIDENCIA OTRO </th>

            <th style="{{ $style_celdas }}" width="30"> RELACION CON LA VICTIMA </th>

            <th style="{{ $style_celdas }}" width="30"> RELACION CON LA VICTIMA OTRO </th>

        </tr>

    </thead>

    <tbody>

        @foreach ($personas as $item)

        @php

            $persona = (object) $item;

        @endphp

        <tr>

            <td style="{{ $style_celdas }}">{{ $persona -> codigo ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> fechaRegistro ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> fechaNacimiento ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> dui ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> primerNombre ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> segundoNombre ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> primerApellido ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> segundoApellido ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> departamento ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> municipio ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> direccion ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> sexo ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> genero ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> telefonoMovil ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> empresa ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> telefonoCasa ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> discapacidad ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> lugarTrabajo ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> direccionTrabajo ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> nacionalidad ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> nacionalidadOtra ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> ocupacion ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> ocupacionOtra ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> zonaResidencial ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> sabeEscribirLeer ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> nivelEducacion ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> estadoFamiliar ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> embarazada ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> fuenteIngresos ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> fuenteIngresosOtro ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> propietarioResidencia ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> propietarioResidenciaOtro ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> relacionVictima ?: ' -- ' }}</td>

            <td style="{{ $style_celdas }}">{{ $persona -> relacionVictimaOtra ?: ' -- ' }}</td>

        </tr>

        @endforeach

    </tbody>        

</table>    