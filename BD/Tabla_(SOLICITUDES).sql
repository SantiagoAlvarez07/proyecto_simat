----------------- SIMAT - *MAS* --------------------
-- TABLA (SOLICITUES)
CREATE TABLE SIMAT_MAS.SOLICITUDES
(
	id_sol SERIAL,	
	-------------------------------------------------
	id_acu SERIAL,
	nombre_acu VARCHAR(40),
	apellido_acu VARCHAR(40),
	documento_acu VARCHAR(15),
	email_acu VARCHAR(20),
	telefono_acu VARCHAR(20),
	
	id_tdoc_acu VARCHAR(1),
	id_rol_acu VARCHAR(1) DEFAULT '3',
	---------------------------------------------------
	id_aspi SERIAL,
	nombre_aspi VARCHAR(40),
	apellido_aspi VARCHAR(40),
	documento_aspi VARCHAR(15),
	
	id_grado VARCHAR(2),
	id_disc VARCHAR(1),
	id_tdoc_aspi VARCHAR(1),
	id_rol_aspi VARCHAR(1) DEFAULT '4',
	---------------------------------------------------
	CONSTRAINT nn_nombre_acu CHECK (nombre_acu IS NOT NULL),
	CONSTRAINT nn_apellido_acu CHECK (apellido_acu IS NOT NULL),
	CONSTRAINT nn_telefono_acu CHECK (telefono_acu IS NOT NULL),
	
	CONSTRAINT uc_documento_acu UNIQUE(documento_acu),
	CONSTRAINT uc_email_acu UNIQUE(email_acu),
	
	CONSTRAINT fk_id_tdoc_acu FOREIGN KEY(id_tdoc_acu)
	REFERENCES SIMAT_MAS.TIPO_DOCUMENTO(id_tdoc),
	CONSTRAINT fk_id_rol_acu FOREIGN KEY(id_rol_acu)
	REFERENCES SIMAT_MAS.ROLES(id_rol),
	---------------------------------------------------------------
	CONSTRAINT nn_nombre_aspi CHECK (nombre_aspi IS NOT NULL),
	CONSTRAINT nn_apellido_aspi CHECK (apellido_aspi IS NOT NULL),
	
	CONSTRAINT uc_documento_aspi UNIQUE(documento_aspi),
	
	CONSTRAINT fk_id_grado_aspi FOREIGN KEY(id_grado)
	REFERENCES SIMAT_MAS.GRADOS(id_grado),
	CONSTRAINT fk_id_disc_aspi FOREIGN KEY(id_disc)
	REFERENCES SIMAT_MAS.DISCAPACIDAD(id_disc),
	CONSTRAINT fk_id_tdoc_aspi FOREIGN KEY(id_tdoc_aspi)
	REFERENCES SIMAT_MAS.TIPO_DOCUMENTO(id_tdoc),
	CONSTRAINT fk_id_rol_aspi FOREIGN KEY(id_rol_aspi)
	REFERENCES SIMAT_MAS.ROLES(id_rol),
	--------------------------
	CONSTRAINT pk_sol PRIMARY KEY(id_sol, id_acu, id_aspi)
);

SELECT * FROM SIMAT_MAS.SOLICITUDES;
-------------------------------------------
-- INSERTAR SOLICITUDES --
INSERT INTO SIMAT_MAS.SOLICITUDES(id_sol,id_acu,nombre_acu,apellido_acu,documento_acu,email_acu,telefono_acu,id_tdoc_acu,id_rol_acu,id_aspi,nombre_aspi,apellido_aspi,documento_aspi,id_grado,id_disc,id_tdoc_aspi,id_rol_aspi)
VALUES (DEFAULT,DEFAULT,'Cristiano','Ronaldo','12345678','cr@gmail.com','3126901519','2','3',DEFAULT,'Cristiano','Jr','87654321','7','2','1','4');

DELETE FROM SIMAT_MAS.SOLICITUDES
WHERE id_sol = '9';