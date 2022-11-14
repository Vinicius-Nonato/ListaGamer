<?php 
	session_start(); 

	//INICIA A BUSCA DE DADOS

	require_once('conexao_db.php');

	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : 0;
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_usuario = mysqli_fetch_array($busca_bd);
		if ($dados_usuario['usuario'] == NULL) {
			header('Location: /');	
		}
	}else{
		header('Location: /');
	}
	//FECHA A BUSCA DE DADOS		

	$usuario_comentario = $dados_usuario['usuario'];

	$logado = isset($_GET['logado']) ? $_GET['logado'] : 0;
	$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.my_account .jogo-info .title h2{
			margin-top: 15px;
			margin-bottom: 15px;
			text-align: left;
		}
		.my_account .jogo-info{
			text-align: left;
		}
		.my_account .jogo-info{
			border-left: 1px solid #363636;
		}
		.my_account .produto-esquerda .imagem-perfil{
			text-align: center;
		}
		.my_account .produto-esquerda .imagem-perfil img{
			width: 100%;
		}
		.my_account .produto-esquerda .perfil-info-geral .title{
			margin-top: 20px;
			margin-bottom: 10px;
		}
		.my_account .produto-esquerda .perfil-info-geral .item{
			padding: 7.5px 5px;
			font-size: 13px;
		}
		.my_account .produto-esquerda .perfil-info-geral .item.impar{
			background-color: #DCDCDC;
		}
		.my_account .produto-esquerda .perfil-info-geral .item .titulo{
			font-weight: bold;
		}

		.my_account .minhas-notas .nota-label{
			display: block;
			width: 100%;
			margin-bottom: 7.5px;
		}
		.my_account .minhas-notas .row div{
			text-align: center;
		}
		.my_account .minhas-notas .row div select{
			padding: 2.5px;
		}
		.my_account .status-lista{
			padding: 20px 10px;
			background-color: #363636;
			color: #FFF;
		}
		.my_account .outras-info{
			text-align: center;
		}
		.my_account .outras-info .title{
			width: 100%;
			display: block;
			margin-bottom: 5px;
		}
		.my_account .dados{
			font-weight: bold;
		}
		.my_account .descricao{
			margin-top: 25px;
			margin-bottom: 25px;
		}
		.my_account .descricao p{
			font-size: 15px;
		}
		.my_account .recomendados{
			margin-top: 50px;
		}
		.my_account .recomendados .title{
			margin-bottom: 25px;
		}
		.my_account .imagens{
			margin-top: 50px;
		}
		.imagens .imagem-principal{
			width: 79%;
			display: inline-block;
			padding: 10px;
			vertical-align: top;
		}
		.imagens .imagem-principal img{
			width: 100%;
		}
		.imagens .imagens-galeria{
			width: 20%;
			display: inline-block;
			padding: 10px;
		}
		.imagens .imagens-galeria .item{
			width: 100%;
			margin-bottom: 10px;
    		text-align: center;
		}
		.imagens .imagens-galeria img{
			width: 98%;
			border-radius: 10px;
			border: 2px solid #363636;
		}
		.perfil-info-geral .amigos img{
			width: 100%;
		}
		.perfil-info-geral .amigos{
			margin-bottom: 20px;
			padding: 0px;
			border: 1px solid #363636;
		}
		.minha-lista .btn-lista{
			background-color: #363636;
			border: 2px solid #363636;
			width: 100%;
			color: #FFF;
			padding: 5px 5px;
		}
		.minha-lista .btn-lista:hover{
			opacity: 0.9;
			transition: 0.5s;
			cursor: pointer;
		}
		.jogos-adicionados .jogo-add img{
			width: 100%;
		}
		.jogos-adicionados .jogo-add{
			margin-bottom: 10px;
			margin-top: 10px;
		}
		.my_account .comentarios textarea{
			width: 100%;
			height: 100px;
		}
		.my_account .btn-comentario{
			float: right;
			background-color: #363636;
			border: 2px solid #363636;
			color: #FFF;
			padding: 5px 5px;
		}
		.my_account .btn-comentario:hover{
			opacity: 0.9;
			transition: 0.5s;
			cursor: pointer;
		}
		.slider-list{
			width: 97%;
			max-width: 100%;
			margin: 0 auto;
		}
		.slider-list .game{
			text-align: center;
		}
		.slider-list .game img{
			width: 150px;
			text-align: center;
		}
		.slider-list button:focus{
			outline: none !important;
		}
		.glider-next{
			right: -27px !important;
		}
		.glider-prev{
			left: -27px !important;
		}
		.slider-slider .glider-next, .slider-slider .glider-prev{
			top: 40% !important;
		}
		.main .comentarios .error-input{
			position: absolute;
			font-size: 14px;
			width: initial !important;
			margin-top: 1px;
			color: #cc0000;
		}
		.mostra-comentarios .comentario-div .usuario{
			margin-right: 10px;
		}
		.main .editar-conta{
			margin-top: 10px;
		}
		.redes-sociais .col-md-3{
			padding-left: 10px !important;
			padding-right: 10px !important;
			margin-bottom: 15px;
		}
		.redes-sociais .col-md-3 img{
			width: 100%;
		}
		.minha-lista .add-amigo{
			margin-bottom: 10px;
		}

		.minha-lista .btn-neutro{
			margin-bottom: 10px;
			background-color: #FFF	;
			border: 2px solid #363636;
			color: #363636;
		}
		
		.minha-lista .btn-aceita{
			margin-bottom: 10px;
			background-color: #008000;
			border: 2px solid #008000;
			color: #FFF;
		}

		.minha-lista .btn-recusa{
			margin-bottom: 10px;
			background-color: #B22222;
			border: 2px solid #B22222;
			color: #FFF;
		}

	</style>
	<script src="./js/glider/glider.min.js"></script>
	<link rel="stylesheet" href="./js/glider/glider.min.css">

	<script type="text/javascript">
		$(document).ready( function(){
			$('#btn-comentario').click( function(){
				if($('#comentario').val().length > 0){
					$.ajax({
						url: 'formularios/envia_comentario.php',
						method: 'post',
						data: { comentario: $('#comentario').val(), perfil: "<?php  print $usuario; ?>"},
						success: function(data) {
							alert(data);
							$('#comentario').val('');
						}
					});

					$('#comentario-required').css({'display': 'none'});
				}else{
					$('#comentario-required').css({'display': 'block'});
				}
			})
			function carregaComentario(){
				var perfil_usuario = '<?php  print $usuario_comentario; ?>';
						$.ajax({
							url: 'formularios/pega_comentario.php',
							method: 'post',
							data: { perfil: perfil_usuario},
							success: function(data){
								$('#mostra-comentarios').html(data);
							}
						});
					}

					carregaComentario();
		});

		document.getElementById('yorInputID').value = "Your Value";

	</script>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main my_account">
		<div class="container">
			<div class="row">
				<div class="col-md-3 produto-esquerda">
					<div class="imagem-perfil">
					<?php
					if ($dados_usuario['foto_perfil'] == NULL) {
						echo "<img style='width: 100%;height: auto;' src='fotos/default/perfil.jpg'>";
					}else{
						$nomefotoatual = $dados_usuario['foto_perfil'];
						echo "<img style='width: 100%;height: auto;' src='fotos/perfis/".$nomefotoatual."'>";
					}
					 ?>
					</div>
					<div class="minha-lista container">
						<div class="row">
							<?php 
								$usuario_sessao = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 0;
								$status_amizade = 0;
								$status_atual = "";
								$nome_remetente = $dados_usuario['usuario'];

								$sql_amizade = "SELECT * FROM relacionamentos WHERE amigo1 = '$usuario_sessao' AND amigo2 = '$nome_remetente'";	

								$busca_bd_amizade = mysqli_query($link, $sql_amizade);
								if($busca_bd_amizade){
									$dados_amizade = mysqli_fetch_array($busca_bd_amizade); 

									if ($dados_amizade) {
										$status_atual = $dados_amizade['status'];
										if ($status_atual == "P") {
											$status_atual = "P1";
										}
									}else{
										$sql_amizade2 = "SELECT * FROM relacionamentos WHERE amigo2 = '$usuario_sessao' AND amigo1 = '$nome_remetente'";

										$busca_bd_amizade2 = mysqli_query($link, $sql_amizade2);

										if($busca_bd_amizade2){
											$dados_amizade2 = mysqli_fetch_array($busca_bd_amizade2);
											if ($dados_amizade2) {
												$status_atual = $dados_amizade2['status'];
												if ($status_atual == "P") {
													$status_atual = "P2";
												}
											}											
										}
									}

									if($status_atual == "P1"){
										$status_amizade = 1;
									}

									if($status_atual == "P2"){
										$status_amizade = 2;
									}

									if($status_atual == "A"){
										$status_amizade = 3;
									}

									if($status_atual == "B"){
										$status_amizade = 4;
									}

								}else{
									header('Location: my_account.php?mensagem=2&usuario='.$dados_usuario['usuario'].'');
								}


							if($usuario_sessao != $dados_usuario['usuario']){ 

								if($usuario_sessao != "0"){

									/* ADICIONAR AMIGO */
									if ($status_amizade == 0) {
							?>

										<div class="col-md-12">
											<form method="post" action="formularios/adiciona_amigo.php">
												<input style="display: none;" type="text" name="manda" value="<?php echo $usuario_sessao; ?>">
												<input style="display: none;" type="text" name="recebe" value="<?php echo $dados_usuario['usuario']; ?>">
												<a href="minha_lista.php"><button class="btn-lista add-amigo">Enviar Pedido de Amizade</button></a>
											</form>
										</div>
							<?php 
									}
									/* PEDIDO PENDENTE SO USUÁRIO */
									if($status_amizade == 1){
							 ?>
							 			<div class="col-md-12">
											<button class="btn-lista add-amigo btn-neutro">Pedido de Amizade Enviado</button>
										</div>
							 <?php 
									}

									if($status_amizade == 2){
							 ?>
							 		<div class="col-md-12">
										<form method="post" action="formularios/aceita_amigo.php">
											<input style="display: none;" type="text" name="manda" value="<?php echo $usuario_sessao; ?>">
											<input style="display: none;" type="text" name="recebe" value="<?php echo $dados_usuario['usuario']; ?>">
											<a href="minha_lista.php"><button class="btn-lista add-amigo btn-aceita">Aceitar Pedido de Amizade</button></a>
										</form>
									</div>

									<div class="col-md-12">
										<form method="post" action="formularios/nega_amigo.php">
											<input style="display: none;" type="text" name="manda" value="<?php echo $usuario_sessao; ?>">
											<input style="display: none;" type="text" name="recebe" value="<?php echo $dados_usuario['usuario']; ?>">
											<a href="minha_lista.php"><button class="btn-lista add-amigo btn-recusa">Recusar Pedido de Amizade</button></a>
										</form>
									</div>
							 <?php 
									}

									if($status_amizade == 3){
							 ?>
							 		<div class="col-md-12">
										<button class="btn-lista add-amigo btn-neutro">Vocês São Amigos</button>
									</div>

									<div class="col-md-12">
										<form method="post" action="formularios/nega_amigo.php">
											<input style="display: none;" type="text" name="manda" value="<?php echo $usuario_sessao; ?>">
											<input style="display: none;" type="text" name="recebe" value="<?php echo $dados_usuario['usuario']; ?>">
											<a href="minha_lista.php"><button class="btn-lista add-amigo btn-recusa">Desfazer Amizade</button></a>
										</form>
									</div>

							 <?php 
									}

									if($status_amizade == 4){
							?>
								<div class="col-md-12">
									<button class="btn-lista add-amigo">Bloqueado</button>
								</div>
							<?php

									}
							 ?>

							<?php }else{ ?>
							<div class="col-md-12">
								<a href="login.php"><button class="btn-lista add-amigo">Adicionar Amigo -</button></a>
							</div>
							<?php 
								}
							}
							 ?>
							<div class="col-md-12">
								<a href="minha_lista.php?usuario=<?php echo $usuario; ?>"><button class="btn-lista">Lista Gamer</button></a>
							</div>
							<?php 
								if($usuario_sessao == $dados_usuario['usuario']){ 
							?>
							<div class="col-md-12">
								<a href="editar_conta.php?usuario=<?php echo $usuario_sessao; ?>"><button class="btn-lista editar-conta">Editar Conta</button></a>
							</div>
							<?php } ?>
							<?php 
								if($usuario_sessao == $dados_usuario['usuario']){ 
							?>
							<div class="col-md-12">
								<a href="meus_amigos.php?usuario=<?php echo $usuario_sessao; ?>"><button class="btn-lista editar-conta">Meus Amigos</button></a>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="perfil-info-geral">
						<div class="item impar"><span class="titulo">Status: </span><span class="resposta"><?php if ($dados_usuario['status'] == NULL){echo "-";}else{echo $dados_usuario['status'];} ?></span></div>
						<div class="item"><span class="titulo">Idade: </span><span class="resposta"><?php if ($dados_usuario['idade'] == NULL){echo "-";}else{echo $dados_usuario['idade'];} ?></span></div>
						<div class="item impar"><span class="titulo">Apelido: </span><span class="resposta"><?php if ($dados_usuario['apelido'] == NULL){echo "-";}else{echo $dados_usuario['apelido'];} ?></span></div>
						<div class="item"><span class="titulo">Generos de Jogos Preferidos: </span><span class="resposta"><?php if ($dados_usuario['generos_favoritos'] == NULL){echo "-";}else{echo $dados_usuario['generos_favoritos'];} ?></span></div>
						<div class="item impar"><span class="titulo">Plataformas Preferidas: </span><span class="resposta"><?php if ($dados_usuario['consoles_favoritos'] == NULL){echo "-";}else{echo $dados_usuario['consoles_favoritos'];} ?></span></div>
						<div class="item"><span class="titulo">País: </span><span class="resposta"><?php if ($dados_usuario['pais'] == NULL){echo "-";}else{echo $dados_usuario['pais'];} ?></span></div>
					</div>
					<div class="perfil-info-geral">
						<div class="title">
							<h5>Amigos</h5>
						</div>
						<div class="container">
							<div class="row">
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
											echo "<div class='col-md-4 amigos'>";
											echo "<img src='fotos/". $picture_way ."'>";
											echo "</div>";
										}
										$numero_vezes = $numero_vezes +1;
										if ($numero_vezes == 9) {
											break;
										}
									} 
								}

								if ($numero_vezes == 0) {
									echo "<div class='col-md-12'><p>O usuário ainda não tem amigos Adicionados</p></div>";
								}

							?>
							</div>
						</div>
					</div>
					<div class="perfil-info-geral redes-sociais">
						<div class="title">
							<h5>Redes Sociais</h5>
						</div>
						<div class="container">
							<div class="row">
								<?php $contas = 0; ?>
								<?php if ($dados_usuario['twitter'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='https://twitter.com/".$dados_usuario['twitter']."' target='_blank'>" ?>
										<img src="fotos/default/twitter.png">
									</a>
								</div>
								<?php } ?>
								<?php if ($dados_usuario['instagram'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='https://www.instagram.com/".$dados_usuario['instagram']."' target='_blank'>" ?>
										<img src="fotos/default/instagram.png">
									</a>
								</div>
								<?php } ?>
								<?php if ($dados_usuario['facebook'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='https://facebook.com/".$dados_usuario['facebook']."' target='_blank'>" ?>
										<img src="fotos/default/facebook.png">
									</a>
								</div>
								<?php } ?>
								<?php if ($dados_usuario['email_rede'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='mailto:".$dados_usuario['email_rede']."' target='_blank'>" ?>
										<img src="fotos/default/email.png">
									</a>
								</div>
								<?php } ?>
								<?php if ($dados_usuario['twitch'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='https://www.twitch.tv/".$dados_usuario['twitch']."' target='_blank'>" ?>
										<img src="fotos/default/twitch.png">
									</a>
								</div>
								<?php } ?>
								<?php if ($dados_usuario['tiktok'] != NULL){ 
									$contas += 1;
								?>
								<div class="col-md-3">
									<?php echo "<a href='https://www.tiktok.com/".$dados_usuario['tiktok']."' target='_blank'>" ?>
										<img src="fotos/default/tik-tok.png">
									</a>
								</div>
								<?php } ?>
								<?php
								if ($contas == 0) {
								?>
								<p>O usuário ainda não compartilhou nenhuma rede social conosco.</p>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 jogo-info">
					<?php
						if ($logado == 1) {
						?>
						<div class="sucess">
							<span>Seja bem vindo <?php echo $_SESSION['nome']; ?> <?php echo $_SESSION['sobrenome']; ?>! Espero que aproveite o site e expanda sua lista gamer!</span>
						</div>
						<?php	
						}
					?>
					<?php
						if ($logado == 2) {
						?>
						<div class="sucess">
							<span>Obrigado por se cadastrar em nosso site <?php echo $_SESSION['nome']; ?>! Agora pode adicionar amigos, interagir em comunidades e começar sua lista!</span>
						</div>
						<?php	
						}
					?>

					<?php
						if ($mensagem == 1) {
						?>
						<div class="sucess">
							<span>O Pedido de amizade foi enviado!</span>
						</div>
						<?php	
						}
					?>


					<?php
						if ($mensagem == 2) {
						?>
						<div class="sucess" style="background-color: red !important;">
							<span>Houve um problema em sua requisição, entre em contato com o responsavel pelo site!</span>
						</div>
						<?php	
						}
					?>

					<div class="title">
						<h3><?php echo $dados_usuario['usuario']; ?></h3>
					</div>
					<div class="text-descricao">
						<?php if($dados_usuario['biografia'] == NULL){ ?>
							<p>O usuário ainda não escreveu a sua biografia</p>						
						<?php }else{ ?>
							<p>
								<?php echo $dados_usuario['biografia']; ?>
							</p>
						<?php } ?>
					</div>
					<div class="container status-lista">
						<div class="row">
							<div class="col-md-12 outras-info">
								<div class="row">
									<div class="col-md-2">
										<span class="title">Jogos na Lista</span>
										<span class="dados">8</span>
									</div>
									<div class="col-md-2 nota">
										<span class="title">Completados</span>
										<span class="dados">3</span>
									</div>
									<div class="col-md-2">
										<span class="title">Jogando</span>
										<span class="dados">2</span>
									</div>
									<div class="col-md-2">
										<span class="title">Pausados</span>
										<span class="dados">1</span>
									</div>
									<div class="col-md-2">
										<span class="title">Jogarei</span>
										<span class="dados">1</span>
									</div>
									<div class="col-md-2">
										<span class="title">Pulei Fora</span>
										<span class="dados">0</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container jogos-adicionados">
						<div class="title">
							<h3>Últimos Jogos Adicionados</h3>
						</div>
						<div class="row">
							<div class="col-md-6 jogo-add">
								<div class="row">
									<div class="col-md-3">
										<img src="fotos/game1.png">
									</div>
									<div class="col-md-9">
										<p>Call of duty Black Ops 2</p>
										<p>Completado</p>
										<p>Nota: 10</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 jogo-add">
								<div class="row">
									<div class="col-md-3">
										<img src="fotos/game2.png">
									</div>
									<div class="col-md-9">
										<p>Ori and the Will of the Wisps</p>
										<p>Pensando em Jogar</p>
										<p>Nota: -</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 jogo-add">
								<div class="row">
									<div class="col-md-3">
										<img src="fotos/game3.png">
									</div>
									<div class="col-md-9">
										<p>Fortnite</p>
										<p>Jogando</p>
										<p>Nota: 8,5</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 jogo-add">
								<div class="row">
									<div class="col-md-3">
										<img src="fotos/game4.png">
									</div>
									<div class="col-md-9">
										<p>Hades</p>
										<p>Completado</p>
										<p>Nota: 9</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container comentarios">
						<div class="title">
							<h3>Comentários</h3>
						</div>
						<textarea id="comentario"></textarea>
						<button class="btn-comentario" id="btn-comentario">Comentar</button>
						<span id="comentario-required" class="error-input" style="display: none;">É necessário preencher o campo para comentar</span>
					</div>
					<div class="container mostra-comentarios" id="mostra-comentarios">
						
					</div>
				</div>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>