
#Funcion de aaignacion automatica para los casos
DELIMITER $$
    DROP FUNCTION IF EXISTS casos$$
    CREATE FUNCTION asignar_correlativo_casos(
        _idCaso INT UNSIGNED,
        _anio INT,
        _denuncia VARCHAR(191)
        )
        RETURNS INT UNSIGNED
        BEGIN
        DECLARE _correlativo INT UNSIGNED;
        
        SET _correlativo = (
            select IFNULL(max(correlativo)+1, 1)  from casos where  anio = _anio and denuncia like _denuncia
        );
        
        update casos set casos.correlativo = _correlativo where casos.id = _idCaso;
        
        RETURN _correlativo;
    END
$$;

DELIMITER $$
    CREATE FUNCTION asignar_correlativo_programacion(_id INT UNSIGNED, _oficina INT)
        RETURNS INT UNSIGNED
        BEGIN
        DECLARE _correlativo INT UNSIGNED;
        
        SET _correlativo = (
            select IFNULL(max(correlativo)+1, 1)  from programacions where  oficina = _oficina
        );
        
        UPDATE programacions set programacions.correlativo = _correlativo where programacions.id = _id;
        
        RETURN _correlativo;
    END
$$;

DELIMITER $$
    CREATE FUNCTION asignar_correlativo_atencion_menores_edad(_id INT UNSIGNED, _oficina INT)
        RETURNS INT UNSIGNED
        BEGIN
        DECLARE _correlativo INT UNSIGNED;
        
        SET _correlativo = (
            select IFNULL(max(correlativo)+1, 1)  from atencion_menores_edads where  oficina = _oficina
        );
        
        UPDATE atencion_menores_edads set atencion_menores_edads.correlativo = _correlativo where atencion_menores_edads.id = _id;
        
        RETURN _correlativo;
    END
$$;