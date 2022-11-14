<?php  

	session_start();

	$usuario_get = isset($_GET['usuario']) ? $_GET['usuario'] : 0;
	$usuario_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 0;

	$error = isset($_GET['error']) ? $_GET['error'] : 0;
	$success = isset($_GET['success']) ? $_GET['success'] : 0;

	if ($usuario_session == $usuario_get) {

	require_once('conexao_db.php');

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario_session'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_usuario = mysqli_fetch_array($busca_bd);
		if ($dados_usuario['usuario'] == NULL) {
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
		
	<style type="text/css">
		.pedidos .amigos_pendentes{
			border: 1px solid #363636;
		}
		.pedidos .amigos_pendentes img{
			width: 100px;
		}

		.pedidos .amigos_pendentes span{
			margin-right: 50px;
		}

		.pedidos .amigos_pendentes form{
			padding: 25px 50px;
			text-align: right;
			display: inline-block;
		}
		.amigos_pendentes .btn-aceita{
			margin-bottom: 10px;
			background-color: #008000;
			border: 2px solid #008000;
			color: #FFF;
		}
		.amigos_pendentes .btn-recusa{
			margin-bottom: 10px;
			background-color: #B22222;
			border: 2px solid #B22222;
			color: #FFF;
		}
	</style>
</head>
<body class="homepage ">
	<?php require 'html/header.php'; ?>
	<section class="main main-pendentes">
		<div class="container meus_pedidos">
			<h2>Meus Amigos</h2>
			<div class="pedidos">
				<ul style="list-style: none;">
					<?php 
						$usuario_da_pagina = $dados_usuario['usuario'];

						$sql_amigos = "SELECT * FROM relacionamentos WHERE amigo1 = '$usuario_da_pagina' AND status = 'A'";	

						$busca_bd_amigos = mysqli_query($link, $sql_amigos);
						$numero_vezes = 0;
						
						if($busca_bd_amigos){
							while($dados_amigos = mysqli_fetch_array($busca_bd_amigos)){
								$nome_usuario = $dados_amigos['amigo2'];
								$sql_fotos_amigos = "SELECT * FROM usuarios WHERE usuario = '$nome_usuario' ORDER BY id DESC";
								$busca_bd_fotos_usuario = mysqli_query($link, $sql_fotos_amigos);
								if($busca_bd_fotos_usuario){
									$dados_fotos_usuario = mysqli_fetch_array($busca_bd_fotos_usuario);
									$picture = "";
									$picture_way = "";
									if($dados_fotos_usuario['foto_perfil'] != ''){
										$picture = $dados_fotos_usuario['foto_perfil'];
										$picture_way = "/perfis/". $picture ."";
									}else{
										$picture_way = "default/perfil.jpg";
									}
									echo "<li class='amigos_pendentes'>";
									echo "<img src='fotos/". $picture_way ."'>";
									echo "<span>". $dados_fotos_usuario['usuario'] ."</span>";
									echo "<form method='post' action='formularios/nega_amigo.php' style='float: right;'>";
									echo "<input style='display: none;' type='text' name='manda' value='" . $usuario_da_pagina . "'>";
									echo "<input style='display: none;' type='text' name='recebe' value='" . $dados_fotos_usuario['usuario'] . "'>";
									echo "<a href='minha_lista.php'><button class='btn-lista add-amigo btn-recusa'>Desfazer Amizade</button></a>";
									echo "</form>";
									echo "</li>";
								}
								$numero_vezes = $numero_vezes +1;
								if ($numero_vezes == 9) {
									break;
								}
							} 
						}

						if ($numero_vezes == 0) {
							echo "<div class='col-md-12'><p>O usuário ainda não tem amigos adicionados</p></div>";
						}

					?>
				</ul>
			</div>
		</div>
	</section>
	<?php require 'html/footer.html'; ?>
	<?php }else{
		header('Location: /');
	} ?>
</body>
</html>