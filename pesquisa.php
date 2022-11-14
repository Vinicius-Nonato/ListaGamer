<?php

	require_once('conexao_db.php');

	$termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

	$sql = "SELECT * FROM jogos WHERE nome like '%$termo%'";

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.slider-list{
			width: 97%;
			max-width: 100%;
			margin: 0 auto;
		}
		.slider-list .game{
			text-align: center;
		}
		.slider-list .game img{
			width: 150px;
			text-align: center;
		}
		.slider-list button:focus{
			outline: none !important;
		}
		.glider-next{
			right: -27px !important;
		}
		.glider-prev{
			left: -27px !important;
		}
		.slider-slider .glider-next, .slider-slider .glider-prev{
			top: 40% !important;
		}
		.lista_jogos .col-md-3{
			display: inline-block;
			vertical-align: top;
			padding: 0px;
		}
		.lista_jogos .col-md-3 .dentro{
			border: 1px solid #363636;
			margin: 10px;
			height: 340px;
		}
		.lista_jogos .col-md-3 img{
			width: 100%;
		}
		.lista_jogos .col-md-3 .titulo{
			margin-top: 5px;
			padding: 0px 5px;
		}
		.lista_jogos .col-md-3 a{
			color: #000 !important;
		}
	</style>
	<script src="./js/glider/glider.min.js"></script>
	<link rel="stylesheet" href="./js/glider/glider.min.css">
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main">
		<div class="main-prin">
			<div class="container lista_jogos">
				<div class="col-md-12"><h3>Os resultados de pesquisa para '<?php echo $termo; ?>' foram:</h3></div>
				<?php
				$variavel_conta = 0;
				if($busca_bd){
					while ($dados_pesquisa = mysqli_fetch_array($busca_bd, MYSQLI_ASSOC)) {
							$variavel_conta ++;
							echo "<div class='col-md-3'>";
							echo "<a href='jogo.php?jogo=". $dados_pesquisa["url"] ."'>";
							echo "<div class='dentro'>";
							if ($dados_pesquisa["imagem_jogo"] != "") {
								echo "<img src='fotos/jogos/". $dados_pesquisa["imagem_jogo"] ."'>";
							}else{
								echo "<img src='fotos/default/jogo.png'>";
							}
							echo "<h5 class='titulo'>". $dados_pesquisa['nome']."</h5>";
							echo "</div>";
							echo "</a>";
							echo "</div>";
					}
					if ($variavel_conta == 0) {
						echo "<div class='col-md-12'><p>não foi possível encontra resultados para sua pesquisa</p></div>";
					}
				}else{
					echo "erro";
				}
				?>
			</div>
		</div>
		<div class="main-right">
			<div class="container">
				<div class="right-top right-top1">
					<div class="title">
						<h4>Maiores Notas</h3>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game1.png">
						</div>
						<div class="content">
							<span class="posicao">1#</span>
							<span class="nome">Call of Duty Black Ops 2</span>
							<span class="empresa">Activison</span>
							<span class="notas">10,00</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game2.png">
						</div>
						<div class="content">
							<span class="posicao">2#</span>
							<span class="nome">Ori and the Will of the Wisps</span>
							<span class="empresa">Moon Studios</span>
							<span class="notas">9,10</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game3.png">
						</div>
						<div class="content">
							<span class="posicao">3#</span>
							<span class="nome">Fortnite</span>
							<span class="empresa">Epic Games</span>
							<span class="notas">8,80</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game4.png">
						</div>
						<div class="content">
							<span class="posicao">4#</span>
							<span class="nome">Hades</span>
							<span class="empresa">Supergiant Games</span>
							<span class="notas">8,50</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game5.png">
						</div>
						<div class="content">
							<span class="posicao">5#</span>
							<span class="nome">Jump Force</span>
							<span class="empresa">Bandai Namco</span>
							<span class="notas">8,00</span>
						</div>
					</div>
				</div>
				<div class="right-top right-top2">
					<div class="title">
						<h4>Mais Inscritos</h3>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game1.png">
						</div>
						<div class="content">
							<span class="posicao">1#</span>
							<span class="nome">Call of Duty Black Ops 2</span>
							<span class="empresa">Activison</span>
							<span class="notas">10,00</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game2.png">
						</div>
						<div class="content">
							<span class="posicao">2#</span>
							<span class="nome">Ori and the Will of the Wisps</span>
							<span class="empresa">Moon Studios</span>
							<span class="notas">9,10</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game3.png">
						</div>
						<div class="content">
							<span class="posicao">3#</span>
							<span class="nome">Fortnite</span>
							<span class="empresa">Epic Games</span>
							<span class="notas">8,80</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game4.png">
						</div>
						<div class="content">
							<span class="posicao">4#</span>
							<span class="nome">Hades</span>
							<span class="empresa">Supergiant Games</span>
							<span class="notas">8,50</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game5.png">
						</div>
						<div class="content">
							<span class="posicao">5#</span>
							<span class="nome">Jump Force</span>
							<span class="empresa">Bandai Namco</span>
							<span class="notas">8,00</span>
						</div>
					</div>
				</div>
				<div class="right-top right-top3">
					<div class="title">
						<h4>Mais Inscritos em Jogos Competitivos</h3>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game1.png">
						</div>
						<div class="content">
							<span class="posicao">1#</span>
							<span class="nome">Call of Duty Black Ops 2</span>
							<span class="empresa">Activison</span>
							<span class="notas">10,00</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game2.png">
						</div>
						<div class="content">
							<span class="posicao">2#</span>
							<span class="nome">Ori and the Will of the Wisps</span>
							<span class="empresa">Moon Studios</span>
							<span class="notas">9,10</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game3.png">
						</div>
						<div class="content">
							<span class="posicao">3#</span>
							<span class="nome">Fortnite</span>
							<span class="empresa">Epic Games</span>
							<span class="notas">8,80</span>
						</div>
					</div>
					<div class="item item-par">
						<div class="imagem">
							<img src="fotos/game4.png">
						</div>
						<div class="content">
							<span class="posicao">4#</span>
							<span class="nome">Hades</span>
							<span class="empresa">Supergiant Games</span>
							<span class="notas">8,50</span>
						</div>
					</div>
					<div class="item">
						<div class="imagem">
							<img src="fotos/game5.png">
						</div>
						<div class="content">
							<span class="posicao">5#</span>
							<span class="nome">Jump Force</span>
							<span class="empresa">Bandai Namco</span>
							<span class="notas">8,00</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php require 'html/footer.html'; ?>
</body>
</html>