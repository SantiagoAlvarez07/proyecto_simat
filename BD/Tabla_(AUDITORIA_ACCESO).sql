CREATE TABLE SIMAT_MAS.AUDI_ACCESO
(
	id_user SERIAL,
	
	nombre_user VARCHAR(40),
	apellido_user VARCHAR(40),
	documento_user VARCHAR(15),
	fecha_acceso TIMESTAMP,
	
	id_rol VARCHAR(1),
	
	CONSTRAINT nn_nombre_user CHECK (nombre_user IS NOT NULL),
	CONSTRAINT nn_apellido_user CHECK (apellido_user IS NOT NULL),
	
	CONSTRAINT fk_id_rol_acceso FOREIGN KEY(id_rol)
	REFERENCES SIMAT_MAS.ROLES(id_rol),
	
	CONSTRAINT pk_audi_acceso PRIMARY KEY(id_user,id_rol)
);

SELECT * FROM SIMAT_MAS.AUDI_ACCESO;

-- INSERTAR USUARIOS --
INSERT INTO SIMAT_MAS.AUDI_ACCESO (id_user,nombre_user,apellido_user,documento_user,fecha_acceso,id_rol)
VALUES (DEFAULT,'Santiago','Alvarez','1004897868','24/04/2023 2:00:00','1');
