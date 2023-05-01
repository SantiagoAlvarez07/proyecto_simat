----------------- SIMAT - *MAS* --------------------
-- TABLA (TIPO GRADOS)
CREATE TABLE SIMAT_MAS.GRADOS
(
	id_grado VARCHAR(2),
	nombre_grado VARCHAR(15),
	
	CONSTRAINT nn_nombre_grado CHECK (nombre_grado IS NOT NULL),
	CONSTRAINT pk_id_grado PRIMARY KEY (id_grado)
);

SELECT * FROM SIMAT_MAS.GRADOS;
----------------------------------------------------

-- INSERTAR TIPOS DE DOCUMENTOS --
INSERT INTO SIMAT_MAS.GRADOS(id_grado, nombre_grado)
VALUES
('1', 'Parvulos'),
('2', 'Transición'),
('3', 'Primero'),
('4', 'Segundo'),
('5', 'Tercero'),
('6', 'Cuarto'),
('7', 'Quinto'),
('8', 'Sexto'),
('9', 'Septimo'),
('10', 'Octavo'),
('11', 'Noveno'),
('12', 'Décimo'),
('13', 'Undécimo');



