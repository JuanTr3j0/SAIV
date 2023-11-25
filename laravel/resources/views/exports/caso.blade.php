<div>
    @php
      $style_celdas = 'text-align: center; vertical-align: middle; ';
      $style_font_bold = 'font-weight: bold';
    @endphp
    <table border="3">
        <thead>
            <tr>
                <th style="{{ 'vertical-align: middle;' }}" colspan="27">DATOS DE LA VICTIMA</th>
            </tr>
            <tr>               
                <th style="{{ $style_celdas }}" width="20">CODIGO</th>
                <th style="{{ $style_celdas }}" width="20">FECHA REGISTRO</th>
                <th style="{{ $style_celdas }}" width="20">FECHA NACIMIENTO</th>
                <th style="{{ $style_celdas }}" width="20">DUI</th>
                <th style="{{ $style_celdas }}" width="20">NOMBRES</th>
                <th style="{{ $style_celdas }}" width="20">APELLIDOS</th>
                <th style="{{ $style_celdas }}" width="20">DEPARTAMENTO</th>
                <th style="{{ $style_celdas }}" width="20">SEXO</th>
                <th style="{{ $style_celdas }}" width="20">GENERO</th>
                <th style="{{ $style_celdas }}" width="20">MUNICIPIO</th>
                <th style="{{ $style_celdas }}" width="20">DIRECCION</th>
                <th style="{{ $style_celdas }}" width="25">TELF. MOVIL</th>
                <th style="{{ $style_celdas }}" width="25">TELF. MOVIL EMPRESA</th>
                <th style="{{ $style_celdas }}" width="25">TELF. CASA</th>
                <th style="{{ $style_celdas }}" width="25">DISCAPACIDAD</th>
                <th style="{{ $style_celdas }}" width="25">LUGAR DE TRABAJO</th>
                <th style="{{ $style_celdas }}" width="25">DIRECCION DEL TRABAJO</th>
                <th style="{{ $style_celdas }}" width="25">NACIONALIDAD</th>
                <th style="{{ $style_celdas }}" width="25">OTRA NACIONALIDAD</th>
                <th style="{{ $style_celdas }}" width="25">OCUPACION</th>
                <th style="{{ $style_celdas }}" width="25">OTRA OCUPACION</th>
                <th style="{{ $style_celdas }}" width="25">ZONA RESIDENCIAL</th>
                <th style="{{ $style_celdas }}" width="25">SABE LEER Y ESCRIBIR</th>
                <th style="{{ $style_celdas }}" width="25">NIVEL EDUCACION</th>
                <th style="{{ $style_celdas }}" width="25">ESTADO FAMILIAR</th>
                <th style="{{ $style_celdas }}" width="25">EMBARAZADA</th>
                <th style="{{ $style_celdas }}" width="25">FUENTE INGRESO</th>
                <th style="{{ $style_celdas }}" width="25">FUENTE INGRESO OTRO</th>
                <th style="{{ $style_celdas }}" width="25">PROPIETARIA/O RESIDENCIA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="{{ $style_celdas }}">
                    {{ 
                        $caso->denuncia .' '. str_pad("".$caso->correlativo, 3,"0", STR_PAD_LEFT) .'-'.
                        str_pad("".$caso->mes, 2,"0", STR_PAD_LEFT) .'-'. $caso->anio 
                    }}
                </td>
                <td style="{{ $style_celdas }}">{{ date("d/m/Y H:i", strtotime($caso->fechaRegistro)) }}</td>
                <td style="{{ $style_celdas }}">{{ date("d/m/Y H:i", strtotime($caso->victima->fechaNacimiento)) }}</td>
                
            </tr>
        </tbody>        
    </table>    
</div>