		<div id="logo">
			<div><img src="img/logo.jpg" alt="Logo Fm Paraiso 42" /></div>
			<div>
				<h1>Fm Paraiso 42</h1>
				<h2>fm95.5Mhz - El Hoyo - Chubut</h2>
			</div>
		</div>
		<div id="menu" class="clearfix">
			<ul class="clearfix">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="noticias.php">Noticias</a></li>
				<li><a href="contacto.php">Contacto</a></li>
				<li><a href="acerca_de.php">Acerca de</a></li>
				<li id="registro">
					<span>Ingresar <?php if(!empty($_SESSION['login']))echo ' || '.$_SESSION['login']; ?></span>
					<div id="reg_inv">
						<div>
						<form action="include/registro.login.php" method="post">
							<div><input type="text" name="usuario" value="<?php if(!empty($_SESSION['login']))echo $_SESSION['login'];else echo 'admin'; ?>" /></div>
							<div><input type="password" name="contrasenia" value="1234" /></div>
							<div><input type="submit" value="Ingresar" /><a class="lnkLogin" href="include/registro.login.php?kill" >cerrar</a></div>
							<div><input id="readonly" type="text" readonly="on" value="<?php if(!empty($_SESSION['error.log']))echo $_SESSION['error.log']; ?>"  /></div>
							<?php if(!!empty($_SESSION['login'])) echo '<div><a class="lnkLogin" href="include/registro.login.php?new">Crear Cuenta</a></div>';
									else echo '<div><a class="lnkLogin" href="include/registro.edit.php?editar">Editar Cuenta</a></div>'; ?>
						</form>
						</div>
					</div>
				</li>
			</ul>
			<ul class="clearfix">
				<li><a href="www.facebook.com" ><img src="img/FaceBook_32x32.png" alt="Seguinos en Facebook" /></a></li>
				<li><a href="www.twitter.com" ><img src="img/Twitter_32x32.png" alt="Seguinos en Twitter" /></a></li>
			</ul>
			
			<?php
				if( !empty($_SESSION['new']) ){
					
if(!empty($_SESSION['error.log'])) $error= '<div><input id="readonly" type="text" readonly="on" value="'.$_SESSION['error.newlogin'].'"  /></div>';

					echo '<div class="usuarios">
						<form action="include/registro.new.login.php" method="post">
							<div><label for="usuario">Nombre de Usuario:</label><input type="text" name="usuario" /></div>
							<div><label for="contrasenia">Contraseña:</label><input type="password" name="contrasenia" /></div>
							<div><label for="contrasenia_rpt">Repita la Contraseña:</label><input type="password" name="contrasenia_rpt" /></div>
							<div><label for="nombre">Nombre:</label><input type="text" name="nombre" /></div>
							<div><label for="apellido">Apellido:</label><input type="text" name="apellido" /></div>
							<div><label for="correo">Correo Electronico:</label><input type="text" name="correo" /></div>
							<div><label for="domicilio">Domicilio:</label><input type="text" name="domicilio" /></div>
							<div><label for="telefono">Telefono:</label><input type="text" name="telefono" /></div>
							$error
							<div><input type="reset" value="Limpiar" /><input type="submit" value="Crear Nueva Cuenta" /></div>
							<div><a class="lnkLogin" href="include/registro.new.login.php?close">cerrar</a></div>
						</form>
					</div>';
				}
			if(!empty($_SESSION['editar']) && !empty($_SESSION['login'])){
					
					$select = "SELECT * FROM usuarios WHERE usuario = '$_SESSION[login]' ;";
					$selectRTA = mysqli_query($cnx,$select);
					$selectRTA = mysqli_fetch_assoc($selectRTA);

if(!empty($_SESSION['error.editlogin'])) $error= '<div><input id="readonly" type="text" readonly="on" value="'.$_SESSION['error.editlogin'].'"  /></div>';

					echo <<<HTML
					<div class="usuarios">
						<form action="include/registro.edit.php" method="post"> 
							<div><label for="contrasenia">Contraseña:</label><input type="password" name="contrasenia" /></div>
							<div><label for="contrasenia_rpt">Repita la Contraseña:</label><input type="password" name="contrasenia_rpt" /></div>
							<div><label for="nombre">Nombre:</label><input type="text" name="nombre" value="$selectRTA[nombre]" /></div>
							<div><label for="apellido">Apellido:</label><input type="text" name="apellido" value="$selectRTA[apellido]" /></div>
							<div><label for="correo">Correo Electronico:</label><input type="text" name="correo" value="$selectRTA[correo]" /></div>
							<div><label for="domicilio">Domicilio:</label><input type="text" name="domicilio" value="$selectRTA[domicilio]" /></div>
							<div><label for="telefono">Telefono:</label><input type="text" name="telefono" value="$selectRTA[telefono]" /></div>
							$error
							<div><input type="reset" value="Limpiar" /><input type="submit" value="Editar Cuenta" /></div>
							<div><a class="lnkLogin" href="include/registro.edit.php?close">cerrar</a></div>
						</form>
					</div>
HTML;
				}
			?>
		</div>