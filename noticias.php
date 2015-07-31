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
		<div id="menuNoticias" class="clearfix">
			<ul class="clearfix">
				<?php menu_secciones(); ?>
			</ul>
			<form action="#" method="post">
				<fieldset>
					<input type="text" size="10" value="Buscar" name="busqueda" />
					<a href="#" ><img src="img/search_icon.png" alt="buscar" /></a>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="clearfix">
		<div class="contenido">
			<?php articulo(); ?>
		</div>
		
		<div id="lateral">
			<div id="vivo"><a href="#" >Escuchanos<br />En Vivo</a></div>
			<div>
				<ul class="lateralSec">
					<li>Ultimas Noticias<hr /></li>
					<?php ultimas_noticias(); ?>
				</ul>
				<ul id="votarCanciones">
					<?php votacion(); ?>
				</ul>	
			</div>
		</div>
	</div>
</div>
<div id="pie"><p><a href="contacto.php">Comunicarse con la radio</a></p><p>Diseñado por Sebastián Arca</p></div>
</body>
</html>