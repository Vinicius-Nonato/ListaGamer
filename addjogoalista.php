<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$jogo = $_POST['jogo'];
	$status = $_POST['status'];
	$nota = $_POST['nota'];
	$tempo = $_POST['tempo_jogado'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	echo $usuario;
	echo "</br>";
	echo $status;
	echo "</br>";
	echo $jogo;
	echo "</br>";
	echo $nota;
	echo "</br>";
	echo $tempo;

	/*$sql = "INSERT INTO relacionamentos(amigo1, amigo2, status) VALUES ('$manda', '$recebe', 'P')";

	if(mysqli_query($link, $sql)){
		header('Location: ../my_account.php?&usuario='.$recebe.'');
	}else{
		header('Location:../my_account.php?mensagem=2&usuario='.$recebe.'');
	}*/

?>