<?php
include_once ('config/conexion.php');
include_once ('config/array.php');


function menu_secciones(){
	global $cnx;
	
	$q = "SELECT id,seccion FROM secciones;";
	$query= mysqli_query($cnx,$q);
	
	while($queryRTA=mysqli_fetch_assoc($query)){

		echo '<li><a href="noticias.php?secc='.$queryRTA['id'].'">'.$queryRTA['seccion'].'</a></li>';
	}
}

function articulo(){
	//global $articulos;
	//global $imagenes;
	global $ruta_imagenes;
	//global $secciones;
	global $cnx;
	
	
	$single = !empty($_GET['id']) ? true : false;
	$seccion = !empty($_GET['secc']) ? $_GET['secc'] : 0;
	$seccion = $secciones[$seccion];

	$reseniaStrong = 1;
	$resenia = 3;
	$condition = (!empty($_GET['id'])) ? " AND articulos.id = '$_GET[id]' " : " ";
	$condition .= (!empty($_GET['secc']) && $_GET['secc'] !== '1' ) ? " AND secciones.id = '$_GET[secc]' " : " ";

	$select = "SELECT 
		articulos.id, 
		articulos.titulo, 
		CONCAT(SUBSTRING_INDEX(articulos.articulo,'.', $reseniaStrong ),' [...]') AS 'reseniaStrong',
		CONCAT(SUBSTRING_INDEX(articulos.articulo,'.', $resenia ),' [...]') AS 'resenia',	
		articulos.fecha_publicacion, 
		articulos.tags, 
		articulos.id_seccion, 
		articulos.id_imagen, 
		articulos.id_estado,
		imagenes.archivo AS src, 
		imagenes.titulo AS alt, 
		secciones.seccion, 
		secciones.id, 
		imagenes.id
	FROM articulos 
		JOIN imagenes ON articulos.id_imagen=imagenes.id 
		JOIN secciones ON articulos.id_seccion = secciones.id 
	WHERE articulos.id_estado = 1 $condition
	ORDER BY articulos.fecha_publicacion ASC ;";	

	$query = mysqli_query($cnx,$select);
	while( $articulo = mysqli_fetch_assoc($query) ){

	//Tener quidado con la inyeccion SQL
		
			echo '<div><div>';
			echo '<h2><a href="noticias.php?id='.$articulo['id'].'">'.$articulo['titulo'].'</a></h2>';
			echo '<p><small>'.$articulo['fecha_publicacion'].'</small></p>';
			echo '<hr />';
			echo '<p><strong>'.$articulo['resenia_up'].'</strong></p>';
			echo '<p class="imagen"><img src="'.$ruta_imagenes.$articulo['src'].'" alt="'.$articulo['alt'].'" /></p>';
			
			if(!empty($single)){echo $articulo['contenido']; }else{echo $articulo['resenia_down'];}
			
			echo '<hr />';
			echo '<p><small>Tags: '.$articulo['tags'].' | Seccion: '.$articulo['seccion'].'</small></p>';
			echo '</div></div>';

	}
}

function ultimas_noticias ($cantidad=5){
	global $cnx;
	
	$q="SELECT id,titulo,id_estado,fecha_publicacion FROM articulos WHERE id_estado=1 ORDER BY fecha_publicacion ASC LIMIT $cantidad ;";
	$query= mysqli_query($cnx,$q);
	while($queryRTA=mysqli_fetch_assoc($query)){
		echo '<li><a href="noticias.php?id='.$queryRTA['id'].'">'.$queryRTA['titulo'].'</a><hr /></li>';
	}
}

function ultimo_articulo($reseniaStrong = 1, $resenia = 3){
	global $cnx;
	global $ruta_imagenes;
	
	$select = "SELECT 
	articulos.id, 
	articulos.titulo, 
	CONCAT(SUBSTRING_INDEX(articulos.articulo,'.',$reseniaStrong ),' [...]') AS reseniaStrong,
	CONCAT(SUBSTRING_INDEX(articulos.articulo,'.',$resenia ),' [...]') AS resenia,	
	articulos.fecha_publicacion, 
	articulos.tags, 
	articulos.id_seccion, 
	articulos.id_imagen, 
	articulos.id_estado,
	imagenes.archivo AS src, 
	imagenes.titulo AS alt, 
	secciones.seccion, 
	secciones.id, 
	imagenes.id
FROM articulos 
	JOIN imagenes ON articulos.id_imagen=imagenes.id 
	JOIN secciones ON articulos.id_seccion = secciones.id 
WHERE articulos.id_estado = 1
ORDER BY articulos.fecha_publicacion ASC LIMIT 1
";
	
	
	$query= mysqli_query($cnx,$select);
	$queryRTA=mysqli_fetch_assoc($query);

	echo '<div><div>';
	echo '<h2><a href="noticias.php?id='.$queryRTA['id'].'">'.$queryRTA['titulo'].'</a></h2>';
	echo '<p><small>'.$queryRTA['fecha_publicacion'].'</small></p>';
	echo '<hr />';
	echo '<p><strong>'.nl2br($queryRTA['reseniaStrong']).'</strong></p>';
	echo '<p class="imagen"><img src="'.$ruta_imagenes.$queryRTA['src'].'" alt="'.$queryRTA['alt'].'" /></p>';
	echo nl2br($queryRTA['resenia']);
	echo '<hr />';
	echo '<p><small>Tags: '.$queryRTA['tags'].' | Seccion: '.$queryRTA['seccion'].'</small></p>';
	echo '</div></div>';
}

