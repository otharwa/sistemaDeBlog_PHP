<?php
include ('../config/conexion.php');

$usuario=isset($_POST['usuario']) ? mysqli_real_escape_string($cnx,$_POST['usuario']) : false;
$contrasenia=isset($_POST['contrasenia']) ? mysqli_real_escape_string($_POST['contrasenia']) : false;
$contrasenia_rpt=isset($_POST['contrasenia_rpt']) ? mysqli_real_escape_string($_POST['contrasenia_rpt']) : false;
$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($cnx,$_POST['nombre']) : false;
$apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($cnx,$_POST['apellido']) : false;
$correo=isset($_POST['correo']) ? mysqli_real_escape_string($cnx,$_POST['correo']) : false;
$domicilio=isset($_POST['domicilio']) ? mysqli_real_escape_string($cnx,$_POST['domicilio']) : false;
$telefono=isset($_POST['telefono']) ? mysqli_real_escape_string($cnx,$_POST['telefono']) : false;

if( !isset($_SESSION['login']) && $usuario!=false && $contrasenia!=false && $correo!=false && ($contrasenia==$contrasenia_rpt) ){
	
	$contrasenia=md5($contrasenia);
	
	$insert = "INSERT INTO usuarios(usuario, contrasenia, correo";
	
	if($domicilio) $insert .= ",domicilio";
	if($telefono) $insert .= ",telefono";
	if($nombre) $insert .= ",nombre";
	if($apellido) $insert .= ",apellido";
	
	$insert .= ")VALUES('$usuario','$contrasenia','$correo'";
	
	if($domicilio) $insert .= ",'$domicilio'";
	if($telefono) $insert .= ",'$telefono'";
	if($nombre) $insert .= ",'$nombre'";
	if($apellido) $insert .= ",'$apellido'";
	$insert .= ");";
	
	$query = mysqli_query($cnx, $insert);
	var_dump($query);
	var_dump($insert);
	
	if($query!=false)$_SESSION['error.newlogin'] = 'Nueva cuenta correcta!!';
	else $_SESSION['error.newlogin'] = 'Hubo un error';

	
}elseif(isset($_SESSION['login'])){ $_SESSION['error.newlogin']='Cierre sesion primero';
}else{$_SESSION['error.newlogin']='Faltan Datos';}

if(isset($_GET['new']))$_SESSION['new']=true;
if(isset($_GET['close']))$_SESSION['new']=false;

header("Location: $_SERVER[HTTP_REFERER]");
?>