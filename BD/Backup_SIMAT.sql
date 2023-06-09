toc.dat                                                                                             0000600 0004000 0002000 00000052654 14421452321 0014451 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP                           {            postgres    15.2    15.2 B    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false         �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false         �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false         �           1262    5    postgres    DATABASE     ~   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Colombia.1252';
    DROP DATABASE postgres;
                postgres    false         �           0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   postgres    false    3514                     2615    122907 	   simat_mas    SCHEMA        CREATE SCHEMA simat_mas;
    DROP SCHEMA simat_mas;
                postgres    false         �           0    0    SCHEMA simat_mas    COMMENT     r   COMMENT ON SCHEMA simat_mas IS 'Gestión de matrículas para aspirantes a la institución Manos Amor y Semilla,';
                   postgres    false    12         
           1259    246679    audi_acceso    TABLE     �  CREATE TABLE simat_mas.audi_acceso (
    id_user integer NOT NULL,
    nombre_user character varying(40),
    apellido_user character varying(40),
    documento_user character varying(15),
    fecha_acceso timestamp without time zone,
    id_rol character varying(1) NOT NULL,
    CONSTRAINT nn_apellido_user CHECK ((apellido_user IS NOT NULL)),
    CONSTRAINT nn_nombre_user CHECK ((nombre_user IS NOT NULL))
);
 "   DROP TABLE simat_mas.audi_acceso;
    	   simat_mas         heap    postgres    false    12         	           1259    246678    audi_acceso_id_user_seq    SEQUENCE     �   CREATE SEQUENCE simat_mas.audi_acceso_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE simat_mas.audi_acceso_id_user_seq;
    	   simat_mas          postgres    false    12    266         �           0    0    audi_acceso_id_user_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE simat_mas.audi_acceso_id_user_seq OWNED BY simat_mas.audi_acceso.id_user;
       	   simat_mas          postgres    false    265                    1259    229882    discapacidad    TABLE     �   CREATE TABLE simat_mas.discapacidad (
    id_disc character varying(1) NOT NULL,
    nombre_disc character varying(40),
    CONSTRAINT nn_nombre_tdoc CHECK ((nombre_disc IS NOT NULL))
);
 #   DROP TABLE simat_mas.discapacidad;
    	   simat_mas         heap    postgres    false    12         �            1259    188646    estado    TABLE     K  CREATE TABLE simat_mas.estado (
    id_estado character varying(1) NOT NULL,
    nombre_estado character varying(10),
    CONSTRAINT ck_estado CHECK (((nombre_estado)::text = ANY ((ARRAY['Activo'::character varying, 'Inactivo'::character varying])::text[]))),
    CONSTRAINT nn_nombre_estado CHECK ((nombre_estado IS NOT NULL))
);
    DROP TABLE simat_mas.estado;
    	   simat_mas         heap    postgres    false    12                    1259    229845    grados    TABLE     �   CREATE TABLE simat_mas.grados (
    id_grado character varying(2) NOT NULL,
    nombre_grado character varying(15),
    CONSTRAINT nn_nombre_grado CHECK ((nombre_grado IS NOT NULL))
);
    DROP TABLE simat_mas.grados;
    	   simat_mas         heap    postgres    false    12         �            1259    122935    roles    TABLE     �   CREATE TABLE simat_mas.roles (
    id_rol character varying(1) NOT NULL,
    nombre_rol character varying(40),
    CONSTRAINT nn_nombre_rol CHECK ((nombre_rol IS NOT NULL))
);
    DROP TABLE simat_mas.roles;
    	   simat_mas         heap    postgres    false    12                    1259    246570    solicitudes    TABLE     #  CREATE TABLE simat_mas.solicitudes (
    id_sol integer NOT NULL,
    id_acu integer NOT NULL,
    nombre_acu character varying(40),
    apellido_acu character varying(40),
    documento_acu character varying(15),
    email_acu character varying(20),
    telefono_acu character varying(20),
    id_tdoc_acu character varying(1),
    id_rol_acu character varying(1) DEFAULT '3'::character varying,
    id_aspi integer NOT NULL,
    nombre_aspi character varying(40),
    apellido_aspi character varying(40),
    documento_aspi character varying(15),
    id_grado character varying(2),
    id_disc character varying(1),
    id_tdoc_aspi character varying(1),
    id_rol_aspi character varying(1) DEFAULT '4'::character varying,
    CONSTRAINT nn_apellido_acu CHECK ((apellido_acu IS NOT NULL)),
    CONSTRAINT nn_apellido_aspi CHECK ((apellido_aspi IS NOT NULL)),
    CONSTRAINT nn_nombre_acu CHECK ((nombre_acu IS NOT NULL)),
    CONSTRAINT nn_nombre_aspi CHECK ((nombre_aspi IS NOT NULL)),
    CONSTRAINT nn_telefono_acu CHECK ((telefono_acu IS NOT NULL))
);
 "   DROP TABLE simat_mas.solicitudes;
    	   simat_mas         heap    postgres    false    12                    1259    246568    solicitudes_id_acu_seq    SEQUENCE     �   CREATE SEQUENCE simat_mas.solicitudes_id_acu_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE simat_mas.solicitudes_id_acu_seq;
    	   simat_mas          postgres    false    264    12         �           0    0    solicitudes_id_acu_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE simat_mas.solicitudes_id_acu_seq OWNED BY simat_mas.solicitudes.id_acu;
       	   simat_mas          postgres    false    262                    1259    246569    solicitudes_id_aspi_seq    SEQUENCE     �   CREATE SEQUENCE simat_mas.solicitudes_id_aspi_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE simat_mas.solicitudes_id_aspi_seq;
    	   simat_mas          postgres    false    12    264         �           0    0    solicitudes_id_aspi_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE simat_mas.solicitudes_id_aspi_seq OWNED BY simat_mas.solicitudes.id_aspi;
       	   simat_mas          postgres    false    263                    1259    246567    solicitudes_id_sol_seq    SEQUENCE     �   CREATE SEQUENCE simat_mas.solicitudes_id_sol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE simat_mas.solicitudes_id_sol_seq;
    	   simat_mas          postgres    false    12    264         �           0    0    solicitudes_id_sol_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE simat_mas.solicitudes_id_sol_seq OWNED BY simat_mas.solicitudes.id_sol;
       	   simat_mas          postgres    false    261         �            1259    196897    tipo_documento    TABLE     �   CREATE TABLE simat_mas.tipo_documento (
    id_tdoc character varying(1) NOT NULL,
    nombre_tdoc character varying(40),
    CONSTRAINT nn_nombre_tdoc CHECK ((nombre_tdoc IS NOT NULL))
);
 %   DROP TABLE simat_mas.tipo_documento;
    	   simat_mas         heap    postgres    false    12                    1259    246693    usuarios    TABLE     F  CREATE TABLE simat_mas.usuarios (
    id_user integer NOT NULL,
    nombre_user character varying(40),
    apellido_user character varying(40),
    documento_user character varying(15),
    email_user character varying(20),
    password_user character varying(40),
    id_tdoc character varying(1),
    id_rol character varying(1) NOT NULL,
    id_estado character varying(1),
    CONSTRAINT nn_apellido_user CHECK ((apellido_user IS NOT NULL)),
    CONSTRAINT nn_nombre_user CHECK ((nombre_user IS NOT NULL)),
    CONSTRAINT nn_password_user CHECK ((password_user IS NOT NULL))
);
    DROP TABLE simat_mas.usuarios;
    	   simat_mas         heap    postgres    false    12                    1259    246692    usuarios_id_user_seq    SEQUENCE     �   CREATE SEQUENCE simat_mas.usuarios_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE simat_mas.usuarios_id_user_seq;
    	   simat_mas          postgres    false    268    12         �           0    0    usuarios_id_user_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE simat_mas.usuarios_id_user_seq OWNED BY simat_mas.usuarios.id_user;
       	   simat_mas          postgres    false    267         �           2604    246682    audi_acceso id_user    DEFAULT     �   ALTER TABLE ONLY simat_mas.audi_acceso ALTER COLUMN id_user SET DEFAULT nextval('simat_mas.audi_acceso_id_user_seq'::regclass);
 E   ALTER TABLE simat_mas.audi_acceso ALTER COLUMN id_user DROP DEFAULT;
    	   simat_mas          postgres    false    265    266    266         �           2604    246573    solicitudes id_sol    DEFAULT     ~   ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_sol SET DEFAULT nextval('simat_mas.solicitudes_id_sol_seq'::regclass);
 D   ALTER TABLE simat_mas.solicitudes ALTER COLUMN id_sol DROP DEFAULT;
    	   simat_mas          postgres    false    264    261    264         �           2604    246574    solicitudes id_acu    DEFAULT     ~   ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_acu SET DEFAULT nextval('simat_mas.solicitudes_id_acu_seq'::regclass);
 D   ALTER TABLE simat_mas.solicitudes ALTER COLUMN id_acu DROP DEFAULT;
    	   simat_mas          postgres    false    264    262    264         �           2604    246576    solicitudes id_aspi    DEFAULT     �   ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_aspi SET DEFAULT nextval('simat_mas.solicitudes_id_aspi_seq'::regclass);
 E   ALTER TABLE simat_mas.solicitudes ALTER COLUMN id_aspi DROP DEFAULT;
    	   simat_mas          postgres    false    264    263    264         �           2604    246696    usuarios id_user    DEFAULT     z   ALTER TABLE ONLY simat_mas.usuarios ALTER COLUMN id_user SET DEFAULT nextval('simat_mas.usuarios_id_user_seq'::regclass);
 B   ALTER TABLE simat_mas.usuarios ALTER COLUMN id_user DROP DEFAULT;
    	   simat_mas          postgres    false    268    267    268         �          0    246679    audi_acceso 
   TABLE DATA           s   COPY simat_mas.audi_acceso (id_user, nombre_user, apellido_user, documento_user, fecha_acceso, id_rol) FROM stdin;
 	   simat_mas          postgres    false    266       3506.dat �          0    229882    discapacidad 
   TABLE DATA           ?   COPY simat_mas.discapacidad (id_disc, nombre_disc) FROM stdin;
 	   simat_mas          postgres    false    260       3500.dat �          0    188646    estado 
   TABLE DATA           =   COPY simat_mas.estado (id_estado, nombre_estado) FROM stdin;
 	   simat_mas          postgres    false    253       3497.dat �          0    229845    grados 
   TABLE DATA           ;   COPY simat_mas.grados (id_grado, nombre_grado) FROM stdin;
 	   simat_mas          postgres    false    259       3499.dat �          0    122935    roles 
   TABLE DATA           6   COPY simat_mas.roles (id_rol, nombre_rol) FROM stdin;
 	   simat_mas          postgres    false    242       3496.dat �          0    246570    solicitudes 
   TABLE DATA           �   COPY simat_mas.solicitudes (id_sol, id_acu, nombre_acu, apellido_acu, documento_acu, email_acu, telefono_acu, id_tdoc_acu, id_rol_acu, id_aspi, nombre_aspi, apellido_aspi, documento_aspi, id_grado, id_disc, id_tdoc_aspi, id_rol_aspi) FROM stdin;
 	   simat_mas          postgres    false    264       3504.dat �          0    196897    tipo_documento 
   TABLE DATA           A   COPY simat_mas.tipo_documento (id_tdoc, nombre_tdoc) FROM stdin;
 	   simat_mas          postgres    false    254       3498.dat �          0    246693    usuarios 
   TABLE DATA           �   COPY simat_mas.usuarios (id_user, nombre_user, apellido_user, documento_user, email_user, password_user, id_tdoc, id_rol, id_estado) FROM stdin;
 	   simat_mas          postgres    false    268       3508.dat �           0    0    audi_acceso_id_user_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('simat_mas.audi_acceso_id_user_seq', 2, true);
       	   simat_mas          postgres    false    265         �           0    0    solicitudes_id_acu_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('simat_mas.solicitudes_id_acu_seq', 1, true);
       	   simat_mas          postgres    false    262         �           0    0    solicitudes_id_aspi_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('simat_mas.solicitudes_id_aspi_seq', 1, true);
       	   simat_mas          postgres    false    263         �           0    0    solicitudes_id_sol_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('simat_mas.solicitudes_id_sol_seq', 1, true);
       	   simat_mas          postgres    false    261         �           0    0    usuarios_id_user_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('simat_mas.usuarios_id_user_seq', 1, true);
       	   simat_mas          postgres    false    267         	           2606    246686    audi_acceso pk_audi_acceso 
   CONSTRAINT     h   ALTER TABLE ONLY simat_mas.audi_acceso
    ADD CONSTRAINT pk_audi_acceso PRIMARY KEY (id_user, id_rol);
 G   ALTER TABLE ONLY simat_mas.audi_acceso DROP CONSTRAINT pk_audi_acceso;
    	   simat_mas            postgres    false    266    266         �           2606    229887    discapacidad pk_id_disc 
   CONSTRAINT     ]   ALTER TABLE ONLY simat_mas.discapacidad
    ADD CONSTRAINT pk_id_disc PRIMARY KEY (id_disc);
 D   ALTER TABLE ONLY simat_mas.discapacidad DROP CONSTRAINT pk_id_disc;
    	   simat_mas            postgres    false    260         �           2606    188652    estado pk_id_estado 
   CONSTRAINT     [   ALTER TABLE ONLY simat_mas.estado
    ADD CONSTRAINT pk_id_estado PRIMARY KEY (id_estado);
 @   ALTER TABLE ONLY simat_mas.estado DROP CONSTRAINT pk_id_estado;
    	   simat_mas            postgres    false    253         �           2606    229850    grados pk_id_grado 
   CONSTRAINT     Y   ALTER TABLE ONLY simat_mas.grados
    ADD CONSTRAINT pk_id_grado PRIMARY KEY (id_grado);
 ?   ALTER TABLE ONLY simat_mas.grados DROP CONSTRAINT pk_id_grado;
    	   simat_mas            postgres    false    259         �           2606    122940    roles pk_id_rol 
   CONSTRAINT     T   ALTER TABLE ONLY simat_mas.roles
    ADD CONSTRAINT pk_id_rol PRIMARY KEY (id_rol);
 <   ALTER TABLE ONLY simat_mas.roles DROP CONSTRAINT pk_id_rol;
    	   simat_mas            postgres    false    242         �           2606    196902    tipo_documento pk_id_tdoc 
   CONSTRAINT     _   ALTER TABLE ONLY simat_mas.tipo_documento
    ADD CONSTRAINT pk_id_tdoc PRIMARY KEY (id_tdoc);
 F   ALTER TABLE ONLY simat_mas.tipo_documento DROP CONSTRAINT pk_id_tdoc;
    	   simat_mas            postgres    false    254                    2606    246584    solicitudes pk_sol 
   CONSTRAINT     h   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT pk_sol PRIMARY KEY (id_sol, id_acu, id_aspi);
 ?   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT pk_sol;
    	   simat_mas            postgres    false    264    264    264                    2606    246701    usuarios pk_user 
   CONSTRAINT     ^   ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT pk_user PRIMARY KEY (id_user, id_rol);
 =   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT pk_user;
    	   simat_mas            postgres    false    268    268                    2606    246586    solicitudes uc_documento_acu 
   CONSTRAINT     c   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_documento_acu UNIQUE (documento_acu);
 I   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT uc_documento_acu;
    	   simat_mas            postgres    false    264                    2606    246590    solicitudes uc_documento_aspi 
   CONSTRAINT     e   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_documento_aspi UNIQUE (documento_aspi);
 J   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT uc_documento_aspi;
    	   simat_mas            postgres    false    264                    2606    246703    usuarios uc_documento_user 
   CONSTRAINT     b   ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT uc_documento_user UNIQUE (documento_user);
 G   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT uc_documento_user;
    	   simat_mas            postgres    false    268                    2606    246588    solicitudes uc_email_acu 
   CONSTRAINT     [   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_email_acu UNIQUE (email_acu);
 E   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT uc_email_acu;
    	   simat_mas            postgres    false    264                    2606    246705    usuarios uc_email_user 
   CONSTRAINT     Z   ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT uc_email_user UNIQUE (email_user);
 C   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT uc_email_user;
    	   simat_mas            postgres    false    268                    2606    246606    solicitudes fk_id_disc_aspi    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_disc_aspi FOREIGN KEY (id_disc) REFERENCES simat_mas.discapacidad(id_disc);
 H   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_disc_aspi;
    	   simat_mas          postgres    false    260    3327    264                    2606    246716    usuarios fk_id_estado_user    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_estado_user FOREIGN KEY (id_estado) REFERENCES simat_mas.estado(id_estado);
 G   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT fk_id_estado_user;
    	   simat_mas          postgres    false    3321    253    268                    2606    246601    solicitudes fk_id_grado_aspi    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_grado_aspi FOREIGN KEY (id_grado) REFERENCES simat_mas.grados(id_grado);
 I   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_grado_aspi;
    	   simat_mas          postgres    false    3325    264    259                    2606    246687    audi_acceso fk_id_rol_acceso    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.audi_acceso
    ADD CONSTRAINT fk_id_rol_acceso FOREIGN KEY (id_rol) REFERENCES simat_mas.roles(id_rol);
 I   ALTER TABLE ONLY simat_mas.audi_acceso DROP CONSTRAINT fk_id_rol_acceso;
    	   simat_mas          postgres    false    3319    266    242                    2606    246596    solicitudes fk_id_rol_acu    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_rol_acu FOREIGN KEY (id_rol_acu) REFERENCES simat_mas.roles(id_rol);
 F   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_rol_acu;
    	   simat_mas          postgres    false    3319    264    242                    2606    246616    solicitudes fk_id_rol_aspi    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_rol_aspi FOREIGN KEY (id_rol_aspi) REFERENCES simat_mas.roles(id_rol);
 G   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_rol_aspi;
    	   simat_mas          postgres    false    242    264    3319                    2606    246711    usuarios fk_id_rol_user    FK CONSTRAINT        ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_rol_user FOREIGN KEY (id_rol) REFERENCES simat_mas.roles(id_rol);
 D   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT fk_id_rol_user;
    	   simat_mas          postgres    false    3319    268    242                    2606    246591    solicitudes fk_id_tdoc_acu    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_tdoc_acu FOREIGN KEY (id_tdoc_acu) REFERENCES simat_mas.tipo_documento(id_tdoc);
 G   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_tdoc_acu;
    	   simat_mas          postgres    false    3323    264    254                    2606    246611    solicitudes fk_id_tdoc_aspi    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_tdoc_aspi FOREIGN KEY (id_tdoc_aspi) REFERENCES simat_mas.tipo_documento(id_tdoc);
 H   ALTER TABLE ONLY simat_mas.solicitudes DROP CONSTRAINT fk_id_tdoc_aspi;
    	   simat_mas          postgres    false    264    3323    254                    2606    246706    usuarios fk_id_tdoc_user    FK CONSTRAINT     �   ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_tdoc_user FOREIGN KEY (id_tdoc) REFERENCES simat_mas.tipo_documento(id_tdoc);
 E   ALTER TABLE ONLY simat_mas.usuarios DROP CONSTRAINT fk_id_tdoc_user;
    	   simat_mas          postgres    false    3323    268    254                                                                                            3506.dat                                                                                            0000600 0004000 0002000 00000000071 14421452321 0014243 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Santiago	Alvarez	1004897868	2023-04-24 02:00:00	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                       3500.dat                                                                                            0000600 0004000 0002000 00000000017 14421452321 0014235 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	si
2	no
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 3497.dat                                                                                            0000600 0004000 0002000 00000000031 14421452321 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Activo
2	Inactivo
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       3499.dat                                                                                            0000600 0004000 0002000 00000000214 14421452321 0014255 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Parvulos
2	Transición
3	Primero
4	Segundo
5	Tercero
6	Cuarto
7	Quinto
8	Sexto
9	Septimo
10	Octavo
11	Noveno
12	Décimo
13	Undécimo
\.


                                                                                                                                                                                                                                                                                                                                                                                    3496.dat                                                                                            0000600 0004000 0002000 00000000073 14421452321 0014255 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Administrador
2	Secretaria
3	Acudiente
4	Estudiante
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                     3504.dat                                                                                            0000600 0004000 0002000 00000000140 14421452321 0014236 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	1	Cristiano	Ronaldo	12345678	cr@gmail.com	3126901519	2	3	1	Cristiano	Jr	87654321	7	2	1	4
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                3498.dat                                                                                            0000600 0004000 0002000 00000000117 14421452321 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Targeta de Identidad
2	Cédula de Ciudadanía
3	Cédula de Extrangería
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                 3508.dat                                                                                            0000600 0004000 0002000 00000000104 14421452321 0014242 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Santiago	Alvarez	1004897868	calvos7@gmail.com	santi123	2	1	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                            restore.sql                                                                                         0000600 0004000 0002000 00000042433 14421452321 0015370 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE postgres;
--
-- Name: postgres; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Colombia.1252';


ALTER DATABASE postgres OWNER TO postgres;

\connect postgres

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: DATABASE postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- Name: simat_mas; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA simat_mas;


ALTER SCHEMA simat_mas OWNER TO postgres;

--
-- Name: SCHEMA simat_mas; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA simat_mas IS 'Gestión de matrículas para aspirantes a la institución Manos Amor y Semilla,';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: audi_acceso; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.audi_acceso (
    id_user integer NOT NULL,
    nombre_user character varying(40),
    apellido_user character varying(40),
    documento_user character varying(15),
    fecha_acceso timestamp without time zone,
    id_rol character varying(1) NOT NULL,
    CONSTRAINT nn_apellido_user CHECK ((apellido_user IS NOT NULL)),
    CONSTRAINT nn_nombre_user CHECK ((nombre_user IS NOT NULL))
);


ALTER TABLE simat_mas.audi_acceso OWNER TO postgres;

--
-- Name: audi_acceso_id_user_seq; Type: SEQUENCE; Schema: simat_mas; Owner: postgres
--

CREATE SEQUENCE simat_mas.audi_acceso_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE simat_mas.audi_acceso_id_user_seq OWNER TO postgres;

--
-- Name: audi_acceso_id_user_seq; Type: SEQUENCE OWNED BY; Schema: simat_mas; Owner: postgres
--

ALTER SEQUENCE simat_mas.audi_acceso_id_user_seq OWNED BY simat_mas.audi_acceso.id_user;


--
-- Name: discapacidad; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.discapacidad (
    id_disc character varying(1) NOT NULL,
    nombre_disc character varying(40),
    CONSTRAINT nn_nombre_tdoc CHECK ((nombre_disc IS NOT NULL))
);


ALTER TABLE simat_mas.discapacidad OWNER TO postgres;

--
-- Name: estado; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.estado (
    id_estado character varying(1) NOT NULL,
    nombre_estado character varying(10),
    CONSTRAINT ck_estado CHECK (((nombre_estado)::text = ANY ((ARRAY['Activo'::character varying, 'Inactivo'::character varying])::text[]))),
    CONSTRAINT nn_nombre_estado CHECK ((nombre_estado IS NOT NULL))
);


ALTER TABLE simat_mas.estado OWNER TO postgres;

--
-- Name: grados; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.grados (
    id_grado character varying(2) NOT NULL,
    nombre_grado character varying(15),
    CONSTRAINT nn_nombre_grado CHECK ((nombre_grado IS NOT NULL))
);


ALTER TABLE simat_mas.grados OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.roles (
    id_rol character varying(1) NOT NULL,
    nombre_rol character varying(40),
    CONSTRAINT nn_nombre_rol CHECK ((nombre_rol IS NOT NULL))
);


ALTER TABLE simat_mas.roles OWNER TO postgres;

--
-- Name: solicitudes; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.solicitudes (
    id_sol integer NOT NULL,
    id_acu integer NOT NULL,
    nombre_acu character varying(40),
    apellido_acu character varying(40),
    documento_acu character varying(15),
    email_acu character varying(20),
    telefono_acu character varying(20),
    id_tdoc_acu character varying(1),
    id_rol_acu character varying(1) DEFAULT '3'::character varying,
    id_aspi integer NOT NULL,
    nombre_aspi character varying(40),
    apellido_aspi character varying(40),
    documento_aspi character varying(15),
    id_grado character varying(2),
    id_disc character varying(1),
    id_tdoc_aspi character varying(1),
    id_rol_aspi character varying(1) DEFAULT '4'::character varying,
    CONSTRAINT nn_apellido_acu CHECK ((apellido_acu IS NOT NULL)),
    CONSTRAINT nn_apellido_aspi CHECK ((apellido_aspi IS NOT NULL)),
    CONSTRAINT nn_nombre_acu CHECK ((nombre_acu IS NOT NULL)),
    CONSTRAINT nn_nombre_aspi CHECK ((nombre_aspi IS NOT NULL)),
    CONSTRAINT nn_telefono_acu CHECK ((telefono_acu IS NOT NULL))
);


ALTER TABLE simat_mas.solicitudes OWNER TO postgres;

--
-- Name: solicitudes_id_acu_seq; Type: SEQUENCE; Schema: simat_mas; Owner: postgres
--

CREATE SEQUENCE simat_mas.solicitudes_id_acu_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE simat_mas.solicitudes_id_acu_seq OWNER TO postgres;

--
-- Name: solicitudes_id_acu_seq; Type: SEQUENCE OWNED BY; Schema: simat_mas; Owner: postgres
--

ALTER SEQUENCE simat_mas.solicitudes_id_acu_seq OWNED BY simat_mas.solicitudes.id_acu;


--
-- Name: solicitudes_id_aspi_seq; Type: SEQUENCE; Schema: simat_mas; Owner: postgres
--

CREATE SEQUENCE simat_mas.solicitudes_id_aspi_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE simat_mas.solicitudes_id_aspi_seq OWNER TO postgres;

--
-- Name: solicitudes_id_aspi_seq; Type: SEQUENCE OWNED BY; Schema: simat_mas; Owner: postgres
--

ALTER SEQUENCE simat_mas.solicitudes_id_aspi_seq OWNED BY simat_mas.solicitudes.id_aspi;


--
-- Name: solicitudes_id_sol_seq; Type: SEQUENCE; Schema: simat_mas; Owner: postgres
--

CREATE SEQUENCE simat_mas.solicitudes_id_sol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE simat_mas.solicitudes_id_sol_seq OWNER TO postgres;

--
-- Name: solicitudes_id_sol_seq; Type: SEQUENCE OWNED BY; Schema: simat_mas; Owner: postgres
--

ALTER SEQUENCE simat_mas.solicitudes_id_sol_seq OWNED BY simat_mas.solicitudes.id_sol;


--
-- Name: tipo_documento; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.tipo_documento (
    id_tdoc character varying(1) NOT NULL,
    nombre_tdoc character varying(40),
    CONSTRAINT nn_nombre_tdoc CHECK ((nombre_tdoc IS NOT NULL))
);


ALTER TABLE simat_mas.tipo_documento OWNER TO postgres;

--
-- Name: usuarios; Type: TABLE; Schema: simat_mas; Owner: postgres
--

CREATE TABLE simat_mas.usuarios (
    id_user integer NOT NULL,
    nombre_user character varying(40),
    apellido_user character varying(40),
    documento_user character varying(15),
    email_user character varying(20),
    password_user character varying(40),
    id_tdoc character varying(1),
    id_rol character varying(1) NOT NULL,
    id_estado character varying(1),
    CONSTRAINT nn_apellido_user CHECK ((apellido_user IS NOT NULL)),
    CONSTRAINT nn_nombre_user CHECK ((nombre_user IS NOT NULL)),
    CONSTRAINT nn_password_user CHECK ((password_user IS NOT NULL))
);


ALTER TABLE simat_mas.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_user_seq; Type: SEQUENCE; Schema: simat_mas; Owner: postgres
--

CREATE SEQUENCE simat_mas.usuarios_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE simat_mas.usuarios_id_user_seq OWNER TO postgres;

--
-- Name: usuarios_id_user_seq; Type: SEQUENCE OWNED BY; Schema: simat_mas; Owner: postgres
--

ALTER SEQUENCE simat_mas.usuarios_id_user_seq OWNED BY simat_mas.usuarios.id_user;


--
-- Name: audi_acceso id_user; Type: DEFAULT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.audi_acceso ALTER COLUMN id_user SET DEFAULT nextval('simat_mas.audi_acceso_id_user_seq'::regclass);


--
-- Name: solicitudes id_sol; Type: DEFAULT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_sol SET DEFAULT nextval('simat_mas.solicitudes_id_sol_seq'::regclass);


--
-- Name: solicitudes id_acu; Type: DEFAULT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_acu SET DEFAULT nextval('simat_mas.solicitudes_id_acu_seq'::regclass);


--
-- Name: solicitudes id_aspi; Type: DEFAULT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes ALTER COLUMN id_aspi SET DEFAULT nextval('simat_mas.solicitudes_id_aspi_seq'::regclass);


--
-- Name: usuarios id_user; Type: DEFAULT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios ALTER COLUMN id_user SET DEFAULT nextval('simat_mas.usuarios_id_user_seq'::regclass);


--
-- Data for Name: audi_acceso; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.audi_acceso (id_user, nombre_user, apellido_user, documento_user, fecha_acceso, id_rol) FROM stdin;
\.
COPY simat_mas.audi_acceso (id_user, nombre_user, apellido_user, documento_user, fecha_acceso, id_rol) FROM '$$PATH$$/3506.dat';

--
-- Data for Name: discapacidad; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.discapacidad (id_disc, nombre_disc) FROM stdin;
\.
COPY simat_mas.discapacidad (id_disc, nombre_disc) FROM '$$PATH$$/3500.dat';

--
-- Data for Name: estado; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.estado (id_estado, nombre_estado) FROM stdin;
\.
COPY simat_mas.estado (id_estado, nombre_estado) FROM '$$PATH$$/3497.dat';

--
-- Data for Name: grados; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.grados (id_grado, nombre_grado) FROM stdin;
\.
COPY simat_mas.grados (id_grado, nombre_grado) FROM '$$PATH$$/3499.dat';

--
-- Data for Name: roles; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.roles (id_rol, nombre_rol) FROM stdin;
\.
COPY simat_mas.roles (id_rol, nombre_rol) FROM '$$PATH$$/3496.dat';

--
-- Data for Name: solicitudes; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.solicitudes (id_sol, id_acu, nombre_acu, apellido_acu, documento_acu, email_acu, telefono_acu, id_tdoc_acu, id_rol_acu, id_aspi, nombre_aspi, apellido_aspi, documento_aspi, id_grado, id_disc, id_tdoc_aspi, id_rol_aspi) FROM stdin;
\.
COPY simat_mas.solicitudes (id_sol, id_acu, nombre_acu, apellido_acu, documento_acu, email_acu, telefono_acu, id_tdoc_acu, id_rol_acu, id_aspi, nombre_aspi, apellido_aspi, documento_aspi, id_grado, id_disc, id_tdoc_aspi, id_rol_aspi) FROM '$$PATH$$/3504.dat';

--
-- Data for Name: tipo_documento; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.tipo_documento (id_tdoc, nombre_tdoc) FROM stdin;
\.
COPY simat_mas.tipo_documento (id_tdoc, nombre_tdoc) FROM '$$PATH$$/3498.dat';

--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: simat_mas; Owner: postgres
--

COPY simat_mas.usuarios (id_user, nombre_user, apellido_user, documento_user, email_user, password_user, id_tdoc, id_rol, id_estado) FROM stdin;
\.
COPY simat_mas.usuarios (id_user, nombre_user, apellido_user, documento_user, email_user, password_user, id_tdoc, id_rol, id_estado) FROM '$$PATH$$/3508.dat';

--
-- Name: audi_acceso_id_user_seq; Type: SEQUENCE SET; Schema: simat_mas; Owner: postgres
--

SELECT pg_catalog.setval('simat_mas.audi_acceso_id_user_seq', 2, true);


--
-- Name: solicitudes_id_acu_seq; Type: SEQUENCE SET; Schema: simat_mas; Owner: postgres
--

SELECT pg_catalog.setval('simat_mas.solicitudes_id_acu_seq', 1, true);


--
-- Name: solicitudes_id_aspi_seq; Type: SEQUENCE SET; Schema: simat_mas; Owner: postgres
--

SELECT pg_catalog.setval('simat_mas.solicitudes_id_aspi_seq', 1, true);


--
-- Name: solicitudes_id_sol_seq; Type: SEQUENCE SET; Schema: simat_mas; Owner: postgres
--

SELECT pg_catalog.setval('simat_mas.solicitudes_id_sol_seq', 1, true);


--
-- Name: usuarios_id_user_seq; Type: SEQUENCE SET; Schema: simat_mas; Owner: postgres
--

SELECT pg_catalog.setval('simat_mas.usuarios_id_user_seq', 1, true);


--
-- Name: audi_acceso pk_audi_acceso; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.audi_acceso
    ADD CONSTRAINT pk_audi_acceso PRIMARY KEY (id_user, id_rol);


--
-- Name: discapacidad pk_id_disc; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.discapacidad
    ADD CONSTRAINT pk_id_disc PRIMARY KEY (id_disc);


--
-- Name: estado pk_id_estado; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.estado
    ADD CONSTRAINT pk_id_estado PRIMARY KEY (id_estado);


--
-- Name: grados pk_id_grado; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.grados
    ADD CONSTRAINT pk_id_grado PRIMARY KEY (id_grado);


--
-- Name: roles pk_id_rol; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.roles
    ADD CONSTRAINT pk_id_rol PRIMARY KEY (id_rol);


--
-- Name: tipo_documento pk_id_tdoc; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.tipo_documento
    ADD CONSTRAINT pk_id_tdoc PRIMARY KEY (id_tdoc);


--
-- Name: solicitudes pk_sol; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT pk_sol PRIMARY KEY (id_sol, id_acu, id_aspi);


--
-- Name: usuarios pk_user; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT pk_user PRIMARY KEY (id_user, id_rol);


--
-- Name: solicitudes uc_documento_acu; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_documento_acu UNIQUE (documento_acu);


--
-- Name: solicitudes uc_documento_aspi; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_documento_aspi UNIQUE (documento_aspi);


--
-- Name: usuarios uc_documento_user; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT uc_documento_user UNIQUE (documento_user);


--
-- Name: solicitudes uc_email_acu; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT uc_email_acu UNIQUE (email_acu);


--
-- Name: usuarios uc_email_user; Type: CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT uc_email_user UNIQUE (email_user);


--
-- Name: solicitudes fk_id_disc_aspi; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_disc_aspi FOREIGN KEY (id_disc) REFERENCES simat_mas.discapacidad(id_disc);


--
-- Name: usuarios fk_id_estado_user; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_estado_user FOREIGN KEY (id_estado) REFERENCES simat_mas.estado(id_estado);


--
-- Name: solicitudes fk_id_grado_aspi; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_grado_aspi FOREIGN KEY (id_grado) REFERENCES simat_mas.grados(id_grado);


--
-- Name: audi_acceso fk_id_rol_acceso; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.audi_acceso
    ADD CONSTRAINT fk_id_rol_acceso FOREIGN KEY (id_rol) REFERENCES simat_mas.roles(id_rol);


--
-- Name: solicitudes fk_id_rol_acu; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_rol_acu FOREIGN KEY (id_rol_acu) REFERENCES simat_mas.roles(id_rol);


--
-- Name: solicitudes fk_id_rol_aspi; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_rol_aspi FOREIGN KEY (id_rol_aspi) REFERENCES simat_mas.roles(id_rol);


--
-- Name: usuarios fk_id_rol_user; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_rol_user FOREIGN KEY (id_rol) REFERENCES simat_mas.roles(id_rol);


--
-- Name: solicitudes fk_id_tdoc_acu; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_tdoc_acu FOREIGN KEY (id_tdoc_acu) REFERENCES simat_mas.tipo_documento(id_tdoc);


--
-- Name: solicitudes fk_id_tdoc_aspi; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.solicitudes
    ADD CONSTRAINT fk_id_tdoc_aspi FOREIGN KEY (id_tdoc_aspi) REFERENCES simat_mas.tipo_documento(id_tdoc);


--
-- Name: usuarios fk_id_tdoc_user; Type: FK CONSTRAINT; Schema: simat_mas; Owner: postgres
--

ALTER TABLE ONLY simat_mas.usuarios
    ADD CONSTRAINT fk_id_tdoc_user FOREIGN KEY (id_tdoc) REFERENCES simat_mas.tipo_documento(id_tdoc);


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     