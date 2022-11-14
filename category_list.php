<?php 
	session_start(); 

	require_once('conexao_db.php');

	$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 0;
	
	$sql_lista = "SELECT * FROM jogos";

	if($categoria == 0){
		$sql_lista = "SELECT * FROM jogos";
	}

	if($categoria == "play"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%ps4%'";
	}

	if($categoria == "xbox"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%xbox%'";
	}

	if($categoria == "nintendo"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%switch%'";
	}

	if($categoria == "pc"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%pc%'";
	}

	if($categoria == "retro"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%retro%'";
	}

	if($categoria == "mobile"){
		$sql_lista = "SELECT * FROM jogos WHERE plataforma like '%mobile%'";
	}

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql_lista);
	//FECHA A BUSCA DE DADOS		

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.linha-category .col-md-3 a{
			color: #000;
		}
		.linha-category .info-item span{
			padding-left: 10px !important;
		}
		.linha-category .col-md-3{
			margin-top: 15px;
		}
	</style>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main category_list">
		<div class="container">
			<div class="category-top">
				<div class="title" style="margin-bottom: 50px;">
					<?php
					if($categoria == 0){
						echo "<h2>Todos os Jogos</h2>";
					}

					if($categoria == "play"){
						echo "<h2>Playstation</h2>";
					}

					if($categoria == "xbox"){
						echo "<h2>Xbox</h2>";
					}

					if($categoria == "nintendo"){
						echo "<h2>Nintendo</h2>";
					}

					if($categoria == "pc"){
						echo "<h2>Pc</h2>";
					}

					if($categoria == "retro"){
						echo "<h2>Retro</h2>";
					}

					if($categoria == "mobile"){
						echo "<h2>Mobile</h2>";
					}

					?>
				</div>
				<div class="filter" style="display: none;">
					<div class="row">
						<div class="col-md-12">
							<div class="filter-item">FPS</div>
							<div class="filter-item">Aventura</div>
							<div class="filter-item">Souls Like</div>
							<div class="filter-item">Battle Royale</div>
							<div class="filter-item">Sobrevivência</div>
							<div class="filter-item">MOBA</div>
							<div class="filter-item">Tower Defense</div>
							<div class="filter-item">Corrida</div>
							<div class="filter-item">Esportes</div>
							<div class="filter-item">Indie</div>
							<div class="filter-item">Luta</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row linha-category">
				<?php  
				if($busca_bd){
					while ($dados_lista = mysqli_fetch_array($busca_bd, MYSQLI_ASSOC)) {
						$url = $dados_lista["url"];
						echo "<div class='col-md-3'>";
						echo "<a href='jogo.php?jogo=". $dados_lista["url"] ."'>";
							echo "<div class='item'>";
								echo "<div class='title'";
									echo "<span>". $dados_lista["nome"] ."</span>";
								echo "</div>";
								echo "<div class='content-item'>";
								$sql_inscritos = $sql = "SELECT * FROM dados_jogo WHERE url = '$url'";
								$busca_inscritos = mysqli_query($link, $sql_inscritos);
								$dados_outros = mysqli_fetch_array($busca_inscritos);
								$numerodelinhas = mysqli_num_rows($busca_inscritos);
								if ($numerodelinhas == 0) {
									$dados_inscritos = 0;
									$dados_nota = 0;
								}else{
									$dados_inscritos = $dados_outros["inscritos"];
									$dados_nota = $dados_outros["nota"];
								}

									echo "<div class='info-superior'>";
										echo "<div class='row'>";
											echo "<div class='col-md-6'>";
												echo "<span class='nota' style='text-align: left;'>nota: ".$dados_nota."</span>";
											echo "</div>";
											echo "<div class='col-md-6' style='text-align: left;'>";
												echo "<span class='inscritos'>inscritos: ".$dados_inscritos."</span>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
									echo "<div class='imagem'>";
										if ($dados_lista['imagem_jogo'] == NULL) {
											echo "<img src='fotos/default/jogo.png'>";
										}else{
											$nomefotoatual = $dados_lista['imagem_jogo'];
											echo "<img src='fotos/jogos/".$nomefotoatual."'>";
										}
									echo "</div>";
									echo "<div class='info-item'>";
										if ($dados_lista["distribuidora"] != "") {echo "<span>". $dados_lista["distribuidora"] ."</span>";}
										if ($dados_lista["produtora"] != "") {echo "<span>". $dados_lista["produtora"] ."</span>";}
										if ($dados_lista["data_lancamento"] != "") {echo "<span>". $dados_lista["data_lancamento"] ."</span>";}
										if ($dados_lista["plataforma"] != "") {echo "<span>". $dados_lista["plataforma"] ."</span>"; }
									echo "</div>";
									echo "<div class='info-inferior'>";
										echo "<div class='row'>";
											echo "<div class='col-md-12'>";
												echo "<div class='item-categoria'>". $dados_lista["genero"] ."</div>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
							echo "</a>";
						echo "</div>";
					}
				}else{
					header('Location: /');
				}
				?>
		</div>
	</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>