function votacion(){
	global $cnx;
	$q="SELECT id,nombre,artista,votos FROM musica ORDER BY votos DESC;";
	
	$query= mysqli_query($cnx,$q);
	while($queryRTA=mysqli_fetch_assoc($query)){
		echo '<li class="clearfix"><p>'.$queryRTA['votos'].'</p><div><h2>'.$queryRTA['nombre'].'</h2><h3>'.$queryRTA['artista'].'</h3></div><a href="include/votacion.php?tema='.$queryRTA['id'].'" >Votar</a></li>';
	}
	if( $_SESSION['error.vot']==true){
		echo '<li id="error_vot"><div><p>No esta registrado</p><a class="lnkLogin" href="include/votacion.php?close">cerrar</a></div></li>';
	}
	
	
}

function galeria_imagenes(){
	// ESTA MAL REVISAR COMPLETO 
	
	global $cnx;
	global $ruta_imagenes;
	/*
	$select = " 
SELECT 
	articulos.id, 
	articulos.titulo, 
	CONCAT(SUBSTRING_INDEX(articulos.articulo,'.',1 ),' [...]') AS reseniaStrong,
	articulos.id_imagen, 
	articulos.id_estado,
	imagenes.archivo AS src, 
	imagenes.titulo AS alt, 
	imagenes.id
FROM articulos 
	JOIN imagenes ON articulos.id_imagen=imagenes.id 
WHERE articulos.id_estado = 1
ORDER BY articulos.fecha_publicacion ASC
";
	
	
	$query= mysqli_query($cnx,$select);
	while($queryRTA=mysqli_fetch_assoc($query)){
	
	
	foreach($imagenes as $id => $valor){
		echo '<div><img src="'.$ruta_imagenes.$queryRTA['src'].'" alt="'.$queryRTA['alt'].'" /></div>';
	}*/
}

function slider($cantidad=5){
	
	global $cnx;
	global $ruta_imagenes;
	
	//si lo hago con ajax... mandar datos por POST
	//si no... hacer una lista <li> con todas las imagenes a mostrar y usar DOM
	//Buscar la funcion de JS Querry que hace el slider	//**************
	//EVITAR PASAR DATOS POR GET
	//**************
	
	$id=!empty($_GET['img'])?$_GET['img'] : 1;
	$atras = 0; //$id==='0' ? $cantidad :  $id-1;
	$adelante = 2; //$id>($cantidad-1) ? 0 : $id+1;
	
	$pocision = "SELECT id, id_estado, fecha_publicacion FROM articulos WHERE id_estado = 1 AND id = $id ORDER BY fecha_publicacion ASC;";
	$query= mysqli_query($cnx,$pocision);
	$queryRTA=mysqli_fetch_assoc($query);

	$id = $queryRTA['id'];
	$mostrar = "SELECT 
	articulos.id, 
	articulos.titulo, 
	CONCAT(SUBSTRING_INDEX(articulos.articulo,'.',1 ),' [...]') AS reseniaStrong,
	articulos.id_imagen, 
	articulos.id_estado,
	imagenes.archivo AS src, 
	imagenes.titulo AS alt, 
	imagenes.id
FROM articulos 
	JOIN imagenes ON articulos.id_imagen=imagenes.id 
WHERE articulos.id_estado = '1' AND articulos.id = ' $id '; ";

//ORDER BY articulos.fecha_publicacion ASC LIMIT $pocision , $cantidad	

	$query= mysqli_query($cnx,$mostrar);
	$queryRTA=mysqli_fetch_assoc($query);

	echo '<div><a href="index.php?img='.$atras.'"><img src="img/atras.png" alt="atras"/></a></div>';
	echo '<ul>';
	echo '	<li><img src="'.$ruta_imagenes.$queryRTA['src'].'" alt="'.$queryRTA['alt'].'" />';
	echo '	<div><h1><a href="noticias.php?id='.$queryRTA['id'].'">'.$queryRTA['titulo'].'</a></h1><h2>'.$queryRTA['reseniaStrong'].'</h2></div></li>';				
	echo '</ul>';
	echo '<div><a href="index.php?img='.$adelante.'"><img src="img/siguiente.png" alt="siguiente" /></a></div>';
}
/******************************************************************************/

function form_contacto() {
	
	if(!empty($_POST['nombre'])){$n = $_POST['nombre'];}
	if(!empty($_POST['apellido'])){$a = $_POST['apellido'];}
	if(!empty($_POST['correo'])){$correo = $_POST['correo'];}
	if(!empty($_POST['mensaje'])){$m = $_POST['mensaje'];}
	
	if(!empty($_POST['sistema'])){$sistema = implode(', ',$_POST['sistema']);}
	if(!empty($_POST['como_llego'])){$cmllg = $_POST['como_llego'];}
	
	if(!empty($_POST['status'])){$status = $_POST['status'];}
	
	if($n!=null && $a!=null && $correo!=null) {
					include_once($carpeta.'enviar.php');
		}
}
?>