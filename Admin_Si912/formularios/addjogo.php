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
	$genero = "";
	$plataforma = "";
	$imagem_prin = $_FILES['img-prin'];
	$imagem_cat1 = $_FILES['img-cat1'];
	$imagem_cat2 = $_FILES['img-cat2'];
	$imagem_cat3 = $_FILES['img-cat3'];
	$imagem_cat4 = $_FILES['img-cat4'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$url_existe = "SELECT * FROM jogos WHERE url = '$url'";
	if(mysqli_query($link, $url_existe)){
		$resultado_busca_url = mysqli_query($link, $url_existe);
		$resultado_existe = mysqli_fetch_array($resultado_busca_url);
		if (isset($resultado_existe['url'])) {
			header('Location: ../adicionarjogo.php?error=1');
			die();
		}
	}

	$tamanhogenerico = 0;

	if(!empty($_POST['genero'])) {
	    foreach($_POST['genero'] as $check) {
	    	$tamanhogenerico++;
	    	$tamanhogenero = sizeof($_POST['genero']);
			if ($tamanhogenerico != $tamanhogenero) {
				$genero .= $check . ", ";	         
			}else{
				$genero .= $check;
			}
	    }
	}
	
	$tamanhogenerico = 0;
	
	if(!empty($_POST['plataformas'])) {
	    foreach($_POST['plataformas'] as $check) {
	    	$tamanhogenerico++;
	    	$tamanhogenero = sizeof($_POST['plataformas']);
			if ($tamanhogenerico != $tamanhogenero) {
				$plataforma .= $check . ", ";	         
			}else{
				$plataforma .= $check;
			}
	    }
	}


	if(isset($_FILES['img-prin'])){
		$foto_perfil = $_FILES['img-prin'];
		$local = '../../fotos/jogos/';
		$nomefoto = $imagem_prin['name'];
		$novonomefoto = $url;
		$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != "png") {
			$nomefotoextensao = NULL;
		}else{

			$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

			$nomefotoextensao = $novonomefoto . "." . $extensao;
		}
	}

	if(isset($_FILES['img-cat1'])){
		$foto_perfil = $_FILES['img-cat1'];
		$local = '../../fotos/jogos/';
		$nomefoto = $imagem_cat1['name'];
		$novonomefoto = $url . "_1";
		$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != "png") {
			$nomefotoextensao1 = NULL;
		}else{

			$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

			$nomefotoextensao1 = $novonomefoto . "." . $extensao;
		}
	}

	if(isset($_FILES['img-cat2'])){
		$foto_perfil = $_FILES['img-cat2'];
		$local = '../../fotos/jogos/';
		$nomefoto = $imagem_cat2['name'];
		$novonomefoto = $url . "_2";
		$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != "png") {
			$nomefotoextensao2 = NULL;
		}else{

			$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

			$nomefotoextensao2 = $novonomefoto . "." . $extensao;
		}
	}else{
		$nomefotoextensao2 = NULL;
	}

	if(isset($_FILES['img-cat3'])){
		$foto_perfil = $_FILES['img-cat3'];
		$local = '../../fotos/jogos/';
		$nomefoto = $imagem_cat3['name'];
		$novonomefoto = $url . "_3";
		$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != "png") {
			$nomefotoextensao3 = NULL;
		}else{
			$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

			$nomefotoextensao3 = $novonomefoto . "." . $extensao;
		}

	}

	if(isset($_FILES['img-cat4'])){
		$foto_perfil = $_FILES['img-cat4'];
		$local = '../../fotos/jogos/';
		$nomefoto = $imagem_cat4['name'];
		$novonomefoto = $url . "_4";
		$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != "png") {
			$nomefotoextensao4 = NULL;
		}else{

			$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

			$nomefotoextensao4 = $novonomefoto . "." . $extensao;
		}
	}


	$sql = "INSERT INTO jogos(nome, status, url, descricao, imagem_jogo, produtora, distribuidora, tempo_jogo, data_lancamento, genero, plataforma, linguagem, jogo_ant, jogo_pos, imagem_1, imagem_2, imagem_3, imagem_4) VALUES ('$nome', '$status', '$url', '$descricao', '$nomefotoextensao', '$produtora', '$distribuidora', '$tempo', '$data', '$genero', '$plataforma', '$linguagem', '$jogo_ant', '$jogo_pos', '$nomefotoextensao1', '$nomefotoextensao2', '$nomefotoextensao3', '$nomefotoextensao4')";

	if(mysqli_query($link, $sql)){
		header('Location: ../adicionarjogo.php?sucesso=1');
	}else{
		header('Location: ../adicionarjogo.php?error=2');
	}

?>