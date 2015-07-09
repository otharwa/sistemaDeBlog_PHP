<?php
include('conexion.php');

$create = "USE sistemaBlogPHP;

CREATE TABLE niveles (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nivel VARCHAR(15) UNIQUE
);
CREATE TABLE usuarios (
	id TINYINT(3)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario VARCHAR(20) UNIQUE NOT NULL ,
	contrasenia CHAR(32) NOT NULL,
	id_nivel TINYINT(1) UNSIGNED NOT NULL DEFAULT 2,
	nombre VARCHAR(20),
	apellido VARCHAR(20),
	correo VARCHAR(60) UNIQUE NOT NULL ,
	domicilio VARCHAR(80),
	telefono VARCHAR(20),
		
	FOREIGN KEY (id_nivel) REFERENCES niveles(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE categorias (
	id TINYINT(1)uNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(20) UNIQUE NOT NULL 
);
CREATE TABLE imagenes (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	archivo VARCHAR(37) UNIQUE NOT NULL,
	titulo VARCHAR(100),
	descripcion VARCHAR(150),
	id_categoria TINYINT(1)UNSIGNED DEFAULT 1,
	
	FOREIGN KEY (id_categoria) REFERENCES categorias(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE secciones (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	seccion varchar(20)
);
CREATE TABLE estados (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	estado varchar(10)
);
CREATE TABLE articulos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(100),
	fecha_publicacion DATETIME,
	articulo LONGTEXT,
	tags VARCHAR(90),
	id_estado TINYINT(1)UNSIGNED NOT NULL,
	id_imagen SMALLINT UNSIGNED,
	id_seccion TINYINT(1)UNSIGNED NOT NULL,
	
	FOREIGN KEY (id_estado) REFERENCES estados(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	
	FOREIGN KEY (id_imagen) REFERENCES imagenes(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	
	FOREIGN KEY (id_seccion) REFERENCES secciones(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE musica (
	id TINYINT(2)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(25),
	artista VARCHAR(25),
	votos TINYINT(2) UNSIGNED DEFAULT 0
); ";
$query=mysqli_query($cnx, $create);
var_dump($create);

/**********************************************************/

$insert = "INSERT INTO niveles (nivel) VALUES ('admin'),('user');
INSERT INTO usuarios (usuario,contrasenia,id_nivel,nombre,apellido,correo,domicilio,telefono)
VALUES
('admin',md5('1234'),1,'Sebastian','Arca','sebastianarca@riseup.net','S/N S/N','011-15-38852471'),
('user',md5('1234'),2,null,null,'null@null.com.ar',null,null );
INSERT INTO categorias (categoria) VALUES ('noticias');
INSERT INTO estados (estado) VALUES ('Aprobado'),('Pendiente'),('Borrado');
INSERT INTO secciones (seccion) VALUES ('Todo'),('Policial'),('Sociedad'),('Tecnologia'),('Espectaculo');
INSERT INTO musica (nombre,artista) VALUES 
('Yellow Submarine','Beatles'),
('Karkelo','Korpiklaani'),
('Stairway To Heaven','Led Zeppelin'),
('Fermin','Almendra'),
('Silent Dream','Rhapsody of Fire'),
('Sex & Religion','Steve Vai'),
('The Castle Hall','Ayreon'),
('Marcha de la bronca','Miguel Cantilo');";
$query=mysqli_query($cnx, $insert);
var_dump($query);

/**********************************************************/



?>

