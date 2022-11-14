<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		

	$error = isset($_GET['error']) ? $_GET['error'] : 0;

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
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
						<h2>Adicionar Administrador</h2>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php if($error == 5){ ?>
								<p>Você cadastrou o usuário com sucesso</p>
								<?php } ?>
								<form class="alterar-admin" method="post" id="formAdminAdd" action="formularios/registra_admin.php">
									<div class="form-item">
										<span>Usuário</span>
										<input type="text" name="usuario">
									</div>
									<div class="form-item">
										<span>Grupo de Administrador</span>
										<select name="tipo_admin">
											<option value="admin-geral">Administrador Geral</option>
											<option value="moderador">Moderador</option>
										</select>
									</div>
									<div class="form-item">
										<span>Nome</span>
										<input type="text" name="nome">
									</div>
									<div class="form-item">
										<span>Sobrenome</span>
										<input type="password" name="sobrenome">
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
									<div class="form-item final-alter">
										<span>Senha Atual</span>
										<input type="password" name="senha">
									</div>
									<div class="enviar">
											<span>É necessário digitar a senha atual para adicionar um novo administrador</span>
											<button type="submit" class="enviar-login">Adicionar</button>
									</div>
									<?php if($error == 1){ ?>
									<p class="error">O administrador digitado já existe em nosso sistema</p>
									<?php } ?>
									<?php if($error == 2){ ?>
									<p class="error">O email do administrador digitado já existe em nosso sistema</p>
									<?php } ?>
									<?php if($error == 3){ ?>
									<p class="error">Houve um problema durante a conexão com o banco de dados</p>
									<?php } ?>
									<?php if($error == 4){ ?>
									<p class="error">A senha do administrador atual esta incorreta</p>
									<?php } ?>
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