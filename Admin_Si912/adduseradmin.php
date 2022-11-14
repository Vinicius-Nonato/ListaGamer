<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		

	$error = isset($_GET['error']) ? $_GET['error'] : 0;
	$success = isset($_GET['sucess']) ? $_GET['sucess'] : 0;


?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
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
						<h2>Adicionar Usuário</h2>
					</div>
					<div class="container">
						<div class="row">
							<?php if ($success == 1) {
							?>
							<div class="col-md-12">
								<p class="mensagem">O usuário foi adicionado com sucesso</p>
							</div>
							<?php
							} ?>
							<?php if ($error == 1) {
							?>
							<div class="col-md-12">
								<p class="mensagem">O usuário já existe</p>
							</div>
							<?php
							} ?>
							<?php if ($error == 2) {
							?>
							<div class="col-md-12">
								<p class="mensagem">O email já existe</p>
							</div>
							<?php
							} ?>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form name="novo-usuario" method="POST" action="formularios/adduser.php" class="adiciona-jogo form-admin alterar-admin"> 
									<div class="form-item">
										<span>Usuário</span>
										<input type="text" name="usuario">
									</div>
									<div class="form-item">
										<span>Nome</span>
										<input type="text" name="nome">
									</div>
									<div class="form-item">
										<span>Sobrenome</span>
										<input type="text" name="sobrenome">
									</div>
									<div class="form-item">
										<span>Email</span>
										<input type="email" name="email">
									</div>
									<div class="form-item">
										<span>Nova Senha</span>
										<input type="password" name="nova_senha">
									</div>
									<div class="form-item">
										<span>Confirmação de Nova Senha</span>
										<input type="password" name="nova_senha_conf">
									</div>
									<div class="enviar">
											<button type="submit" class="enviar-login">Adicionar Usuário</button>
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