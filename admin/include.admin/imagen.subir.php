<?php
include_once ('../../config/conexion.php');
if($_SESSION['nivel']!='1' && !isset($_SESSION['login'])) header("Location: $_SERVER[HTTP_REFERER]");
	
$tituloImagen = isset($_POST['tituloImagen'])?mysqli_real_escape_string($cnx,$_POST['tituloImagen']):false;
$descripcion = isset($_POST['descripcionImagen'])?mysqli_real_escape_string($cnx,$_POST['descripcionImagen']):false;
$archivoRecivido = isset($_FILES['imagen'])?$_FILES['imagen']['tmp_name']:false;
$nombreArchivo = $archivoRecivido ? md5($_FILES['imagen']['name']) : false;

$_SESSION['error.loadImage']=null;

!$tituloImagen ? $_SESSION['error.loadImage'] .= true : $_SESSION['error.loadImage'].=false;
!$descripcion  ? $_SESSION['error.loadImage'] .= true : $_SESSION['error.loadImage'].=false;
!$archivoRecivido ? $_SESSION['error.loadImage'] .= true : $_SESSION['error.loadImage'].=false;

if( $_SESSION['error.loadImage'] == false){

	$original=imagecreatefromjpeg($archivoRecivido);
	$ancho_o = imagesx( $original ); 
	$alto_o =  imagesy( $original );
	
	$alto = 250;
	$ancho = round( $alto * $ancho_o / $alto_o ) ;
	$copia=imagecreatetruecolor($ancho,$alto);
	imagecopyresampled($copia, $original, 0,0 ,0,0, $ancho,$alto,  $ancho_o, $alto_o );
	
	$crearImagen = imagejpeg($copia,'../../img/articulos/'.$nombreArchivo.'.jpg', 100);
		
	if($crearImagen){
		$nombreArchivo = $nombreArchivo.'.jpg';
		$insert = "INSERT INTO imagenes(archivo,titulo,descripcion)";
		$insert .= "VALUES ('$nombreArchivo','$tituloImagen','$descripcion');";
		
		$query = mysqli_query($cnx,$insert);	
			
		$_SESSION['error.loadImage'] = 'Archivo subido con exito';
	}else $_SESSION['error.loadImage'] = 'Fallo la creacion del archivo';
	
	imagedestroy( $original );
	imagedestroy( $copia );
	
}else $_SESSION['error.loadImage'] = 'Error, faltan datos';

header("Location: $_SERVER[HTTP_REFERER]");
?>