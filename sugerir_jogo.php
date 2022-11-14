<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.category-top .filter-top{
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.category-top .filter-top .filter-item{
			background-color: #363636;
			border: 1px solid #363636;
			color: #FFF;
			margin-right: 10px;
			font-weight: bold;
			padding: 10px;
			display: inline-block;
		}
		.category-top .filter-top .filter-item:hover{
			background-color: #FFF;
			color: #363636;
			transition: 0.5s;
			cursor: pointer;
		}
		.category-top .filter-top .filter-item:hover{
			background-color: #FFF;
			color: #363636;
			transition: 0.5s;
			cursor: pointer;
		}
		.ranking_list .list-ranking table th{
			background-color: #363636;
			border: 1px solid #FFF;
			text-align: center;
			color: #FFF;
			font-weight: bold;
			padding: 10px 5px;
		}
		.ranking_list .list-ranking table td{
			border: 1px solid #363636;
			padding: 5px;
		}
		.ranking_list .list-ranking table .imagem img{
			width: 100px;
		}
		.ranking_list .list-ranking table .addlist{
			text-align: center;
		}
		.ranking_list .list-ranking table .nota{
			font-weight: bold;
			text-align: center;
		}
		.ranking_list .list-ranking table a{
			color: #000;
			text-decoration: underline;
		}
		.parcela{
			width: 100%;
			text-align: center;
			margin-top: 15px;
			margin-bottom: 15px;
		}
	</style>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main ranking_list">
		<div class="container">
			<div class="category-top">
				<div class="title">
					<h2>Sugerir Jogo</h2>
				</div>
			</div>
			<div class="list-ranking">
				<form method="post" id="formEditarPerfil" action="formularios/edita_perfil.php">
					<div class="parcela">
						<span>Nome do Jogo</span>
						<input type="text" name="nome_jogo">
					</div>
					<div class="parcela">
						<span>Plataforma</span>
						<input type="text" name="plataforma">
					</div>
					<div class="parcela">
						<span>Gênero</span>
						<input type="text" name="genero">
					</div>
					<div class="parcela">
						<span>Ano De Lançamento</span>
						<input type="text" name="ano_lancamento">
					</div>
					<div class="parcela">
						<span>Produtora</span>
						<input type="text" name="produtora">
					</div>
					<div class="parcela">
						<span>Distribuidora</span>
						<input type="text" name="distribuidora">
					</div>
				</form>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>