<?php 
error_reporting(0);
//ini_set('display_errors', 2 );
$cnx = mysqli_connect('localhost','root','Gandalf3791','sistemaBlogPHP');
//$mysqli = new mysqli("localhost", "root", "Gandalf3791", "sistemaBlogPHP");
session_start();


$carpeta = 'includes/';
$ruta_imagenes = 'img/articulos/';

$tabla_usuarios = 'usuarios';
$tabla_niveles = 'niveles';
$tabla_secciones = 'secciones';
$tabla_estados = 'estados'; //status
$tabla_articulos = 'articulos';
$tabla_categorias = 'categorias';
$tabla_imagenes = 'imagenes';
$tabla_musica = 'musica';
?>