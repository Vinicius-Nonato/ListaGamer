<?php 

	session_start();

	require_once('../conexao_db.php');

	$manda = $_POST['manda'];
	$recebe = $_POST['recebe'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "INSERT INTO relacionamentos(amigo1, amigo2, status) VALUES ('$manda', '$recebe', 'P')";

	if(mysqli_query($link, $sql)){
		header('Location: ../my_account.php?&usuario='.$recebe.'');
	}else{
		header('Location:../my_account.php?mensagem=2&usuario='.$recebe.'');
	}

?>