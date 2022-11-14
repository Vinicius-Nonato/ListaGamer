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
	</style>
	<script src="./js/glider/glider.min.js"></script>
	<link rel="stylesheet" href="./js/glider/glider.min.css">
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main">
		<div class="main-prin">
			<div class="container">
				<div class="slider">
					<div class="content slider-list slider-slider">
						<div class="glider-contain">
						  <div class="glider-slider">
						    <div class="game"><img src="fotos/slider.png"></div>
							<div class="game"><img src="fotos/slider2.png"></div>
							<div class="game"><img src="fotos/slider3.png"></div>
							<div class="game"><img src="fotos/slider4.png"></div>
						  </div>

						  <button aria-label="Previous" class="glider-prev glider-prev1"><</button>
						  <button aria-label="Next" class="glider-next glider-next1">></button>
						  <div role="tablist" class="dots dots1"></div>
						</div>
						<script type="text/javascript">
							new Glider(document.querySelector('.glider-slider'), {
							   slidesToShow: 1,
							   slidesToScroll: 1,
							   draggable: true,
							   duration: 1,
							   arrows: {
							     prev: '.glider-prev1',
							     next: '.glider-next1'
							   },
							   dots: '.dots1'
							 })
						</script>						
					</div>
				</div>
				<div class="list list1">
					<div class="title">
						<h2>Últimos Jogos Lançados</h2>
					</div>
					<div class="content slider-list">
						<div class="glider-contain">
						  <div class="glider-novos">
						    <div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
							<div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
						  </div>

						  <button aria-label="Previous" class="glider-prev glider-prev2"><</button>
						  <button aria-label="Next" class="glider-next glider-next2">></button>
						  <div role="tablist" class="dots dots2"></div>
						</div>
						<script type="text/javascript">
							new Glider(document.querySelector('.glider-novos'), {
							   slidesToShow: 5,
							   slidesToScroll: 2,
							   draggable: true,
							   duration: 1,
							   arrows: {
							     prev: '.glider-prev2',
							     next: '.glider-next2'
							   },
							   dots: '.dots2'
							 })
						</script>					
					</div>
				</div>
				<div class="list list2">
					<div class="title">
						<h2>Próximos Lançamentos</h2>
					</div>
					<div class="content slider-list">
						<div class="glider-contain">
						  <div class="glider-lancamentos">
						    <div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
							<div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
						  </div>

						  <button aria-label="Previous" class="glider-prev glider-prev3"><</button>
						  <button aria-label="Next" class="glider-next glider-next3">></button>
						  <div role="tablist" class="dots dots3"></div>
						</div>
						<script type="text/javascript">
							new Glider(document.querySelector('.glider-lancamentos'), {
							   slidesToShow: 5,
							   slidesToScroll: 2,
							   draggable: true,
							   duration: 1,
							   arrows: {
							     prev: '.glider-prev3',
							     next: '.glider-next3'
							   },
							   dots: '.dots3'
							 })
						</script>					
					</div>
				</div>
				<div class="list list3">
					<div class="title">
						<h2>Próximos Eventos</h2>
					</div>
					<div class="content slider-list">
						<div class="glider-contain">
						  <div class="glider-eventos">
						    <div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
							<div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
						  </div>

						  <button aria-label="Previous" class="glider-prev glider-prev4"><</button>
						  <button aria-label="Next" class="glider-next glider-next4">></button>
						  <div role="tablist" class="dots dots4"></div>
						</div>
						<script type="text/javascript">
							new Glider(document.querySelector('.glider-eventos'), {
							   slidesToShow: 5,
							   slidesToScroll: 2,
							   draggable: true,
							   duration: 1,
							   arrows: {
							     prev: '.glider-prev4',
							     next: '.glider-next4'
							   },
							   dots: '.dots4'
							 })
						</script>					
					</div>
				</div>
				<div class="notices">
					<div class="title">
						<h2>Últimas Notícias</h2>
					</div>
					<div class="content slider-list">
						<div class="glider-contain">
						  <div class="glider-noticias">
						    <div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
							<div class="game"><img src="fotos/game1.png"></div>
							<div class="game"><img src="fotos/game2.png"></div>
							<div class="game"><img src="fotos/game3.png"></div>
							<div class="game"><img src="fotos/game4.png"></div>
							<div class="game"><img src="fotos/game5.png"></div>
						  </div>

						  <button aria-label="Previous" class="glider-prev glider-prev5"><</button>
						  <button aria-label="Next" class="glider-next glider-next5">></button>
						  <div role="tablist" class="dots dots5"></div>
						</div>
						<script type="text/javascript">
							new Glider(document.querySelector('.glider-noticias'), {
							   slidesToShow: 5,
							   slidesToScroll: 2,
							   draggable: true,
							   duration: 1,
							   arrows: {
							     prev: '.glider-prev5',
							     next: '.glider-next5'
							   },
							   dots: '.dots5'
							 })
						</script>					
					</div>
				</div>
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
							<span class="notas">9,55</span>
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
							<span class="notas">9,35</span>
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
							<span class="notas">8,89</span>
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
							<span class="notas">8,70</span>
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
							<span class="notas">8,55</span>
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
							<span class="notas">20 inscritos</span>
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
							<span class="notas">16 inscritos</span>
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
							<span class="notas">14 inscritos</span>
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
							<span class="notas">13 inscritos</span>
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
							<span class="notas">10 inscritos</span>
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