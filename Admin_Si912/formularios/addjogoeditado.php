<?php 

	session_start();

	require_once('../conexao_db.php');

	$nome = $_POST['nome-jogo'];
	$status = $_POST['status-jogo'];
	$url = $_POST['url'];
	$descricao = $_POST['descricao'];
	$produtora = $_POST['produtora'];
	$distribuidora = $_POST['distribuidora'];
	$tempo = $_POST['tempo_jogo'];
	$data = $_POST['data-lancamento'];
	$genero_array = $_POST['genero'];
	$plataforma_array = $_POST['plataformas'];
	$linguagem = $_POST['linguagem'];
	$jogo_ant = $_POST['jogo_ant'];
	$jogo_pos = $_POST['jogo_pos'];
	$genero = $_POST['genero'];
	$plataforma = $_POST['plataforma'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE jogos SET nome = '$nome', status = '$status', url = '$url', descricao = 'descricao', produtora = '$produtora', distribuidora = '$distribuidora', tempo_jogo = '$tempo_jogo', data_lancamento = '$data', genero = '$genero', plataforma = '$plataforma', linguagem = '$linguagem', jogo_ant = '$jogo_ant', jogo_pos = '$jogo_pos' WHERE url = '$url'";

	if(mysqli_query($link, $sql)){
		header('Location: ../editar_jogo.php?jogo='. $url .'&sucesso=1');
	}else{
		header('Location: ../editar_jogo.php?jogo='. $url .'error=2');
	}

?>