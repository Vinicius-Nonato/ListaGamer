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
	<style type="text/css">
		.jogo-solicitado .verifica-jogo{
			color: #FFF;
		}
		.jogo-solicitado .verifica-jogo .form-item input{
			width: 100%;
		}
		.jogo-solicitado .verifica-jogo .form-item select{
			width: 100%;
			height: 30px;
		}
		.jogo-solicitado .verifica-jogo .form-item textarea{
			width: 100%;
		}
		.jogo-solicitado .verifica-jogo .enviar{
			margin-top: 25px;
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
						<h2>Denuncia Referente ao úsuario Zezinho_123</h2>
					</div>
					<div class="container jogo-solicitado">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form class="verifica-jogo form-admin" name="verifica-jogo">
									<div class="form-item">
										<span>Nome do Denunciado</span>
										<input type="text" name="nome-jogo" value="Zezinho_123" readonly>
									</div>
									<div class="form-item">
										<span>Texto de Denuncia</span>
										<textarea type="text" rows="5" name="comprovacao" readonly>Este Usuário possui um nome ofensivo, pois ofendeu minha familia e toda uma raça com este nome</textarea>
									</div>
									<div class="form-item">
										<span>Imagem Anexada</span>
										<textarea type="textarea" rows="5" name="descricao" readonly>Imagem de Denuncia</textarea>
									</div>
									<div class="enviar">
											<a href="adicionarjogo.php"><button type="button" class="enviar-solicitacao">Ignorar Denuncia</button></a>
									</div>
									<div class="enviar">
											<a href="adicionarjogo.php"><button type="button" class="enviar-solicitacao">Banir Usuário</button></a>
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