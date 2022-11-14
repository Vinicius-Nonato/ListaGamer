<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : 0;


	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_usuario = mysqli_fetch_array($busca_bd);
		if ($dados_usuario['usuario'] == NULL) {
			header('Location: /listagamer/Admin_Si912/useradmin.php');	
		}
	}else{
		header('Location: /');
	}



	if($usuario == 0){
		header('Location: /listagamer/Admin_Si912/useradmin.php');
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
								<p class="mensagem">O usuário foi editado com sucesso</p>
							</div>
							<?php
							} ?>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form name="novo-usuario" method="POST" action="formularios/editaconta_cod.php" class="adiciona-jogo form-admin alterar-admin"> 
									<div class="form-item">
										<span>Usuário</span>
										<input type="text" name="usuario" value="<?php if ($dados_usuario['usuario'] == NULL){echo "-";}else{echo $dados_usuario['usuario'];} ?>">
									</div>
									<div class="form-item">
										<span>Nome</span>
										<input type="text" name="nome" value="<?php if ($dados_usuario['nome'] == NULL){echo "-";}else{echo $dados_usuario['nome'];} ?>">
									</div>
									<div class="form-item">
										<span>Sobrenome</span>
										<input type="text" name="sobrenome" value="<?php if ($dados_usuario['sobrenome'] == NULL){echo "-";}else{echo $dados_usuario['sobrenome'];} ?>">
									</div>
									<div class="form-item">
										<span>Email</span>
										<input type="email" name="email" value="<?php if ($dados_usuario['email'] == NULL){echo "-";}else{echo $dados_usuario['email'];} ?>">
									</div>
									<div class="enviar">
										<button type="submit" class="enviar-login">Editar Usuário</button>
									</div>
								</form>
								<form name="novo-usuario" method="POST" action="formularios/delete_user.php" class="adiciona-jogo form-admin alterar-admin">
									<div class="enviar">
										<input type="text" name="usuario" value="<?php if ($dados_usuario['usuario'] == NULL){echo "-";}else{echo $dados_usuario['usuario'];} ?>" style="display: none;">
										<button type="submit" class="enviar-login">Excluir Usuário</button>
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