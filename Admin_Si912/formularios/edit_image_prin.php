<?php 

	session_start();

	require_once('../conexao_db.php');

	$url = $_POST['url'];
	$tipo_img = $_POST['tipo-img'];
	$imagem = $_FILES['img'];


	$objDb = new db();
	$link = $objDb->mysql_connection();

	echo $tipo_img;

	if($tipo_img == 1){

		echo "teste";

		if(isset($_FILES['img'])){
			$foto_jogo = $_FILES['img'];
			$local = '../../fotos/jogos/';
			$nomefoto = $imagem['name'];
			$novonomefoto = $url;
			$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

			if ($extensao != "jpg" && $extensao != "png") {
				$nomefotoextensao = NULL;
			}else{

				$envia = move_uploaded_file($foto_jogo["tmp_name"], $local . $novonomefoto . "." . $extensao);

				$nomefotoextensao = $novonomefoto . "." . $extensao;
			}
		}

		$sql = "UPDATE jogos SET imagem_jogo = '$nomefotoextensao' WHERE url = '$url'";	

	}


	if($tipo_img == 2){

		if(isset($_FILES['img'])){
			$foto_perfil = $_FILES['img'];
			$local = '../../fotos/jogos/';
			$nomefoto = $imagem['name'];
			$novonomefoto = $url . "_1";
			$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

			if ($extensao != "jpg" && $extensao != "png") {
				$nomefotoextensao1 = NULL;
			}else{

				$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

				$nomefotoextensao1 = $novonomefoto . "." . $extensao;
			}
		}

		$sql = "UPDATE jogos SET imagem_1 = '$nomefotoextensao1' WHERE url = '$url'";	

	}

	if($tipo_img == 3){

		if(isset($_FILES['img'])){
			$foto_perfil = $_FILES['img'];
			$local = '../../fotos/jogos/';
			$nomefoto = $imagem['name'];
			$novonomefoto = $url . "_2";
			$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

			if ($extensao != "jpg" && $extensao != "png") {
				$nomefotoextensao2 = NULL;
			}else{

				$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

				$nomefotoextensao2 = $novonomefoto . "." . $extensao;
			}
		}

		$sql = "UPDATE jogos SET imagem_2 = '$nomefotoextensao2' WHERE url = '$url'";	

	}

	if($tipo_img == 4){

		if(isset($_FILES['img'])){
			$foto_perfil = $_FILES['img'];
			$local = '../../fotos/jogos/';
			$nomefoto = $imagem['name'];
			$novonomefoto = $url . "_3";
			$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

			if ($extensao != "jpg" && $extensao != "png") {
				$nomefotoextensao3 = NULL;
			}else{

				$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

				$nomefotoextensao3 = $novonomefoto . "." . $extensao;
			}
		}

		$sql = "UPDATE jogos SET imagem_3 = '$nomefotoextensao3' WHERE url = '$url'";	

	}

	if($tipo_img == 5){

		if(isset($_FILES['img'])){
			$foto_perfil = $_FILES['img'];
			$local = '../../fotos/jogos/';
			$nomefoto = $imagem['name'];
			$novonomefoto = $url . "_4";
			$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

			if ($extensao != "jpg" && $extensao != "png") {
				$nomefotoextensao4 = NULL;
			}else{

				$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);

				$nomefotoextensao4 = $novonomefoto . "." . $extensao;
			}
		}

		$sql = "UPDATE jogos SET imagem_4 = '$nomefotoextensao4' WHERE url = '$url'";	

	}



	if(mysqli_query($link, $sql)){
		header('Location: ../editar_jogo.php?jogo='. $url .'&sucesso=2');
	}else{
		header('Location: ../editar_jogo.php?jogo='. $url .'error=2');
	}

?>