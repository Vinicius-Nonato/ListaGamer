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
	</style>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main ranking_list">
		<div class="container">
			<div class="category-top">
				<div class="filter-top">
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							<div class="filter-item">Jogos com Maiores Notas</div>
							<div class="filter-item">Jogos Mais Inscritos</div>
						</div>
					</div>
				</div>
				<div class="title">
					<h2>Jogos com Maiores Notas</h2>
				</div>
			</div>
			<div class="list-ranking">
				<table>
					<colgroup>
						<col style="width: 5%">
						<col style="width: 10%">
						<col style="width: 55%">
						<col style="width: 10%">
						<col style="width: 10%">
						<col style="width: 10%">
					</colgroup>
					<tbody>
						<tr class="titulos">
							<th>Posição</th>
							<th>Imagem</th>
							<th>Nome do Jogo</th>
							<th>Nota Geral</th>
							<th>Sua Nota</th>
							<th>Adicionar a Lista</th>
						</tr>
						<tr>
							<td class="nota">1#</td>
							<td class="imagem"><img src="fotos/game1.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.55</td>
							<td class="nota">10.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">2#</td>
							<td class="imagem"><img src="fotos/game2.png"></td>
							<td>Ori and the Will of the Wisps</td>
							<td class="nota">8.35</td>
							<td class="nota">8.5</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">3#</td>
							<td class="imagem"><img src="fotos/game3.png"></td>
							<td>Fortnite</td>
							<td class="nota">8.89</td>
							<td class="nota">8.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">4#</td>
							<td class="imagem"><img src="fotos/game4.png"></td>
							<td>Hades</td>
							<td class="nota">8.70</td>
							<td class="nota">#</td>
							<td class="addlist"><a href="#">Adicionar a Lista +</a></td>
						</tr>
						<tr>
							<td class="nota">5#</td>
							<td class="imagem"><img src="fotos/game5.png"></td>
							<td>Jump Force</td>
							<td class="nota">8.55</td>
							<td class="nota">9.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">6#</td>
							<td class="imagem"><img src="fotos/game1.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.5</td>
							<td class="nota">10.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">7#</td>
							<td class="imagem"><img src="fotos/game2.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.5</td>
							<td class="nota">#</td>
							<td class="addlist"><a href="#">Adicionar a Lista +</a></td>
						</tr>
						<tr>
							<td class="nota">8#</td>
							<td class="imagem"><img src="fotos/game3.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.5</td>
							<td class="nota">10.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
						<tr>
							<td class="nota">9#</td>
							<td class="imagem"><img src="fotos/game4.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.5</td>
							<td class="nota">#</td>
							<td class="addlist"><a href="#">Adicionar a Lista +</a></td>
						</tr>
						<tr>
							<td class="nota">10#</td>
							<td class="imagem"><img src="fotos/game5.png"></td>
							<td>Call of Duty Black Ops 2</td>
							<td class="nota">9.5</td>
							<td class="nota">10.0</td>
							<td class="addlist"><a href="#">Já Adicionado</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>