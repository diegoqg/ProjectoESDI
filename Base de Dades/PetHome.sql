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
  unidadEdad ENUM('MESES','AÑOS') NOT NULL,
  tamaño ENUM('PEQUEÑO','MEDIANO','GRANDE') NOT NULL,
  sexo ENUM('MACHO','HEMBRA') NOT NULL,
  castrado ENUM('SI','NO') NOT NULL,
  urgente ENUM('SI','NO') NOT NULL,
  idProtectora int(5) NOT NULL,
  descripcion varchar(500) NOT NULL,
  imagenPerfil varchar(50) NOT NULL,
  imagen1 varchar(50) NOT NULL,
  imagen2 varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE raza(
  idRaza int(2) NOT NULL auto_increment primary key,
  especie ENUM('PERRO','GATO') NOT NULL,
  nombre varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mensajeria(
  idUsuario int(5) NOT NULL,
  idProtectora int(5) NOT NULL,
  idMascota int(5) NOT NULL,
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
	ADD CONSTRAINT FK_MASCOTA_MENSAJERIA FOREIGN KEY (idMascota) REFERENCES mascota (idMascota),
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
	('GATO','Sphynx'),
	('GATO','Abisinio'),
	('GATO','Azul ruso'),
	('GATO','Burmés'),
	('GATO','Bobtail Americano'),
	('GATO','Siberiano'),
	('GATO','Gato exótico'),
	('GATO','Scottish Fold'),
	('GATO','American shorthair'),
	('GATO','Sagrado de Birmania'),
	('GATO','Cornish rex'),
	('GATO','Ocicat'),
	('GATO','Bosque de Noruega'),
	('GATO','Gato tonkinés'),
	('GATO','Angora turco'),
	('GATO','Gato Manx'),
	('GATO','Devon rex'),
	('GATO','Mau egipcio'),
	('GATO','Gato Van Turco'),
	('GATO','Curl Americano'),
	('GATO','Bombay'),
	('GATO','Gato himalayo'),
	('GATO','Chartreux'),
	('GATO','Gato balinés'),
	('GATO','Gato Savannah'),
	('GATO','Korat'),
	('GATO','Bobtail japonés'),
	('GATO','Singapura'),
	('GATO','Ragamuffin'),
	('GATO','LaPerm'),
	('GATO','Gato Somalí'),
	('GATO','Selkirk rex'),
	('GATO','Habana brown'),
	('GATO','American wirehair'),
	('GATO','Gato oriental de pelo largo'),
	('GATO','Cymric'),
	('GATO','Munchkin'),
	('GATO','Snowshoe'),
	('GATO','Nebelung'),
	('GATO','Gato color point'),
	('GATO','Pixie Bob'),
	('GATO','Gato oriental'),
	('GATO','Burmilla'),
	('GATO','Dragon Li'),
	('GATO','Peterbald');
   
	
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
    
INSERT INTO usuario (nombre,apellido1,apellido2,email,comunidad,telefono,contraseña,imagen) VALUES
	('Pau','Barbarroja','Claramunt','paubarbarroja@gmail.com',9,'679705761',PASSWORD('1234'),'img.png');
INSERT INTO protectora(nombre,email,NIF,comunidad,direccion,telefono,contraseña,imagen_protectora,nombre_contacto,apellido_contacto,imagen_contacto) VALUES
	('protectoraAnimanilsta','animales@gmail.com','L87654392',9,'CALLE JUVENAL 1','987654321',PASSWORD('1234'),'img.jpg','Maria Luisa','Fernandez','contancto.jpg');
INSERT INTO mascota (tipoAnimal,nombre,raza,edat,tamaño,sexo,castrado,urgente,idProtectora,descripcion,imagen) VALUES
	('PERRO','Coco',1,3,'PEQUEÑO','MACHO','SI','NO',1,'PERRO PEQUEÑO CON GANAS DE TENER UNA FAMILIA MOVIDA, LE GUSTA MUCHO JUGAR CON LOS MAS PEQUEÑOS DE LA CASA','perro.img');
INSERT INTO mensajeria(idUsuario,idProtectora,idMascota,mensaje,fecha) VALUES
	(1,1,1,'Hola buenas me gustaria conocer a Coco, ¿cuando podria ir a verlo?',SYSDATE());
	
COMMIT;
