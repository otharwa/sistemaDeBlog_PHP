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
		<div id="logo">
			<div><img src="../img/logo.jpg" alt="Logo Fm Paraiso 42" /></div>
			<div>
				<h1>Fm Paraiso 42</h1>
				<h2>fm95.5Mhz - El Hoyo - Chubut</h2>
			</div>
		</div>
		<div id="menu" class="clearfix">
			<ul class="clearfix">
				<li><a href="../index.php">Inicio</a></li>
				<li><a href="../noticias.php">Noticias</a></li>
				<li><a href="../galeria.php">Galeria</a></li>
				<li><a href="../contacto.php">Contacto</a></li>
				<li><a href="../acerca_de.php">Acerca de</a></li>
				<li id="registro">
					<span>Ingresar <?php if(isset($_SESSION['login']))echo ' || '.$_SESSION['login']; ?></span>
					<div id="reg_inv">
						<div>
						<form action="../include/registro.login.php" method="post">
							<div><input type="text" name="usuario" value="admin" /></div>
							<div><input type="password" name="contrasenia" value="1234" /></div>
							<div><input type="submit" value="Ingresar" /><a class="lnkLogin" href="../include/registro.login.php?kill" >cerrar</a></div>
							<div><input id="readonly" type="text" readonly="on" value="<?php if(isset($_SESSION['error.log']))echo $_SESSION['error.log']; ?>"  /></div>
						</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="clearfix">
		<div class="sinLateral">
			<div>
				<div>
					<form method="post" enctype="multipart/form-data" action="include.admin/imagen.subir.php" id="suscripcion">
						<fieldset>
							<legend>Agregar Imagenes</legend>
							<div class="sinDecoracion">
								<label for="imagen">Seleccione una imagen :</label>
								<input accept="image/jpeg" type="file" name="imagen" />
							</div>
							<div class="sinDecoracion">
								<label for="tituloImagen">Titulo de la Imagen :</label>
								<input type="text" name="tituloImagen" id="tituloImagen" />
							</div>
							<div class="sinDecoracion">
								<label for="descripcionImagen">Descripcion de la Imagen :</label>
								<input type="text" name="descripcionImagen" id="descripcionImagen" />
							</div>
							<div class="sinDecoracion">
								<input type="text" readonly="on" size="40" value="<?php if(isset($_SESSION['error.loadImage'])) echo $_SESSION['error.loadImage']; else echo 'Al subir el mismo archivo se reemplaza'; ?>" />
							</div>
							<div class="sinDecoracion button">
								<input type="submit" class="button" value="Subir Imagen" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div>
				<div>
					<form method="post" action="include.admin/articulo.crear.php" id="contacto">
						<fieldset>
							<legend>Administracion de Articulos</legend>
								<div >
									<label for="tituloArticuloNuevo">Titulo del Articulo :</label>
									<input type="text" name="tituloArticuloNuevo" id="tituloArticuloNuevo" />
									<label><input type="checkbox" name="status" value="1" />Publicar?</label>
									<?php
									$q = "SELECT id,seccion FROM secciones;";
									$query=mysqli_query($cnx,$q);
									
									echo '<select name="seccion" id="difucion">';
									
									while($queryRTA = mysqli_fetch_assoc($query)){
										echo '<option value="'.$queryRTA['id'].'">'.$queryRTA['seccion'].'</option>';
									}
									
									echo '</select> <label>Seccion</label>';
									
									?>
										
									
									
								</div>
								<div class="floatArticulo">
									<label for="articuloNuevo">Escribi el articulo</label>	
									<textarea name="articuloNuevo" id="articuloNuevo" rows="10" cols="40"></textarea>
								</div>
								
								<div id="lstImagenArticulo">
									<span>Elija una imagen para el articulo</span>
									<?php
										$q = "SELECT id,titulo FROM imagenes WHERE titulo IS NOT NULL;";
										$query=mysqli_query($cnx,$q);
										echo '<ul id="listaImagenesNew">';
										echo '<li><label><input type="radio" name="imagenArticulo" value="0" />Sin imagen</label></li>';
										
										while($queryRTA = mysqli_fetch_assoc($query)){
											echo '<li><label><input type="radio" name="imagenArticulo" value="'.$queryRTA['id'].'" />'.$queryRTA['titulo'].'</label></li>';
										}
										echo '</ul></div>';
										
										echo '<div class="sinDecoracion"><input type="text" readonly="on" size="40" value="';
										if(isset($_SESSION['error.CreateArticulo'])) echo $_SESSION['error.CreateArticulo'];
										echo'" /></div>';
									?>
								<div>
									<label for="tags">Tags: </label>
									<input type="text" name="tags" id="tituloArticuloNuevo" size="80" />
								</div>
							<div class="clearfix button sinDecoracion">
								<input type="reset" value="Reset" />
								<input type="submit" value="Enviar" />	
							</div>						
						</fieldset>
					</form>
				</div>
			</div>
			<div>
				<div>
					<form method="post" action="include.admin/articulo.moderar.php" id="contacto">
						<fieldset>
							<legend>Moderar Articulos</legend>
								<div id="moderarArticulos">
									<ul>
										<li><span class="centro">Aprobar articulo</span></li>
										<?php
										
										$q = "SELECT id, titulo, id_estado FROM articulos WHERE id_estado='2';";
										$query = mysqli_query($cnx, $q);
										
										while($queryRTA= mysqli_fetch_assoc($query)){
										
											echo '<li><label><input type="checkbox" name="statusAprobar[]" value="'.$queryRTA['id'].'" />'.$queryRTA['titulo'].'</label></li>';
										
										}
										?>
									</ul>
								
									<ul>
										<li><span class="centro">Borrar articulo</span></li>
										<?php
										
										$q = "SELECT id, titulo, id_estado FROM articulos WHERE id_estado!='3';";
										$query = mysqli_query($cnx, $q);
										
										while($queryRTA= mysqli_fetch_assoc($query)){
										
											echo '<li><label><input type="checkbox" name="statusBorrar[]" value="'.$queryRTA['id'].'" />'.$queryRTA['titulo'].'</label></li>';
										
										}
										?>
										
									</ul>
								</div>
								<?php
								
								echo '<div class="sinDecoracion"><input type="text" readonly="on" size="40" value="';
								if(isset($_SESSION['error.ModerarArticulo'])) echo $_SESSION['error.ModerarArticulo'];
								echo'" /></div>';
								
								?>
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
<div id="pie"><p><a href="contacto.html">Comunicarse con la radio</a></p><p>Diseñado por Sebastián Arca</p></div>
</body>
</html>