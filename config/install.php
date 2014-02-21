<?php
include('conexion.php');

$create = "
USE sebastian_arca;

CREATE TABLE $tabla_niveles (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nivel VARCHAR(15) UNIQUE
);
CREATE TABLE $tabla_usuarios (
	id TINYINT(3)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario VARCHAR(20) UNIQUE NOT NULL ,
	contrasenia CHAR(32) NOT NULL,
	id_nivel TINYINT(1) UNSIGNED DEFAULT 2 NOT NULL,
	nombre VARCHAR(20),
	apellido VARCHAR(20),
	correo VARCHAR(60) UNIQUE NOT NULL ,
	domicilio VARCHAR(80),
	telefono VARCHAR(20),
		
	FOREIGN KEY (id_nivel) REFERENCES $tabla_niveles(id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE $tabla_categorias (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(20) UNIQUE NOT NULL 
);
CREATE TABLE $tabla_imagenes (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	archivo VARCHAR(37) UNIQUE NOT NULL,
	titulo VARCHAR(100),
	descripcion VARCHAR(150),
	id_categoria TINYINT(1)DEFAULT 1 UNSIGNED,
	
	FOREIGN KEY (id_categoria) REFERENCES $tabla_categorias (id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE $tabla_secciones (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	seccion varchar(20)
);
CREATE TABLE $tabla_estados (
	id TINYINT(1)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	estado varchar(10)
);
CREATE TABLE $tabla_articulos (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(100),
	fecha_publicacion DATETIME,
	articulo LONGTEXT,
	tags VARCHAR(90),
	id_estado TINYINT(1)UNSIGNED NOT NULL,
	id_imagen SMALLINT UNSIGNED,
	id_seccion TINYINT(1)UNSIGNED NOT NULL,
	
	FOREIGN KEY (id_estado) REFERENCES $tabla_estados (id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	
	FOREIGN KEY (id_imagen) REFERENCES $tabla_imagenes (id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	
	FOREIGN KEY (id_seccion) REFERENCES $tabla_secciones (id)
	ON UPDATE CASCADE
	ON DELETE RESTRICT
);
CREATE TABLE $tabla_musica (
	id TINYINT(2)UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(25),
	artista VARCHAR(25),
	votos TINYINT(2) UNSIGNED DEFAULT 0
);
";

$query=mysqli_query($cnx, $create);
var_dump($query);

/**********************************************************/

$insert = "
INSERT INTO $tabla_niveles (nivel) VALUES ('admin'),('user');
INSERT INTO $tabla_usuarios (usuario,contrasenia,id_nivel,nombre,apellido,correo,domicilio,telefono)
VALUES
('admin',md5('1234'),1,'Sebastian','Arca','sebastianarca@riseup.net','S/N S/N','011-15-38852471'),
('user',md5('1234'),2,null,null,'null@null.com.ar',null,null );
INSERT INTO $tabla_categorias (categoria) VALUES ('noticias');
INSERT INTO $tabla_estados (estado) VALUES ('Aprobado'),('Pendiente'),('Borrado');
INSERT INTO $tabla_secciones (seccion) VALUES ('Todo'),('Policial'),('Sociedad'),('Tecnologia'),('Espectaculo');
INSERT INTO $tabla_musica (nombre,artista) VALUES 
('Yellow Submarine','Beatles'),
('Karkelo','Korpiklaani'),
('Stairway To Heaven','Led Zeppelin'),
('Fermin','Almendra'),
('Silent Dream','Rhapsody of Fire'),
('Sex & Religion','Steve Vai'),
('The Castle Hall','Ayreon'),
('Marcha de la bronca','Miguel Cantilo');
";
$query=mysqli_query($cnx, $insert);
var_dump($query);

/**********************************************************/



?>

