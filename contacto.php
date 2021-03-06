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
					<form method="post" action="#" id="suscripcion">
						<fieldset>
							<legend>Reciva novedades en su correo</legend>
							<div class="sinDecoracion">
								<label for="email">E-mail :</label>
								<input type="text" name="email" id="email" />
								<label for="contrasenia">Contrase&ntilde;a :</label>
								<input type="text" name="contrasenia" id="contrasenia" />
							</div>
							<div class="sinDecoracion button">
								<input type="submit" class="button" value="Suscribirse" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div>
				<div>
					<form method="post" action="#" id="contacto">
						<fieldset>
							<legend>Envíe una opinión</legend>
							<div>
								<label for="nombre">Nombre :</label>
								<input type="text" name="nombre" id="nombre" />
								<label for="apellido">Apellido :</label>
								<input type="text" name="apellido" id="apellido" />
							</div>
							<div>
								<label for="pais">País de Residencia :</label>
								<input type="text" name="pais" id="pais" />
								<label for="ciudad">Ciudad :</label>
								<input type="text" name="ciudad" id="ciudad" />
							</div>
							<div>
							<label>sexo :</label>
							<label for="masculino">Masculino</label>
							<input type="radio" name="sexo" id="masculino" value="Masculino" />
							<label for="femenino">Femenino</label>
							<input type="radio" name="sexo" id="femenino" value="Femenino" />
							</div>
							<div>
							<label for="edad">Edad :</label>
							<input type="text" name="edad" id="edad" maxlength="3" />
							</div>
							<div>
							<label for="difucion">&iquest;Cómo se enteró de FM Paraiso 42?</label>
							<select name="difucion" id="difucion">
								<option value="revista">Revista</option>
								<option value="amigos">Amigos</option>
								<option value="facebook">Facebook</option>
								<option value="twitter">Twitter</option>
								<option value="otro">Otro</option>
							</select>
							</div>
							<div>
							<label for="archivo">Envía una foto</label>
							<input type="file" name="archivo" id="archivo" />
							</div>
							<div class="sinDecoracion">
							<label for="mensaje">Dejá tu mensaje :</label>	
							<textarea name="mensaje" id="mensaje" rows="6" cols="40"></textarea>
							</div>
							<div class="clearfix button sinDecoracion">
								<input type="reset" value="Reset" />
								<input type="submit" value="Enviar" />	
							</div>						
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="pie"><p><a href="contacto.php">Comunicarse con la radio</a></p><p>Diseñado por Sebastián Arca</p></div>
</body>
</html>