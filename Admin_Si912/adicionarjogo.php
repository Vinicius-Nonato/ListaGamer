<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		

	$error = isset($_GET['error']) ? $_GET['error'] : 0;
	$success = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;


?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.adiciona-jogo{
			margin-bottom: 50px;
		}
		.adiciona-jogo .form-item input{
			width: 100%;
		}
		.adiciona-jogo .form-item select{
			width: 100%;
			height: 30px;
		}
		.adiciona-jogo .upar-imagem{
			margin-top: 50px;
			border-top: 2px solid #FFF;
		}
		.adiciona-jogo .title-imagens{
			color: #FFF;
			margin-top: 10px;
		}
		.adiciona-jogo .checkbox{
			width: auto !important;
			display: inline-block;
			margin-right: 5px;
		}
		.adiciona-jogo .checkboxs .item{
			color: #FFF;
			padding: 5px;
			display: inline-block;
		}
		.adiciona-jogo textarea{
			width: 100%;
		}
		.admin-body .mensagem{
			background-color: #FFF;
		    padding: 10px;
		    margin-bottom: 10px;
		}
	</style>
</head>
<body class="admin-body">
	<div class="container">
		<div class="row">
			<div class="header col-md-2">
				<?php require 'html/header.html'; ?>
			</div>
			<div class="col-md-10">
				<div class="container main-painel">
					<div class="page-title">
						<h2>Adicionar Jogo</h2>
					</div>
					<div class="container">
						<div class="row">
							<?php if ($success == 1) {
							?>
							<div class="col-md-12">
								<p class="mensagem">O Jogo foi adicionado com sucesso</p>
							</div>
							<?php
							} ?>
							<?php if ($error == 1) {
							?>
							<div class="col-md-12">
								<p class="mensagem">A URL ja existe</p>
							</div>
							<?php
							} ?>
							<?php if ($error == 2) {
							?>
							<div class="col-md-12">
								<p class="mensagem">Ocorreu um erro na inserção do banco de dados</p>
							</div>
							<?php
							} ?>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form enctype="multipart/form-data" method="POST" action="formularios/addjogo.php" class="adiciona-jogo form-admin" name="adiciona-jogo">
									<h3 class="title-imagens">Dados do Jogo</h3>
									<div class="form-item">
										<span>Nome do Jogo</span>
										<input type="text" name="nome-jogo">
									</div>
									<div class="form-item">
										<span>Status</span>
										<select class="status-jogo" name="status-jogo">
											<option value="habilitado">Habilitado</option>
											<option value="desabilitado">Desabilitado</option>
										</select>
									</div>
									<div class="form-item">
										<span>Url</span>
										<input type="text" name="url">
									</div>
									<div class="form-item">
										<span>Descrição</span>
										<textarea name="descricao"></textarea>
									</div>
									<div class="form-item">
										<span>Produtora</span>
										<input type="text" name="produtora">
									</div>
									<div class="form-item">
										<span>Distribuidora</span>
										<input type="text" name="distribuidora">
									</div>
									<div class="form-item">
										<span>Tempo de Jogo</span>
										<input type="text" name="tempo_jogo">
									</div>
									<div class="form-item">
										<span>Data de Lançamento</span>
										<input type="date" name="data-lancamento">
									</div>
									<div class="form-item checkboxs" id="genero">
										<span>Gêneros</span>
										<div class="item"><input type="checkbox" name="genero[]" id="shooter" value="Shotter" class="checkbox"><label>Shooter</label></div>
										<div class="item"><input type="checkbox" name="genero[]" id="rpg" value="RPG" class="checkbox"><label>RPG</label></div>
										<div class="item"><input type="checkbox" name="genero[]" id="fps" value="FPS" class="checkbox"><label>FPS</label></div>
										<div class="item"><input type="checkbox" name="genero[]" id="storytelling" value="Storytelling" class="checkbox"><label>Storytelling</label></div>
										<div class="item"><input type="checkbox" name="genero[]" id="ritmo" value="Ritmo" class="checkbox"><label>Ritmo</label></div>
									</div>
									<div class="form-item checkboxs">
										<span>Plataformas</span>
										<div class="item"><input type="checkbox" name="plataformas[]" id="ps4" value="PS4" class="checkbox"><label>PS4</label></div>
										<div class="item"><input type="checkbox" name="plataformas[]" id="xbox" value="XBOX" class="checkbox"><label>XBOX</label></div>
										<div class="item"><input type="checkbox" name="plataformas[]" id="switch" value="Switch" class="checkbox"><label>Switch</label></div>
										<div class="item"><input type="checkbox" name="plataformas[]" id="retro" value="Retro" class="checkbox"><label>Retro</label></div>
										<div class="item"><input type="checkbox" name="plataformas[]" id="pc" value="PC" class="checkbox"><label>PC</label></div>
									</div>
									<div class="form-item">
										<span>Linguagem</span>
										<input type="text" name="linguagem">
									</div>
									<div class="form-item">
										<span>Jogo Anterior</span>
										<input type="text" name="jogo_ant">
									</div>
									<div class="form-item">
										<span>Jogo Posterior</span>
										<input type="text" name="jogo_pos">
									</div>
									<div class="upar-imagem">
										<h3 class="title-imagens">Mídia do Jogo</h3>
										<div class="form-item">
											<span>Imagem Principal (300x450)</span>
											<input type="file" name="img-prin" />
										</div>
										<div class="form-item">
											<span>Imagem Catálogo 1 (1280x720)</span>
											<input type="file" name="img-cat1" />
										</div>
										<div class="form-item">
											<span>Imagem Catálogo 2 (1280x720)</span>
											<input type="file" name="img-cat2" />
										</div>
										<div class="form-item">
											<span>Imagem Catálogo 3 (1280x720)</span>
											<input type="file" name="img-cat3" />
										</div>
										<div class="form-item">
											<span>Imagem Catálogo 4 (1280x720)</span>
											<input type="file" name="img-cat4" />
										</div>
									</div>
									<div class="enviar">
											<button type="submit" id="add-jogo" class="enviar-login">Adicionar Jogo</button>
									</div>
								</form>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>