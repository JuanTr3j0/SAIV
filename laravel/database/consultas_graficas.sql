#TIPO DE CASO, FRECUENCIA, PORCENTAJE
select
    case
       when casos.denuncia like 'DIL%' then 'Dilegencia'
       when casos.denuncia like 'SD%' then 'Sin Denuncia'
       else 'Denuncia'
    end  as denuncia,
    count(*) as cantidad
from casos
where estado = true
   when casos.denuncia like 'DILCH%' then 'Dilegencia'
   when casos.denuncia like 'SD%' then 'Sin Denuncia'
   else 'Denuncia'
end;

select
   casos.denuncia  as denuncia,
    count(*) as cantidad
    from casos
    where estado = true and (denuncia like 'DILCH'
    or denuncia like 'SDCH'
    or denuncia like 'DCH')
    group by denuncia;

# MES, DENUNCIA, SIN DENUNCIA, DILIGENCIA
select
    case
        when CAST(mes AS unsigned) = 1 then 'Enero'
        when CAST(mes AS unsigned) = 2 then 'Febrero'
        when CAST(mes AS unsigned) = 3 then 'Marzo'
        when CAST(mes AS unsigned) = 4 then 'Abril'
        when CAST(mes AS unsigned) = 5 then 'Mayo'
        when CAST(mes AS unsigned) = 6 then 'Junio'
        when CAST(mes AS unsigned) = 7 then 'Julio'
        when CAST(mes AS unsigned) = 8 then 'Agosto'
        when CAST(mes AS unsigned) = 9 then 'Septiembre'
        when CAST(mes AS unsigned) = 10 then 'Octubre'
        when CAST(mes AS unsigned) = 11 then 'Noviembre'
        when CAST(mes AS unsigned) = 12 then 'Diciembre'
    end mes,
    sum(denuncia like 'DCH') as denuncia,
    SUM(denuncia like 'SDCH') as sin_denuncia,
    SUM(denuncia like 'DILCH') as dilegencia
from casos
where estado = true and (denuncia like 'DILCH'
    or denuncia like 'SDCH'
    or denuncia like 'DCH')
group by mes
order by cast(mes as unsigned) asc;

# EDAD PROMEDIO DE LAS VICTIMAS (DENUNCIA -> NO DILIGENCIAS)
select truncate(avg(TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())),0) AS edad_promedio
from casos
inner join (select DISTINCT dui, id, fecha_nacimiento from personas) p on casos.victima_fk = p.id
where casos.estado = true and casos.denuncia not like 'DIL%';

# VICTIMAS POR SEXO, FRECUENCIA, PORCENTAJE (DENUNCIA -> NO DILIGENCIAS)
select
    p.sexo,
    count(*) frecuencia
from casos c
inner join (select DISTINCT dui, id, sexo from personas) p on c.victima_fk = p.id
where p.sexo is not null and c.estado = true and c.denuncia not like 'DIL%'
group by p.sexo;

# VICTIMAS POR GENERO, FRECUENCIA, PORCENTAJE (DENUNCIA -> NO DILIGENCIAS)
select
    p.genero,
    count(*) frecuencia
from casos c
inner join (select DISTINCT dui, id, genero from personas) p on c.victima_fk = p.id
where p.genero is not null and c.estado = true and c.denuncia not like 'DIL%'
group by p.genero;

# VICTIMAS POR SEXO FEMENINO, POR EDAD, FRECUENCIA, PORCENTAJE
select
    case
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>0 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<5 then '0_4'
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=5 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=8 then '5_8'
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=9 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=12 then'9_12'
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=13 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=18 then '13_18'
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=19 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=30 then '19_30'
        when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=61 then '61_mas'
    end label,
    count(*) frecuencia
from casos c left join (select DISTINCT dui, id, fecha_nacimiento, sexo from personas) p on c.victima_fk = p.id
where c.estado = true and c.denuncia not like 'DIL%' and p.sexo like 'Femenino'
group by case
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>0 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<5 then '0_4'
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=5 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=8 then '5_8'
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=9 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=12 then'9_12'
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=13 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=18 then '13_18'
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=19 and TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())<=30 then '19_30'
    when TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE())>=61 then '61_mas'
end
order by TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) asc;

# 7. CASOS POR MUNICIPIO DE RESIDENCIA DE LA VICTIMA, FRECUENCIA Y PORCENTAJE
select
       m.municipio as municipio,
       count(*) frecuencia
from casos c
inner join (select DISTINCT dui, id, municipio_fk from personas) p on c.victima_fk = p.id
inner join municipios m on p.municipio_fk = m.id
where estado = true and c.denuncia not like 'DIL%' and m.municipio is not  null
group by m.municipio;

# 8. CASOS POR DEPARTAMENTO DE OCURRENCIA, FRECUENCIA Y % RD
select
    dep.departamento,
    count(*) as frecuencia
