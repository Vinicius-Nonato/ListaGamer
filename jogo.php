<?php 
	session_start(); 

	//INICIA A BUSCA DE DADOS

	require_once('conexao_db.php');

	$url = isset($_GET['jogo']) ? $_GET['jogo'] : 0;
	$sql = "SELECT * FROM jogos WHERE url = '$url'";	
	$usuario_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 0;
	$error = isset($_GET['erro']) ? $_GET['erro'] : 0;
	$success = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_jogo = mysqli_fetch_array($busca_bd);
		if ($dados_jogo['url'] == NULL) {
			header('Location: /');	
		}
	}else{
		header('Location: /');
	}
	//FECHA A BUSCA DE DADOS		

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.product-page .jogo-info .title h2{
			margin-top: 15px;
			margin-bottom: 15px;
			text-align: left;
		}
		.product-page .jogo-info{
			text-align: left;
		}
		.product-page .jogo-info{
			border-left: 1px solid #363636;
		}
		.product-page .produto-esquerda .imagem-jogo{
			text-align: center;
		}
		.product-page .produto-esquerda .jogo-info-geral .title{
			margin-top: 20px;
			margin-bottom: 10px;
		}
		.product-page .produto-esquerda .jogo-info-geral .item{
			padding: 7.5px 5px;
			font-size: 13px;
		}
		.product-page .produto-esquerda .jogo-info-geral .item.impar{
			background-color: #DCDCDC;
		}
		.product-page .produto-esquerda .jogo-info-geral .item .titulo{
			font-weight: bold;
		}

		.product-page .minhas-notas .nota-label{
			display: block;
			width: 100%;
			margin-bottom: 7.5px;
		}
		.product-page .minhas-notas .row div{
			text-align: center;
		}
		.product-page .minhas-notas .row div select{
			padding: 2.5px;
		}
		.product-page .produto-notas{
			padding: 20px 10px;
			background-color: #363636;
			color: #FFF;
		}
		.product-page .outras-info{
			text-align: center;
		}
		.product-page .outras-info .title{
			width: 100%;
			display: block;
			margin-bottom: 5px;
		}
		.product-page .dados{
			font-weight: bold;
		}
		.product-page .descricao{
			margin-top: 25px;
			margin-bottom: 25px;
		}
		.product-page .descricao p{
			font-size: 15px;
		}
		.product-page .recomendados{
			margin-top: 50px;
		}
		.product-page .recomendados .title{
			margin-bottom: 25px;
		}
		.product-page .imagens{
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
		.produto-notas .minhas-notas .add-lista{
			text-align: center;
    		margin-top: 10px;
		}

		.produto-notas .minhas-notas .add-lista .botao-addlista{
			padding: 5px 10px;
			cursor: pointer;
			font-weight: 500;
		}
		.product-page .popup_jogo{
			display: none;
			position: fixed;
			height: 250px;	
			background-color: #FFF;
			z-index: 99999;
		    margin: 0% 30%;
		    left: 0px;
		    width: 40%;
		}
		.product-page #sombra, .product-page #sombra_2{
			width: 100%;
			height: 100%;
			position: fixed;
			left: 0px;
			top: 0px;
			background-color: #000;
			z-index: 999;
			opacity: 0.5;
			display: none;
		}
		.popup_jogo .fecha{
			float: right;
			cursor: pointer;
		}
		.popup_jogo .top-row{
			padding: 5px;
		}
		.popup_jogo .imagem-jogo img{
			height: 190px;
		}
		.popup_jogo .imagem-jogo{
			padding-left: 35px;
		}
		.popup_jogo .linha{
			margin-top: 12.5px;
			margin-bottom: 12.5px;
		}
		.popup_jogo select{
			height: 30px;
		}
		.popup_jogo .botao-addjogo{
			float: right;
		    margin-top: 10px;
		    position: absolute;
		    right: 0px;
		    padding: 5px;
		    cursor: pointer;
		}
		.product-page .minhas-notas{
			display: inline-block;
		}
		.product-page .minhas-notas .col-md-4{
			display: inline-block;
		}
		.product-page .minhas-notas .title{
			width: 100%;
    		display: block;
    		margin-bottom: 5px;
		}
		.product-page .popup_editado{
			display: none;
			position: fixed;
			height: 250px;	
			background-color: #FFF;
			z-index: 99999;
		    margin: 0% 30%;
		    left: 0px;
		    width: 40%;
		}
		.product-page .popup_editado h3{
			color: #000;
			text-align: left;
		}
		.product-page .popup_editado .label-popup{
			color: #000;
			text-align: left;
		}
		.product-page .popup_editado .left-item select, .product-page .popup_editado .left-item input{
			float: left;
		}
		.popup_editado .botao-addjogo{
			float: right;
		    margin-top: 10px;
		    position: initial;
		    right: 0px;
		    padding: 5px;
		    cursor: pointer;
		    margin: 0px 5px;
		}
	</style>
	<script src="./js/glider/glider.min.js"></script>
	<link rel="stylesheet" href="./js/glider/glider.min.css">
	<script type="text/javascript">
		function mostraPopup(){
			document.getElementById("popup_jogo").style.display = "block";
			document.getElementById("sombra").style.display = "block";
		}
		function escondePopup(){
			document.getElementById("popup_jogo").style.display = "none";
			document.getElementById("sombra").style.display = "none";
		}
		function mostraPopupEdita(){
			document.getElementById("popup_editado").style.display = "block";
			document.getElementById("sombra_2").style.display = "block";
		}
		function escondePopupEdita(){
			document.getElementById("popup_editado").style.display = "none";
			document.getElementById("sombra_2").style.display = "none";
		}

	</script>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main product-page">
		<div class="popup_jogo" id="popup_jogo">
			<div class="row top-row">
				<div class="col-md-10 nome"><h3 style="padding-left: 15px;"><?php if ($dados_jogo['nome'] == NULL){echo "-";}else{echo $dados_jogo['nome'];} ?></h3></div>
				<div class="col-md-2"><img class="fecha" src="fotos/default/fecha.png" onclick="escondePopup()"></div>
			</div>
			<div class="row">
					<div class="col-md-3 imagem-jogo">
						<?php
						if ($dados_jogo['imagem_jogo'] == NULL) {
							echo "<img src='fotos/default/jogo.png'>";
						}else{
							$nomefotoatual = $dados_jogo['imagem_jogo'];
							echo "<img src='fotos/jogos/".$nomefotoatual."'>";
						}?>
					</div>
					<div class="col-md-9">
						<form method="post" action="formularios/addjogoalista.php">
						<div class="col-md-12 linha row">
							<div class="col-md-5">
								<span class="nota-label label-popup">Minha Nota</span>
							</div>
							<div class="col-md-7">
								<select name="nota" id="nota">
									<option value="10">10</option>
									<option value="9.5">9.5</option>
									<option value="9.0">9.0</option>
									<option value="8.5">8.5</option>
									<option value="8.0">8.0</option>
									<option value="7.5">7.5</option>
									<option value="7.0">7.0</option>
									<option value="6.5">6.5</option>
									<option value="6.0">6.0</option>
									<option value="5.5">5.5</option>
									<option value="5.0">5.0</option>
									<option value="4.5">4.5</option>
									<option value="4.0">4.0</option>
									<option value="3.5">3.5</option>
									<option value="3.0">3.0</option>
									<option value="2.5">2.5</option>
									<option value="2.0">2.0</option>
									<option value="1.5">1.5</option>
									<option value="1.0">1.0</option>
									<option value="0.5">0.5</option>
									<option value="0.0">0.0</option>
									<option value="avaliar" selected>Avaliar</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 linha row">
							<div class="col-md-5">
								<span class="nota-label label-popup">Status</span>
							</div>
							<div class="col-md-7">
								<select name="status" id="status">
									<option value="Completado">Completado</option>
									<option value="Jogando">Jogando</option>
									<option value="Pausado">Pausado</option>
									<option value="Pensando em Jogar">Pensando em Jogar</option>
									<option value="Pulei Fora">Pulei Fora</option>
									<option value="Escolher" selected>Escolher ...</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 linha row">
							<div class="col-md-5">
								<span class="nota-label label-popup">Tempo de Jogo</span>
							</div>
							<div class="col-md-7">
								<input type="text" name="tempo_jogado">
							</div>
							<?php


							?>
							<input style="display: none;" type="text" name="usuario" value="<?php if ($usuario_session == 0){echo "-";}else{echo $_SESSION['usuario'];} ?>">
							<input style="display: none;" type="text" name="jogo" value="<?php echo $url; ?>">
						</div>
						<?php
						if(!isset($_SESSION['usuario'])){
						?>
						<div class="col-md-12 linha row">
							<span style="position: absolute; right: 0px; margin-top: 20px;">É necessario logar para adicionar o jogo a sua lista</span>
						</div>
						<?php
						}else{
						?>
						<div class="col-md-12 linha row">
							<button class="botao-addjogo" type="submit">Adicionar jogo a Lista</button>
						</div>
						<?php } ?>
						</form>
					</div>
				</div>
			</div>
			<div id="sombra" onclick="escondePopup()"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 produto-esquerda">
					<div class="imagem-jogo">
						<?php
						if ($dados_jogo['imagem_jogo'] == NULL) {
							echo "<img style='width: 100%;height: auto;' src='fotos/default/jogo.png'>";
						}else{
							$nomefotoatual = $dados_jogo['imagem_jogo'];
							echo "<img style='width: 100%;height: auto;' src='fotos/jogos/".$nomefotoatual."'>";
						}
						 ?>
					</div>
					<div class="jogo-info-geral">
						<div class="title">
							<h5>Informação</h5>
						</div>
						<div class="item impar"><span class="titulo">Produtora: </span><span class="resposta"><?php if ($dados_jogo['produtora'] == NULL){echo "-";}else{echo $dados_jogo['produtora'];} ?></span></div>
						<div class="item"><span class="titulo">Distribuidora: </span><span class="resposta"><?php if ($dados_jogo['distribuidora'] == NULL){echo "-";}else{echo $dados_jogo['distribuidora'];} ?></span></div>
						<div class="item impar"><span class="titulo">Tempo de Jogo: </span><span class="resposta"><?php if ($dados_jogo['tempo_jogo'] == NULL){echo "-";}else{echo $dados_jogo['tempo_jogo'];} ?></span></div>
						<div class="item"><span class="titulo">Data Lançamento: </span><span class="resposta"><?php if ($dados_jogo['data_lancamento'] == NULL){echo "-";}else{echo $dados_jogo['data_lancamento'];} ?></span></div>
						<div class="item impar"><span class="titulo">Genêro: </span><span class="resposta"><?php if ($dados_jogo['genero'] == NULL){echo "-";}else{echo $dados_jogo['genero'];} ?></span></div>
						<div class="item"><span class="titulo">Plataformas: </span><span class="resposta"><?php if ($dados_jogo['plataforma'] == NULL){echo "-";}else{echo $dados_jogo['plataforma'];} ?></span></div>
						<div class="item impar"><span class="titulo">Linguagem: </span><span class="resposta"><?php if ($dados_jogo['linguagem'] == NULL){echo "-";}else{echo $dados_jogo['linguagem'];} ?></span></div>
					</div>
					<div class="jogo-info-geral">
						<div class="title">
							<h5>Franquia</h5>
						</div>
						<div class="item impar"><span class="titulo">Jogo Anterior: </span><span class="resposta"><a href="#"><?php if ($dados_jogo['jogo_ant'] == NULL){echo "-";}else{echo $dados_jogo['jogo_ant'];} ?></a></span></div>
						<div class="item"><span class="titulo">Jogo Posterior: </span><span class="resposta"><a href="#"><?php if ($dados_jogo['jogo_pos'] == NULL){echo "-";}else{echo $dados_jogo['jogo_pos'];} ?></a></span></div>
					</div>
				</div>
				<div class="col-md-9 jogo-info">
					<?php if ($success == 1){ ?>
					<div class="success">
						<span>O jogo foi adicionado a sua lista com sucesso!</span>
					</div>
					<?php } ?>
					<?php if ($success == 2){ ?>
					<div class="success">
						<span>O jogo foi atualizado com sucesso!</span>
					</div>
					<?php } ?>
					<?php if ($success == 3){ ?>
					<div class="success">
						<span>O jogo foi removido da sua lista com sucesso!</span>
					</div>
					<?php } ?>
					<?php if ($error == 1){ ?>
					<div class="error">
						<span>Houve um erro durante o processo, entre em contato com o desenvolvedor do site!</span>
					</div>
					<?php } ?>
					<div class="title">
						<h2><?php if ($dados_jogo['nome'] == NULL){echo "-";}else{echo $dados_jogo['nome'];} ?></h2>
					</div>
					<div class="container produto-notas">
						<div class="row">
							<div class="col-md-7 outras-info">
								<div class="row">
									<div class="col-md-3 nota">
										<span class="title">Nota Geral</span>
										<span class="dados">9.08</span>
									</div>
									<div class="col-md-3">
										<span class="title">Posição</span>
										<span class="dados">#1</span>
									</div>
									<div class="col-md-3">
										<span class="title">Popularidade</span>
										<span class="dados">#1</span>
									</div>
									<div class="col-md-3">
										<span class="title">Inscritos</span>
										<span class="dados">20</span>
									</div>
								</div>
							</div>
							<div class="col-md-5 minhas-notas row">
								<?php

								$sql_jogolista = "SELECT * FROM lista_gamer WHERE usuario = '$usuario_session' AND jogo = '$url'";

								$busca_jogolista = mysqli_query($link, $sql_jogolista);

								if($busca_bd){
									$dados_jogolista = mysqli_fetch_array($busca_jogolista);
									if (isset($dados_jogolista)) {
										$validajogolista = 0;
									}else{
										$validajogolista = 1;
									}
									if ($validajogolista == 1) {
								?>
									<div class="add-lista" style="margin: auto; margin-top: 10px;">
										<button class="botao-addlista" onclick="mostraPopup()">Adicionar jogo a Lista</button>
									</div>
									<?php }else{ ?>
										<div class="col-md-4" style="text-align: center;">
											<span class="title" style="margin-bottom: 5px;">Sua Nota</span>
											<span class="dados"><?php echo $dados_jogolista['nota']; ?></span>
										</div>
										<div class="col-md-4" style="text-align: center;">
											<span class="title" style="margin-bottom: 5px;">Status</span>
											<span class="dados"><?php echo $dados_jogolista['status']; ?></span>
										</div>
										<div class="add-lista col-md-4" style="width: 30% !important; margin-top: 10px !important; vertical-align: top;">
											<button class="botao-addlista" onclick="mostraPopupEdita()">Editar</button>
										</div>
										<!-- FORMULÁRIO EDITADO -->
										<div class="popup_editado popup_jogo" id="popup_editado">
											<div class="row top-row">
												<div class="col-md-10 nome"><h3 style="padding-left: 15px;"><?php if ($dados_jogo['nome'] == NULL){echo "-";}else{echo $dados_jogo['nome'];} ?></h3></div>
												<div class="col-md-2"><img class="fecha" src="fotos/default/fecha.png" onclick="escondePopupEdita()"></div>
											</div>
											<div class="row">
												<div class="col-md-3 imagem-jogo">
													<?php
													if ($dados_jogo['imagem_jogo'] == NULL) {
														echo "<img src='fotos/default/jogo.png'>";
													}else{
														$nomefotoatual = $dados_jogo['imagem_jogo'];
														echo "<img src='fotos/jogos/".$nomefotoatual."'>";
													}?>
												</div>
												<div class="col-md-9">
													<form method="post" action="formularios/editajogolista.php">
														<div class="col-md-12 linha row">
															<div class="col-md-5">
																<span class="nota-label label-popup">Minha Nota</span>
															</div>
															<div class="col-md-7 left-item">
																<?php  
																$notajogo = $dados_jogolista['nota'];
																$statusjogo = $dados_jogolista['status'];
																$tempojogo = $dados_jogolista['tempo'];													
																?>
																<select name="nota" id="nota">
																	<option value="10" <?php if($notajogo == 10){ echo "selected"; } ?>>10</option>
																	<option value="9.5" <?php if($notajogo == 9.5){ echo "selected"; } ?>>9.5</option>
																	<option value="9.0" <?php if($notajogo == 9.0){ echo "selected"; } ?>>9.0</option>
																	<option value="8.5" <?php if($notajogo == 8.5){ echo "selected"; } ?>>8.5</option>
																	<option value="8.0" <?php if($notajogo == 8.0){ echo "selected"; } ?>>8.0</option>
																	<option value="7.5" <?php if($notajogo == 7.5){ echo "selected"; } ?>>7.5</option>
																	<option value="7.0" <?php if($notajogo == 7.0){ echo "selected"; } ?>>7.0</option>
																	<option value="6.5" <?php if($notajogo == 6.5){ echo "selected"; } ?>>6.5</option>
																	<option value="6.0" <?php if($notajogo == 6.0){ echo "selected"; } ?>>6.0</option>
																	<option value="5.5" <?php if($notajogo == 5.5){ echo "selected"; } ?>>5.5</option>
																	<option value="5.0" <?php if($notajogo == 5.0){ echo "selected"; } ?>>5.0</option>
																	<option value="4.5" <?php if($notajogo == 4.5){ echo "selected"; } ?>>4.5</option>
																	<option value="4.0" <?php if($notajogo == 4.0){ echo "selected"; } ?>>4.0</option>
																	<option value="3.5" <?php if($notajogo == 3.5){ echo "selected"; } ?>>3.5</option>
																	<option value="3.0" <?php if($notajogo == 3.0){ echo "selected"; } ?>>3.0</option>
																	<option value="2.5" <?php if($notajogo == 2.5){ echo "selected"; } ?>>2.5</option>
																	<option value="2.0" <?php if($notajogo == 2.0){ echo "selected"; } ?>>2.0</option>
																	<option value="1.5" <?php if($notajogo == 1.5){ echo "selected"; } ?>>1.5</option>
																	<option value="1.0" <?php if($notajogo == 1.0){ echo "selected"; } ?>>1.0</option>
																	<option value="0.5" <?php if($notajogo == 0.5){ echo "selected"; } ?>>0.5</option>
																	<option value="0.0" <?php if($notajogo == 0.0){ echo "selected"; } ?>>0.0</option>
																	<option value="avaliar" <?php if($notajogo == 10){ echo "selected"; } ?>>Avaliar</option>
																</select>
															</div>
														</div>
														<div class="col-md-12 linha row">
															<div class="col-md-5">
																<span class="nota-label label-popup">Status</span>
															</div>
															<div class="col-md-7 left-item">
																<select name="status" id="status">
																	<option value="Completado" <?php if($statusjogo == "Completado"){ echo "selected"; } ?>>Completado</option>
																	<option value="Jogando" <?php if($statusjogo == "Jogando"){ echo "selected"; } ?>>Jogando</option>
																	<option value="Pausado" <?php if($statusjogo == "Pausado"){ echo "selected"; } ?>>Pausado</option>
																	<option value="Pensando em Jogar" <?php if($statusjogo == "Pensando em Jogar"){ echo "selected"; } ?>>Pensando em Jogar</option>
																	<option value="Pulei Fora" <?php if($statusjogo == "Pulei Fora"){ echo "selected"; } ?>>Pulei Fora</option>
																	<option value="Escolher" <?php if($statusjogo == "Escolher"){ echo "selected"; } ?>>Escolher ...</option>
																</select>
															</div>
														</div>
														<div class="col-md-12 linha row">
															<div class="col-md-5">
																<span class="nota-label label-popup">Tempo de Jogo</span>
															</div>
															<div class="col-md-7 left-item">
																<input type="text" name="tempo_jogado" <?php echo "value='". $tempojogo ."'"; ?>>
															</div>
															<?php


															?>
															<input style="display: none;" type="text" name="usuario" value="<?php if ($_SESSION['usuario'] == NULL){echo "-";}else{echo $_SESSION['usuario'];} ?>">
															<input style="display: none;" type="text" name="jogo" value="<?php echo $url; ?>">
														</div>
														<?php
														if(!isset($_SESSION['usuario'])){
														?>
														<div class="col-md-12 linha row">
															<span style="position: absolute; right: 0px; margin-top: 20px;">É necessario logar para adicionar o jogo a sua lista</span>
														</div>
														<?php
														}else{
														?>
														<div class="col-md-12 linha row" style="display: block;">
															<button class="botao-addjogo" type="submit">Atualizar Jogo</button>
															</form>
															<form method="post" action="formularios/removejogolista.php">
																<input style="display: none;" type="text" name="usuario" value="<?php if ($_SESSION['usuario'] == NULL){echo "-";}else{echo $_SESSION['usuario'];} ?>">
																<input style="display: none;" type="text" name="jogo" value="<?php echo $url; ?>">
																<button class="botao-addjogo" type="submit">Remover Jogo da Lista</button>
															</form>
														</div>
														<?php } ?>
													</div>
												</div>
											</div>
											<div id="sombra_2" onclick="escondePopupEdita()"></div>
								<?php }} ?>
							</div>
						</div>
					</div>
					<div class="descricao">
						<h4>Descrição</h4>
						<div class="text-descricao"><p><?php if ($dados_jogo['descricao'] == NULL){echo "-";}else{echo $dados_jogo['descricao'];} ?></p></div>
					</div>
					<?php $imagens = 0; ?>
					<div class="imagens">
						<div class="title">
							<h4>Imagens</h4>
						</div>
						<?php if ($dados_jogo['imagem_1'] != NULL) { ?>
						<div class="imagem-principal">
							<?php $fotoimagem1 = $dados_jogo['imagem_1']; ?>
							<?php echo "<img src='fotos/jogos/".$fotoimagem1."'>" ?>
						</div>
						<?php $imagens++;} ?>
						<div class="imagens-galeria">
							<?php if ($dados_jogo['imagem_1'] != NULL) { ?>
							<div class="item">
								<?php echo "<img src='fotos/jogos/".$fotoimagem1."'>" ?>
							</div>
							<?php } ?>
							<?php $fotoimagem2 = $dados_jogo['imagem_2']; ?>
							<?php if ($dados_jogo['imagem_2'] != NULL) { ?>
							<div class="item">
								<?php echo "<img src='fotos/jogos/".$fotoimagem2."'>" ?>
							</div>
							<?php $imagens++;} ?>
							<?php $fotoimagem3 = $dados_jogo['imagem_3']; ?>
							<?php if ($dados_jogo['imagem_3'] != NULL) { ?>
							<div class="item">
								<?php echo "<img src='fotos/jogos/".$fotoimagem3."'>" ?>
							</div>
							<?php $imagens++;} ?>
							<?php $fotoimagem4 = $dados_jogo['imagem_4']; ?>
							<?php if ($dados_jogo['imagem_4'] != NULL) { ?>
							<div class="item">
								<?php echo "<img src='fotos/jogos/".$fotoimagem4."'>" ?>
							</div>
							<?php $imagens++;} ?>
						</div>
						<?php if ($imagens == 0) {
							?>
							<p>Este Jogo não tem imagens de exemplo cadastradas neste site</p>
							<?php
							} ?>
					</div>
					<div class="recomendados">
						<div class="title">
							<h4>Jogos Semelhantes</h4>
						</div>
						<div class="content slider-list">
							<div class="glider-contain">
							  <div class="glider-lancamentos">
							    <div class="game"><img src="fotos/game1.png"></div>
								<div class="game"><img src="fotos/game2.png"></div>
								<div class="game"><img src="fotos/game3.png"></div>
								<div class="game"><img src="fotos/game4.png"></div>
								<div class="game"><img src="fotos/game5.png"></div>
								<div class="game"><img src="fotos/game1.png"></div>
								<div class="game"><img src="fotos/game2.png"></div>
								<div class="game"><img src="fotos/game3.png"></div>
								<div class="game"><img src="fotos/game4.png"></div>
								<div class="game"><img src="fotos/game5.png"></div>
							  </div>

							  <button aria-label="Previous" class="glider-prev glider-prev3"><</button>
							  <button aria-label="Next" class="glider-next glider-next3">></button>
							  <div role="tablist" class="dots dots3"></div>
							</div>
							<script type="text/javascript">
								new Glider(document.querySelector('.glider-lancamentos'), {
								   slidesToShow: 5,
								   slidesToScroll: 2,
								   draggable: true,
								   duration: 1,
								   arrows: {
								     prev: '.glider-prev3',
								     next: '.glider-next3'
								   },
								   dots: '.dots3'
								 })
							</script>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>