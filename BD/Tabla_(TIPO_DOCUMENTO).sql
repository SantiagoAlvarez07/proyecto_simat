----------------- SIMAT - *MAS* --------------------
-- TABLA (TIPO DOCUMENTO)
CREATE TABLE SIMAT_MAS.TIPO_DOCUMENTO
(
	id_tdoc VARCHAR(1),
	nombre_tdoc VARCHAR(40),
	
	CONSTRAINT nn_nombre_tdoc CHECK (nombre_tdoc IS NOT NULL),
	CONSTRAINT pk_id_tdoc PRIMARY KEY (id_tdoc)
);

SELECT * FROM SIMAT_MAS.TIPO_DOCUMENTO;
----------------------------------------------------

-- INSERTAR TIPOS DE DOCUMENTOS --
INSERT INTO SIMAT_MAS.TIPO_DOCUMENTO(id_tdoc, nombre_tdoc)
VALUES
('1', 'Targeta de Identidad'),
('2', 'Cédula de Ciudadanía'),
('3', 'Cédula de Extrangería');
