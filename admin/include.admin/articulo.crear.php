<?php
include_once ('../../config/conexion.php');
if($_SESSION['nivel']!='1' && !isset($_SESSION['login'])) header("Location: $_SERVER[HTTP_REFERER]");

$tituloArticuloNuevo = isset($_POST['tituloArticuloNuevo'])?mysqli_real_escape_string($cnx,$_POST['tituloArticuloNuevo']):false;
$articuloNuevo = isset($_POST['articuloNuevo'])?mysqli_real_escape_string($cnx,$_POST['articuloNuevo']):false;
$imagenArticulo = $_POST['imagenArticulo'];
$tags = isset($_POST['tags'])?mysqli_real_escape_string($cnx,$_POST['tags']):false;
$status = $_POST['status'];
$seccion = $_POST['seccion'];

$_SESSION['error.CreateArticulo']=null;

!$tituloArticuloNuevo ? $_SESSION['error.CreateArticulo'] .= true : $_SESSION['error.CreateArticulo'].=false;
!$articuloNuevo  ? $_SESSION['error.CreateArticulo'] .= true : $_SESSION['error.CreateArticulo'].=false;


if( $_SESSION['error.CreateArticulo'] == false){
	if($status!=1)$status='2'; else $status='1';
	if($imagenArticulo==0)$imagenArticulo = 'NULL';
	else $imagenArticulo = "'".$imagenArticulo."'";
	
	$insert = "INSERT INTO articulos(titulo,fecha_publicacion,articulo,tags,id_estado,id_imagen,id_seccion)";
	$insert .= "VALUES ('$tituloArticuloNuevo',NOW(),'$articuloNuevo','$tags','$status',$imagenArticulo ,'$seccion');";
	
	$query = mysqli_query($cnx,$insert);
	if($query!=false) $_SESSION['error.CreateArticulo'] = 'Articulo Creado con exito';
	else $_SESSION['error.CreateArticulo'] = 'Error en la carga de datos';
	
}else $_SESSION['error.CreateArticulo'] = 'Error, faltan datos';

header("Location: $_SERVER[HTTP_REFERER]");
?>