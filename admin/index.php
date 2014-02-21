<?php
include_once('../include/funciones.php');
include_once ('../config/conexion.php');
$ruta_imagenes = '../img/articulos/';

if($_SESSION['nivel']=='1' && isset($_SESSION['login'])){
	include ("include.admin/principal.php");
}else {header("Location: ../index.php");}
?>