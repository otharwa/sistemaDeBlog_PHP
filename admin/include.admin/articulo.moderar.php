<?php
include_once ('../../config/conexion.php');
if($_SESSION['nivel']!='1' && !isset($_SESSION['login'])) header("Location: $_SERVER[HTTP_REFERER]");

$statusAprobar = isset($_POST['statusAprobar'])? $_POST['statusAprobar']:false;
$statusBorrar = isset($_POST['statusBorrar'])? $_POST['statusBorrar']:false;

$_SESSION['error.ModerarArticulo']=null;

if( $statusAprobar != false){
	
	$aprobar = "UPDATE articulos SET id_estado=1 WHERE id='$statusAprobar[0]' ";
	foreach($statusAprobar as $clave => $id_articulo1){
		if($clave > 0){
			$aprobar .= "OR id='$id_articulo1'";
		}
	}
	$aprobar .= ";"; 
	
	$query = mysqli_query($cnx,$aprobar);
	if($query!=false) $_SESSION['error.ModerarArticulo'] = 'Articulo Aprobado con exito';
	else $_SESSION['error.ModerarArticulo'] = 'Error en la aprobacion de datos';
	
}
if($statusBorrar != false){
	
	$borrar = "UPDATE articulos SET id_estado=3 WHERE id='$statusBorrar[0]' ";
	foreach($statusBorrar as $clave => $id_articulo2){
		if($clave > 0){
			$borrar .= "OR id='$id_articulo2'";
		}
	}
	$borrar .= ";"; 
	
	$query = mysqli_query($cnx,$borrar);
	if($query!=false) $_SESSION['error.ModerarArticulo'] = 'Articulo Borrado con exito';
	else $_SESSION['error.ModerarArticulo'] = 'Error en el borrado de datos';
	
}

header("Location: $_SERVER[HTTP_REFERER]");
?>