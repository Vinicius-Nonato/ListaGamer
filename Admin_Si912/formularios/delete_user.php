<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "DELETE FROM usuarios WHERE usuario = '$usuario';";

	if(mysqli_query($link, $sql)){
		header('Location: ../useradmin.php');
	}else{
		header('Location: ../useradmin.php');
	}

?>