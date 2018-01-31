SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS pethome;

USE pethome;

CREATE TABLE usuario(
  idUsuario int(5) NOT NULL auto_increment primary key,
  nombre varchar(30) NOT NULL,
  apellido1 varchar(20) NOT NULL,
  apellido2 varchar(20),
  email varchar(30) NOT NULL,
  comunidad int(5) NOT NULL,
  telefono varchar(9) NOT NULL,
  contraseña varchar(15) NOT NULL,
  imagen varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE protectora(
  idProtectora int(5) NOT NULL auto_increment primary key,
  nombre varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  NIF varchar(9) NOT NULL UNIQUE,
  comunidad int(5) NOT NULL,
  direccion varchar(25) NOT NULL,
  telefono varchar(9) NOT NULL,
  contraseña varchar(15) NOT NULL,
  imagen_protectora varchar(50) NOT NULL,
  nombre_contacto varchar(30) NOT NULL,
  apellido_contacto varchar(30) NOT NULL,
  imagen_contacto varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


    

CREATE TABLE mascota(
  idMascota int(5) NOT NULL auto_increment primary key,
  tipoAnimal ENUM('PERRO','GATO') NOT NULL,
  nombre varchar(30) NOT NULL,
  raza int(2) NOT NULL,
  edat int(2) NOT NULL CHECK(0<edat<20),
  tamaño ENUM('PEQUEÑO','MEDIANO','GRANDE') NOT NULL,
  sexo ENUM('MACHO','HEMBRA') NOT NULL,
  castrado ENUM('SI','NO') NOT NULL,
  idProtectora int(5) NOT NULL,
  descripcion varchar(500) NOT NULL,
  imagen varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE raza(
  idRaza int(2) NOT NULL auto_increment primary key,
  especie ENUM('PERRO','GATO') NOT NULL,
  nombre varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mensajeria(
  idUsuario int(5) NOT NULL,
  idProtectora int(5) NOT NULL,
  idMensaje int(5) NOT NULL auto_increment,
  mensaje varchar(300) NOT NULL,
  fecha datetime,
  PRIMARY KEY (idMensaje)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE comunidades (
  idComunidad int(5) NOT NULL PRIMARY KEY,
  comunidad varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;		


ALTER TABLE mascota
	ADD CONSTRAINT CHK_EDAT CHECK (edat>0 AND edat<20),
	ADD CONSTRAINT FK_PROTECTORA_MASCOTA FOREIGN KEY (idProtectora) REFERENCES protectora (idProtectora),
    ADD CONSTRAINT FK_RAZA_MASCOTA FOREIGN KEY (raza) REFERENCES raza (idRaza);
    
ALTER TABLE mensajeria
	ADD CONSTRAINT FK_USUARIO_MENSAJERIA FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario),
    ADD CONSTRAINT FK_PROTECTORA_MENSAJERIA FOREIGN KEY (idProtectora) REFERENCES protectora (idProtectora);
	
ALTER TABLE usuario
	ADD CONSTRAINT FK_USUARIO_COMUNIDAD FOREIGN KEY (comunidad) REFERENCES comunidades (idComunidad);

ALTER TABLE protectora
	ADD CONSTRAINT FK_PROTECTORA_COMUNIDAD FOREIGN KEY (comunidad) REFERENCES comunidades (idComunidad);

INSERT INTO raza (especie,nombre) VALUES
	('PERRO','Pastor Alemán'),
    ('PERRO','Labrador Retriever'),
    ('PERRO','Rottweiler'),
    ('PERRO','Beagle'),
    ('PERRO','bulldog'),
    ('PERRO','Golden Retriever'),
    ('PERRO','Gran Danés'),
    ('PERRO','Caniche'),
    ('PERRO','Dóberman'),
    ('PERRO','Dachshund'),
    ('PERRO','Husky Siberiano'),
    ('PERRO','Chihuahua'),
    ('PERRO','Mastín Inglés'),
    ('PERRO','Bóxer'),
    ('PERRO','Pug'),
    ('PERRO','Chow Chow'),
    ('PERRO','Border Collie'),
    ('PERRO','Vizsla'),
    ('PERRO','Yorkshire terrier'),
    ('PERRO','Shih Tzu'),
    ('PERRO','Pit Bull'),
    ('PERRO','Pastor Ovejero Australiano'),
    ('PERRO','Bichón Maltés'),
    ('PERRO','Galgo Inglés'),
    ('PERRO','Pastor Belga Malinois'),
    ('PERRO','Cavalier King Charles Spaniel'),
    ('PERRO','Akita'),
    ('PERRO','Affenpinscher'),
    ('PERRO','Lhasa Apso'),
    ('PERRO','San Bernardo'),
    ('PERRO','Bobtail'),
    ('PERRO','Pomerania'),
    ('PERRO','Terranova'),
    ('PERRO','Pointer Inglés'),
    ('PERRO','Saluki'),
    ('PERRO','Pastor Ganadero Australiano'),
    ('PERRO','Malamute de Alaska'),
    ('PERRO','Pekinés'),
    ('PERRO','Corgi Galés de Cardigan'),
    ('PERRO','Basset Hound'),
    ('PERRO','Bulldog Francés'),
    ('PERRO','PStaffordshire bull terrier'),
    ('PERRO','Bichón Frisé'),
    ('PERRO','Perro de Montaña de los Pirineos'),
    ('PERRO','Bull Terrier'),
    ('PERRO','Boyero de Berna'),
    ('PERRO','Bullmastiff'),
    ('PERRO','Terrier de Norwich'),
    ('PERRO','Pastor de las Islas Shetland'),
    ('PERRO','Airedale Terrier'),
    ('PERRO','Boston Terrier'),
	('GATO','British Shorthair'),
	('GATO','Gato Siamés'),
	('GATO','Gato Persa'),
	('GATO','Ragdoll'),
	('GATO','Maine Coon'),
	('GATO','Bengala'),
	('GATO','Sphynx');
   
	
INSERT INTO comunidades (idComunidad, comunidad) VALUES
(1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Principado de Asturias'),
(4, 'Illes Balears'),
(5, 'Canarias'),
(6, 'Cantabria'),
(7, 'Castilla y León'),
(8, 'Castilla - La Mancha'),
(9, 'Cataluña'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Comunidad de Madrid '),
(14, 'Región de Murcia'),
(15, 'Comunidad Foral de Navarra'),
(16, 'País Vasco'),
(17, 'La Rioja'),
(18, 'Ceuta'),
(19, 'Melilla');
    
COMMIT;
