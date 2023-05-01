----------------- SIMAT - *MAS* --------------------
-- TABLA (TIPO DISCAPACIDAD)
CREATE TABLE SIMAT_MAS.DISCAPACIDAD
(
	id_disc VARCHAR(1),
	nombre_disc VARCHAR(40),
	
	CONSTRAINT nn_nombre_tdoc CHECK (nombre_disc IS NOT NULL),
	CONSTRAINT pk_id_disc PRIMARY KEY (id_disc)
);

SELECT * FROM SIMAT_MAS.DISCAPACIDAD;
----------------------------------------------------

-- INSERTAR TIPOS DE DOCUMENTOS --
INSERT INTO SIMAT_MAS.DISCAPACIDAD(id_disc, nombre_disc)
VALUES
('1', 'si'),
('2', 'no');
