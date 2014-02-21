<?php
include ('../config/conexion.php');

$user=isset($_POST['usuario']) ? mysqli_real_escape_string($cnx, $_POST['usuario']) : false;
$pass=isset($_POST['contrasenia']) ? $_POST['contrasenia'] : false;

$_SESSION['error.log']='No esta registrado';

if( !isset($_SESSION['login']) && $user!=false && $pass!=false){
	$pass=md5($pass);
	$q = "SELECT usuario, contrasenia, id_nivel FROM $tabla_usuarios WHERE usuario = '$user' AND contrasenia = '$pass';";
	$filas=mysqli_query($cnx,$q);
	$qRta = mysqli_fetch_assoc($filas);
	if($qRta!=false){
		var_dump($qRta);
			$_SESSION['login']=$qRta['usuario'];
			$_SESSION['nivel']=$qRta['id_nivel'];
			$_SESSION['error.log']='Bienvenido '.$qRta['usuario'];
	}
	else{$_SESSION['error.log']='Datos Invalidos';}
}elseif(isset($_SESSION['login'])){
	$_SESSION['error.log']='Ya esta registrado';
}

if(isset($_GET['kill']))session_destroy();
if(isset($_GET['new']))$_SESSION['new']=true;
if(isset($_GET['close']))$_SESSION['new']=false;
header("Location: $_SERVER[HTTP_REFERER]");
?>