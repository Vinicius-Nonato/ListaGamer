<?php 

	session_start();

	require_once('../conexao_db.php');

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "SELECT * FROM jogos";
	$busca_lista = mysqli_query($link, $sql);

	if($busca_lista){
		while ($dados_lista = mysqli_fetch_array($busca_lista, MYSQLI_ASSOC)) {
			$url = $dados_lista["url"];

			$inscritos = 0;
			$nota = 0;
			$sql_inscritos = $sql = "SELECT * FROM lista_gamer WHERE jogo = '$url'";
			$busca_inscritos = mysqli_query($link, $sql_inscritos);
			if($busca_inscritos){
				while ($dados_inscritos = mysqli_fetch_array($busca_inscritos, MYSQLI_ASSOC)) {
					$inscritos ++;
					$nota = $nota + $dados_inscritos["nota"];
					$sql_final = "UPDATE dados_jogo SET nota = '$nota', inscritos = '$inscritos' WHERE url = '$url'";
					mysqli_query($link, $sql_final);
				}
			}
		}
	}

	header('Location: ../atualiza_dados.php?sucesso=1');

?>