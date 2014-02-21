<?php
include ('../config/conexion.php');

if(isset($_GET['tema'])) {
	if(isset($_SESSION['login'])){
		
		$tema=mysqli_real_escape_string($cnx,$_GET['tema']);
		
		$select = "SELECT votos,id FROM musica WHERE id='$tema' ;";
		$query = mysqli_query($cnx, $select);
		$queryRTA = mysqli_fetch_assoc($query);

		if($queryRTA!=false){
			$voto = $queryRTA['votos']+1;
			$update = "UPDATE musica SET votos=$voto WHERE id='$tema';";
			$query = mysqli_query($cnx, $update);
			if($query){$_SESSION['error.vot']=false;}
		}
		
	}else{ $_SESSION['error.vot']=true; }
}
if(isset($_GET['close']))$_SESSION['error.vot']=false;
header("Location: $_SERVER[HTTP_REFERER]");
?>