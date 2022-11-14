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

	$sql = "INSERT INTO lista_gamer(usuario, jogo, status, nota, tempo) VALUES ('$usuario', '$jogo', '$status', '$nota', '$tempo')";

	if(mysqli_query($link, $sql)){
		header('Location: ../jogo.php?sucesso=1&jogo='.$jogo.'');
	}else{
		header('Location:../jogo.php?erro=1&jogo='.$jogo.'');
	}

?>