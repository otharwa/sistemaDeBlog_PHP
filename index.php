<?php
include('include/funciones.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
	<title>Radio Fm Paraiso 42</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="css/estilo.css" />
	<script type="text/javascript"></script>
</head>
<body>
<div id="contenedor">
	<div id="encabezado">
		<?php include('include/header.php'); ?>
	</div>
	<div class="clearfix">
		<div class="contenido">
			<div id="slider" class="clearfix">
				<?php slider(); ?>
			</div>
			<?php ultimo_articulo(); ?>
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