from casos c
inner join municipios m on m.id = c.municipio_ocurrencia_fk
inner join departamentos dep on dep.id = m.departamento_fk
where c.estado = true and c.denuncia not like 'DIL%'
group by dep.departamento;

# 9. CASOS POR ZONA DE RESIDENCIA DE LA VICTIMA, FRECUENCIA Y PORCENTAJE  RD
select
    p.zona_residencial zona,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where  estado = true and c.denuncia not like 'DIL%' and p.zona_residencial is not null
group by p.zona_residencial;
# 10. CASOS POR TIPO DE VIOLENCIA, FRECUENCIA Y PORCENTAJE  RD
select
    c.tipos_violencia violencia,
    count(*) frecuencia
from casos c where c.estado = true and c.tipos_violencia is not null and c.denuncia not like 'DIL%'
group by c.tipos_violencia;
# 11. CASOS POR MODALIDAD DE LA VIOLENCIA, FRECUENCIA Y PORCENTAJE  RD
select
    c.modalidad_violencia modalidad,
    count(*) frecuencia
from casos c
where c.estado = true and c.denuncia not like 'DIL%' and c.modalidad_violencia is not null
group by c.modalidad_violencia;

#12. CASOS POR SABE LEER Y ESCRIBIR RD
select
    p.sabe_escribir_leer,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id and p.sabe_escribir_leer like 'Si'
where c.estado = true and c.denuncia not like 'DIL%' and p.sabe_escribir_leer is not null
group by p.sabe_escribir_leer;
# 13. CASOS POR NACIONALIDAD RD
select
    p.nacionalidad,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where c.estado = true and p.nacionalidad is not null and c.denuncia not like 'DIL%'
group by p.nacionalidad;

# 14. CASOS POR NIVEL ESCOLARIDAD VÍCTIMA, FRECUENCIA Y PORCENTAJE RD
select
    p.nivel_educacion escolaridad,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where c.estado = true and c.denuncia not like 'DIL%' and p.nivel_educacion is not null
group by p.nivel_educacion;

# 15. CASOS POR OCUPACIÓN, FRECUENCIA Y % RD
select
    p.ocupacion ocupacion,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where c.estado = true and c.denuncia not like 'DIL%' and p.ocupacion is not null
group by p.ocupacion;

# 16.	CASOS POR FUENTE DE INGRESOS, FRECUENCIA Y % RD
select
    i.fuente_ingreso fuente_ingresos,
    count(*) frecuencia
from casos c
inner join (select DISTINCT dui, id from personas) p on c.victima_fk = p.id
inner join ingresos i on p.id = i.persona_fk
where c.estado = true and c.denuncia not like 'DIL%'
group by i.fuente_ingreso;

# 17. CASOS POR DISCAPACIDAD VÍCTIMA, FRECUENCIA Y PORCETAJE RD
select
    p.discapacidad,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where c.estado = true and c.denuncia not like 'DIL%'
group by p.discapacidad;

# 18. CASOS POR SABE LEER Y ESCRIBIR, FRECUENCIA Y PORCENTAJE RD
select
    p.sabe_escribir_leer,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where p.sabe_escribir_leer and c.denuncia not like 'DIL%' and p.sabe_escribir_leer is not null
group by p.sabe_escribir_leer;

# 19. CASOS Y TIENE HIJOS VIVOS, FRECUENCIA Y PORCENTAJE RD
select
    p.hijos_vivos hijos,
    count(*) frecuencia
from casos c
inner join personas p on c.victima_fk = p.id
where c.denuncia not like 'DIL%' and c.estado = true
group by p.hijos_vivos;

#20. CASOS E INSTITUCIÓN QUE REMITE, FRECUENCIA Y % RD
select
    c.institucion_remitente,
    count(*) frecuencia
from casos c
where c.denuncia not like 'DIL%' and c.estado = true
group by c.institucion_remitente;

#21. Casos y tipo de asistencia, frecuencia y %  RD
select
    asistencia label,
    count(*) frecuencia
from casos
inner join tipo_asistencias ta on casos.id = ta.caso_fk
where casos.estado is true and asistencia is not null and denuncia not like 'DIL%'
group by asistencia;

#22. Casos y Circunstancia del hecho, frecuencia y % RD
select
    circunstancia_del_hecho label,
    count(*) frecuencia
from casos
where casos.estado is true and circunstancia_del_hecho is not null and denuncia not like 'DIL%'
group by circunstancia_del_hecho

#23. Casos y delitos del código penal, frecuencia y % RD
select
    delito_codigo_penal label,
    count(*) frecuencia
from casos
where casos.estado is true and denuncia not like 'DIL%' and delito_codigo_penal is not null
group by delito_codigo_penal;

#24. Casos y delitos LEIV, frecuencia y % RD
select
    delito label,
    count(*) frecuencia
from casos inner join delitos_leivs dl on casos.id = dl.caso_fk
where casos.estado is true and denuncia not like 'DIL%' and delito is not null
group by delito;
