----------------- SIMAT - *MAS* --------------------
-- TABLA (ROLES)
CREATE TABLE SIMAT_MAS.ROLES
(
	id_rol VARCHAR(1),
	nombre_rol VARCHAR(40),
	
	CONSTRAINT nn_nombre_rol CHECK (nombre_rol IS NOT NULL),
	CONSTRAINT pk_id_rol PRIMARY KEY (id_rol)
);

SELECT * FROM SIMAT_MAS.ROLES;
----------------------------------------------------
-- INSERTAR ROLES --
INSERT INTO SIMAT_MAS.ROLES(id_rol, nombre_rol)
VALUES
('1', 'Administrador'),
('2', 'Secretaria'),
('3', 'Acudiente'),
('4', 'Estudiante');