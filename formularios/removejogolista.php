<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$jogo = $_POST['jogo'];
	$status = $_POST['status'];
	$nota = $_POST['nota'];
	$tempo = $_POST['tempo_jogado'];
	$pagina = $_POST['pagina'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "DELETE FROM lista_gamer WHERE usuario = '$usuario' AND jogo = '$jogo'";

	if(mysqli_query($link, $sql)){
		if($pagina == 0){
			header('Location: ../jogo.php?sucesso=3&jogo='.$jogo.'');
		}
		if($pagina == 1){
			header('Location: ../minha_lista.php?sucesso=2&usuario='.$usuario.'');
		}
	}else{
		header('Location:../jogo.php?erro=1&jogo='.$jogo.'');
	}

?>