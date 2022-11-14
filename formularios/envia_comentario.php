<?php 
	
	session_start();

	require_once('../conexao_db.php');

	if(!isset($_SESSION['usuario'])){
		echo "é necessário estar logado para realizar esta ação";
		die();
	}else{
		$usuario = $_SESSION['usuario'];
	}

	$comentario = $_POST['comentario'];
	$perfil = $_POST['perfil'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "INSERT INTO comentarios_perfil(usuario, perfil, comentario)VALUES('$usuario', '$perfil', '$comentario')";

	mysqli_query($link, $sql);

?>