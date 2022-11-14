<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	$jogo = isset($_GET['jogo']) ? $_GET['jogo'] : 0;

	require_once('conexao_db.php');

	$sql = "SELECT * FROM jogos WHERE url = '$jogo'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_jogo = mysqli_fetch_array($busca_bd);
		if ($dados_jogo['nome'] == NULL) {
			header('Location: /listagamer/Admin_Si912/jogosadmin.php');	
		}
	}else{
		header('Location: /');
	}



	if($jogo == 0){
		header('Location: /listagamer/Admin_Si912/jogosadmin.php');
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
						<h2>Editar Jogo</h2>
					</div>
					<div class="container">
						<div class="row">
							<?php if ($success == 1) {
							?>
							<div class="col-md-12">
								<p class="mensagem">O Jogo foi editado com sucesso</p>
							</div>
							<?php
							} ?>
							<?php if ($success == 2) {
							?>
							<div class="col-md-12">
								<p class="mensagem">A imagem foi alterada com sucesso</p>
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
								<form enctype="multipart/form-data" method="POST" action="formularios/addjogoeditado.php" class="adiciona-jogo form-admin" name="adiciona-jogo">
									<h3 class="title-imagens">Dados do Jogo</h3>
									<div class="form-item">
										<span>Nome do Jogo</span>
										<input type="text" name="nome-jogo" value="<?php if ($dados_jogo['nome'] == NULL){echo "-";}else{echo $dados_jogo['nome'];} ?>">
									</div>
									<div class="form-item">
										<span>Status</span>
										<select class="status-jogo" name="status-jogo">
											<option value="habilitado" <?php if($dados_jogo['status'] == "habilitado"){?> selected <?php } ?> >Habilitado</option>
											<option value="desabilitado" <?php if($dados_jogo['status'] == "desabilitado"){?> selected <?php } ?> >Desabilitado</option>
										</select>
									</div>
									<div class="form-item">
										<span>Url</span>
										<input type="text" name="url" value="<?php if ($dados_jogo['url'] == NULL){echo "-";}else{echo $dados_jogo['url'];} ?>" readonly>
									</div>
									<div class="form-item">
										<span>Descrição</span>
										<textarea name="descricao"><?php if ($dados_jogo['descricao'] == NULL){echo "-";}else{echo $dados_jogo['descricao'];} ?></textarea>
									</div>
									<div class="form-item">
										<span>Produtora</span>
										<input type="text" name="produtora" value="<?php if ($dados_jogo['produtora'] == NULL){echo "-";}else{echo $dados_jogo['produtora'];} ?>">
									</div>
									<div class="form-item">
										<span>Distribuidora</span>
										<input type="text" name="distribuidora" value="<?php if ($dados_jogo['distribuidora'] == NULL){echo "-";}else{echo $dados_jogo['distribuidora'];} ?>">
									</div>
									<div class="form-item">
										<span>Tempo de Jogo</span>
										<input type="text" name="tempo_jogo" value="<?php if ($dados_jogo['tempo_jogo'] == NULL){echo "-";}else{echo $dados_jogo['tempo_jogo'];} ?>">
									</div>
									<div class="form-item">
										<span>Data de Lançamento</span>
										<input type="date" name="data-lancamento" value="<?php if ($dados_jogo['data_lancamento'] == NULL){echo "-";}else{echo $dados_jogo['data_lancamento'];} ?>">
									</div>
									<div class="form-item checkboxs" id="genero">
										<span>Gêneros</span>
										<input type="text" name="data-lancamento" value="<?php if ($dados_jogo['genero'] == NULL){echo "-";}else{echo $dados_jogo['genero'];} ?>">
									</div>
									<div class="form-item checkboxs">
										<span>Plataformas</span>
										<input type="text" name="data-lancamento" value="<?php if ($dados_jogo['plataforma'] == NULL){echo "-";}else{echo $dados_jogo['plataforma'];} ?>">
									</div>
									<div class="form-item">
										<span>Linguagem</span>
										<input type="text" name="linguagem" value="<?php if ($dados_jogo['linguagem'] == NULL){echo "-";}else{echo $dados_jogo['linguagem'];} ?>">
									</div>
									<div class="form-item">
										<span>Jogo Anterior</span>
										<input type="text" name="jogo_ant" value="<?php if ($dados_jogo['jogo_ant'] == NULL){echo "-";}else{echo $dados_jogo['jogo_ant'];} ?>">
									</div>
									<div class="form-item">
										<span>Jogo Posterior</span>
										<input type="text" name="jogo_pos" value="<?php if ($dados_jogo['jogo_pos'] == NULL){echo "-";}else{echo $dados_jogo['jogo_pos'];} ?>">
									</div>
									<div class="enviar">
											<button type="submit" id="add-jogo" class="enviar-login">Editar Jogo</button>
									</div>
								</form>
									<div class="upar-imagem adiciona-jogo form-admin">
										<h3 class="title-imagens">Mídia do Jogo</h3>
										<form enctype="multipart/form-data" method="POST" action="formularios/edit_image_prin.php" class="adiciona-jogo form-admin" name="adiciona-img-prin">
											<div class="form-item">
												<span>Imagem Principal (300x450)</span>
												<?php
													if($dados_jogo['imagem_jogo'] == NULL){}else{
														echo "<img style='width: 100%;' src='../fotos/jogos/". $dados_jogo['imagem_jogo'] ."'>";
													}
												?>	
												<input type="file" name="img" />
												<input type="text" name="tipo-img" value="1" style="display: none;">
												<input type="text" name="url" value="<?php echo $jogo; ?>" style="display: none;" />
												<button type="submit" class="enviar-imagem">Trocar Imagem</button>
											</div>
										</form>
										<form enctype="multipart/form-data" method="POST" action="formularios/edit_image_prin.php" class="adiciona-jogo form-admin" name="adiciona-img-prin">
											<div class="form-item">
												<span>Imagem Catálogo 1 (1280x720)</span>
												<?php
													if($dados_jogo['imagem_1'] == NULL){}else{
														echo "<img style='width: 100%;' src='../fotos/jogos/". $dados_jogo['imagem_1'] ."'>";
													}
												?>	
												<input type="file" name="img" />
												<input type="text" name="tipo-img" value="2" style="display: none;">
												<input type="text" name="url" value="<?php echo $jogo; ?>" style="display: none;" />
												<button type="submit" class="enviar-imagem">Trocar Imagem</button>
											</div>
										</form>
										<form enctype="multipart/form-data" method="POST" action="formularios/edit_image_prin.php" class="adiciona-jogo form-admin" name="adiciona-img-prin">
											<div class="form-item">
												<span>Imagem Catálogo 2 (1280x720)</span>
												<?php
													if($dados_jogo['imagem_2'] == NULL){}else{
														echo "<img style='width: 100%;' src='../fotos/jogos/". $dados_jogo['imagem_2'] ."'>";
													}
												?>	
												<input type="file" name="img" />
												<input type="text" name="tipo-img" value="3" style="display: none;">
												<input type="text" name="url" value="<?php echo $jogo; ?>" style="display: none;" />
												<button type="submit" class="enviar-imagem">Trocar Imagem</button>
											</div>
										</form>
										<form enctype="multipart/form-data" method="POST" action="formularios/edit_image_prin.php" class="adiciona-jogo form-admin" name="adiciona-img-prin">
											<div class="form-item">
												<span>Imagem Catálogo 3 (1280x720)</span>
												<?php
													if($dados_jogo['imagem_3'] == NULL){}else{
														echo "<img style='width: 100%;' src='../fotos/jogos/". $dados_jogo['imagem_3'] ."'>";
													}
												?>	
												<input type="file" name="img" />
												<input type="text" name="tipo-img" value="4" style="display: none;">
												<input type="text" name="url" value="<?php echo $jogo; ?>" style="display: none;" />
												<button type="submit" class="enviar-imagem">Trocar Imagem</button>
											</div>
										</form>
										<form enctype="multipart/form-data" method="POST" action="formularios/edit_image_prin.php" class="adiciona-jogo form-admin" name="adiciona-img-prin">
											<div class="form-item">
												<span>Imagem Catálogo 4 (1280x720)</span>
												<?php
													if($dados_jogo['imagem_4'] == NULL){}else{
														echo "<img style='width: 100%;' src='../fotos/jogos/". $dados_jogo['imagem_4'] ."'>";
													}
												?>	
												<input type="file" name="img" />
												<input type="text" name="tipo-img" value="5" style="display: none;">
												<input type="text" name="url" value="<?php echo $jogo; ?>" style="display: none;" />
												<button type="submit" class="enviar-imagem">Trocar Imagem</button>
											</div>
										</form>
									</div>
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