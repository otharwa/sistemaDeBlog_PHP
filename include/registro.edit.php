<?php
include ('../config/conexion.php');

$usuario=isset($_POST['usuario']) ? mysqli_real_escape_string($cnx,$_POST['usuario']) : false;
$contrasenia=isset($_POST['contrasenia']) ? $_POST['contrasenia']  : false;
$contrasenia_rpt=isset($_POST['contrasenia_rpt']) ? $_POST['contrasenia_rpt']  : false;
$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($cnx,$_POST['nombre']) : false;
$apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($cnx,$_POST['apellido']) : false;
$correo=isset($_POST['correo']) ? mysqli_real_escape_string($cnx,$_POST['correo']) : false;
$domicilio=isset($_POST['domicilio']) ? mysqli_real_escape_string($cnx,$_POST['domicilio']) : false;
$telefono=isset($_POST['telefono']) ? mysqli_real_escape_string($cnx,$_POST['telefono']) : false;


if(isset($_SESSION['login'])){
		
		$update = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo='$correo',domicilio='$domicilio',telefono='$telefono'";
		if ($contrasenia!=false && ($contrasenia==$contrasenia_rpt)){$contrasenia = md5($contrasenia); $update .= ",contrasenia = '$contrasenia'";}
		$update .= "WHERE usuario = '$_SESSION[login]' ;";
		
		$q = mysqli_query($cnx, $update);
		
		if($q!=false)$_SESSION['error.editlogin']='Actualizacion Exitosa';
		else $_SESSION['error.editlogin']='Hubo errores';
}


if(isset($_GET['editar']))$_SESSION['editar']=true;
if(isset($_GET['close']))$_SESSION['editar']=false;

header("Location: $_SERVER[HTTP_REFERER]");
?>