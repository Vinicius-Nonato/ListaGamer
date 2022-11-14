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
						<h2>Jogo Sugerido por Nico_Nonato</h2>
					</div>
					<div class="container jogo-solicitado">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form class="verifica-jogo form-admin" name="verifica-jogo">
									<h3 class="title-imagens">Dados do Jogo</h3>
									<div class="form-item">
										<span>Nome do Jogo</span>
										<input type="text" name="nome-jogo" value="Hades" readonly>
									</div>
									<div class="form-item">
										<span>Links/Locais que comprovam a existência do Jogo</span>
										<textarea type="text" rows="5" name="comprovacao" readonly>https://store.steampowered.com/agecheck/app/1145360/</textarea>
									</div>
									<div class="form-item">
										<span>Descrição</span>
										<textarea type="textarea" rows="5" name="descricao" readonly>Desafie o deus dos mortos enquanto você batalha para sair do Submundo neste jogo roguelike dos mesmos criadores de Bastion, Transistor e Pyre.</textarea>
									</div>
									<div class="form-item">
										<span>Plataformas</span>
										<input type="text" name="plataformas" value="Pc, Xbox One, PS4, PS5, Xbox Series X, Nintendo Switch" readonly>
									</div>
									<div class="form-item">
										<span>Produtora</span>
										<input type="text" name="produtora" value="Supergiant Games" readonly>
									</div>
									<div class="form-item">
										<span>Data de Lançamento</span>
										<input type="date" name="data-lancamento" value="17/08/2020" readonly>
									</div>
									<div class="form-item">
										<span>Gêneros</span>
										<input type="text" name="genero" value="Roguelike, Indie, Ação" readonly>
									</div>
									<div class="enviar">
											<a href="adicionarjogo.php"><button type="button" class="enviar-solicitacao">Continuar com Criação do Jogo</button></a>
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