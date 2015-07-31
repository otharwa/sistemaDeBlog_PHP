<?php
include('include/funciones.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
	<title>Radio Fm Paraiso 42</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" media="all" href="css/estilo.css" />
</head>
<body>
<div id="contenedor">
	<div id="encabezado">
		<?php include('include/header.php'); ?>
	</div>
	<div class="clearfix">
		<div class="sinLateral">
			<div>
				<div>
				<div id="galeria">
					<p>Desarrollador: Sebastian Arca</p>
					<p>Datos del Trabajo: Clientes Web - German Rodriguez</p>
					<h2>Acerca del sitio</h2>
					<p> El proyecto es un gestor de noticias simple, permite cargar nuevos articulos, y pose un gestor de imagenes para facilitar la vinculacion.</p>
					<p>En el panel lateral tenemos un sistema de votacion para temas musicales, el listado se ordena en funcion de los votos, y los usuarios deben estar logueados</p>
					<h3>Administracion</h3>
					<p>Para administrar debe ingresar en <a href="admin">/admin</a> <br /> usuario: admin | clave: 1234 <br /> usuario: user | clave: 1234</p>
					<p>Aqui puede cargar nuevos articulos, y asociarlos a imagenes previamente cargadas</p>
					<p>Los articulos se peuden clasificar por Seccion, y al crear uno nuevo se marcan como Borrador por dafault, para luego moderarlo</p>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="pie"><p><a href="contacto.php">Comunicarse con la radio</a></p><p>Diseñado por Sebastián Arca</p></div>
</body>
</html>