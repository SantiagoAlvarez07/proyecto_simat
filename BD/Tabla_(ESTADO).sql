----------------- SIMAT - *MAS* --------------------
-- TABLA (ESTADO)
CREATE TABLE SIMAT_MAS.ESTADO
(
	id_estado VARCHAR(1),
	nombre_estado VARCHAR(10)
	
	CONSTRAINT nn_nombre_estado CHECK (nombre_estado IS NOT NULL),
	CONSTRAINT ck_estado CHECK (nombre_estado IN('Activo','Inactivo')),
	CONSTRAINT pk_id_estado PRIMARY KEY (id_estado)
);

SELECT * FROM SIMAT_MAS.ESTADO;
----------------------------------------------------

-- INSERTAR ESTADOS --
INSERT INTO SIMAT_MAS.ESTADO (id_estado,nombre_estado)
VALUES
('1', 'Activo'),
('2', 'Inactivo');