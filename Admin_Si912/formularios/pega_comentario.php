<?php 
	
	session_start();

	require_once('../conexao_db.php');


	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "SELECT * FROM comentarios_perfil ORDER BY data_comentario DESC";

	echo $sql;

	//mysqli_query($link, $sql);

?>