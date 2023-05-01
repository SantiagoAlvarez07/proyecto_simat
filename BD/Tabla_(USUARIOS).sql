----------------- SIMAT - *MAS* --------------------
-- TABLA (USUARIOS)
CREATE TABLE SIMAT_MAS.USUARIOS
(
	id_user SERIAL,
	nombre_user VARCHAR(40),
	apellido_user VARCHAR(40),
	documento_user VARCHAR(15),
	email_user VARCHAR(20),
	
	----------------------------
	password_user VARCHAR(40),
	
	----------------------------
	id_tdoc VARCHAR(1),
	id_rol VARCHAR(1),
	id_estado VARCHAR(1),
	
	CONSTRAINT nn_nombre_user CHECK (nombre_user IS NOT NULL),
	CONSTRAINT nn_apellido_user CHECK (apellido_user IS NOT NULL),
	CONSTRAINT nn_password_user CHECK (password_user IS NOT NULL),
	
	CONSTRAINT uc_documento_user UNIQUE(documento_user),
	CONSTRAINT uc_email_user UNIQUE(email_user),
	
	CONSTRAINT fk_id_tdoc_user FOREIGN KEY(id_tdoc)
	REFERENCES SIMAT_MAS.TIPO_DOCUMENTO(id_tdoc),
	CONSTRAINT fk_id_rol_user FOREIGN KEY(id_rol)
	REFERENCES SIMAT_MAS.ROLES(id_rol),
	CONSTRAINT fk_id_estado_user FOREIGN KEY(id_estado)
	REFERENCES SIMAT_MAS.ESTADO(id_estado),
	
	CONSTRAINT pk_user PRIMARY KEY(id_user, id_rol)
);

SELECT * FROM SIMAT_MAS.USUARIOS;
-------------------------------------------------------------

-- INSERTAR USUARIOS --
INSERT INTO SIMAT_MAS.USUARIOS (id_user,nombre_user,apellido_user,id_rol,id_tdoc,documento_user,password_user,email_user,id_estado)
VALUES (DEFAULT,'Santiago','Alvarez','1','2','1004897868','santi123','calvos7@gmail.com','1');

DELETE FROM SIMAT_MAS.USUARIOS
WHERE id_user = '3';