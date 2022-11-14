<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		


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
						<h2>Atualizar Dados</h2>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<a href="formularios/atualiza_dados_form.php"><button class="button">Atualizar dados</button></a>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>