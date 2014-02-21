<?php 
ini_set('display_errors', 0 );
$cnx = mysqli_connect('localhost','xx','xx','sistemaBlogPHP');
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