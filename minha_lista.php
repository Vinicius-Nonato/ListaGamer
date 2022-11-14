<?php 
	session_start(); 

	require_once('conexao_db.php');

	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : 0;
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_usuario = mysqli_fetch_array($busca_bd);
		if ($dados_usuario['usuario'] == NULL) {
			header('Location: /');	
		}
	}else{
		header('Location: /');
	}
	//FECHA A BUSCA DE DADOS		

	$usuario = $dados_usuario['usuario'];
	$success = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;
	$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.category-top .filter-top{
			border-bottom: 1px solid #363636;
    		text-align: center;
		}
		.category-top .filter-top .filter-item.active{
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
		.category-top .filter-top .filter-item{
			background-color: #FFF;
			border: 1px solid #363636;
			color: #363636;
			margin-right: 10px;
			font-weight: bold;
			padding: 10px;
			display: inline-block;
		}
		.category-top .filter-top .filter-item:hover{
			background-color: #363636;
			color: #FFF;
			transition: 0.5s;
			cursor: pointer;
		}
		.my_list .list-ranking table th{
			background-color: #363636;
			border: 1px solid #FFF;
			text-align: center;
			color: #FFF;
			font-weight: bold;
			padding: 10px 5px;
		}
		.my_list .list-ranking table td{
			border: 1px solid #363636;
			padding: 5px;
		}
		.my_list .list-ranking table .imagem img{
			width: 100px;
		}
		.my_list .list-ranking table .addlist{
			text-align: center;
		}
		.my_list .list-ranking table .nota{
			font-weight: bold;
			text-align: center;
		}
		.my_list .list-ranking table a{
			color: #000;
			text-decoration: underline;
		}
		.my_list .title h2{
			margin-top: 20px !important;
			margin-bottom: 15px !important;
		}
		.my_list .nome a{
			text-decoration: none !important;
		}
		.my_list .nome a:hover{
			text-decoration: underline !important;
		}
		.my_list .popup_editado{
			display: none;
			position: fixed;
			height: 250px;	
			background-color: #FFF;
			z-index: 99999;
		    margin: 0% 30%;
		    left: 0px;
		    width: 40%;
		}
		.my_list .popup_editado h3{
			color: #000;
			text-align: left;
		}
		.my_list .popup_editado .label-popup{
			color: #000;
			text-align: left;
		}
		.my_list .popup_editado .left-item select, .product-page .popup_editado .left-item input{
			float: left;
		}
		.my_list .botao-addjogo{
			float: right;
		    margin-top: 10px;
		    position: initial;
		    right: 0px;
		    padding: 5px;
		    cursor: pointer;
		    margin: 0px 5px;
		}
		.popup_jogo .fecha{
			float: right;
			cursor: pointer;
		}
		.popup_jogo .top-row{
			padding: 5px;
		}
		.popup_jogo .imagem-jogo img{
			height: 190px;
		}
		.popup_jogo .imagem-jogo{
			padding-left: 35px;
		}
		.popup_jogo .linha{
			margin-top: 12.5px;
			margin-bottom: 12.5px;
		}
		.popup_jogo select{
			height: 30px;
		}
		.popup_jogo .botao-addjogo{
			float: right;
		    margin-top: 10px;
		    right: 0px;
		    padding: 5px;
		    cursor: pointer;
		}
		.product-page .popup_jogo{
			display: none;
			position: fixed;
			height: 250px;	
			background-color: #FFF;
			z-index: 99999;
		    margin: 0% 30%;
		    left: 0px;
		    width: 40%;
		}
		.my_list #sombra_2{
			width: 100%;
			height: 100%;
			position: fixed;
			left: 0px;
			top: 0px;
			background-color: #000;
			z-index: 999;
			opacity: 0.5;
			display: none;
		}
	</style>
	<script type="text/javascript">
		function mostraPopupEdita(){
			document.getElementById("popup_editado").style.display = "block";
			document.getElementById("sombra_2").style.display = "block";
		}
		function escondePopupEdita(){
			document.getElementById("popup_editado").style.display = "none";
			document.getElementById("sombra_2").style.display = "none";
		}
		function naoMostraTabela(){
			document.getElementById("lista_gamer").style.display = "none";
		}
	</script>
</head>
<body class="homepage">
	<?php require 'html/header.php'; ?>
	<section class="main my_list">
		<div class="container">
			<div class="category-top">
				<div class="filter-top">
					<div class="row">
						<div class="col-md-12">
							<?php
							echo "<a href='minha_lista.php?usuario=". $usuario ."'><div class='filter-item ". ($filtro == 0 ? 'active' : '') ."'>Todos os Jogos</div></a>";
							echo "<a href='minha_lista.php?usuario=". $usuario ."&filtro=completado'><div class='filter-item ". ($filtro == "completado" ? 'active' : '') ."'>Completado</div></a>";
							echo "<a href='minha_lista.php?usuario=". $usuario ."&filtro=jogando'><div class='filter-item ". ($filtro == "jogando" ? 'active' : '') ."'>Jogando</div></a>";
							echo "<a href='minha_lista.php?usuario=". $usuario ."&filtro=pausado'><div class='filter-item ". ($filtro == "pausado" ? 'active' : '') ."'>Pausado</div></a>";
							echo "<a href='minha_lista.php?usuario=". $usuario ."&filtro=pensando'><div class='filter-item ". ($filtro == "pensando" ? 'active' : '') ."'>Pensando em Jogar</div></a>";
							echo "<a href='minha_lista.php?usuario=". $usuario ."&filtro=pulei'><div class='filter-item ". ($filtro == "pulei" ? 'active' : '') ."'>Pulei Fora</div></a>";
							?>
						</div>
					</div>
				</div>
				<div class="title">
					<h2>ListaGamer de <?php echo $usuario;?></h2>
				</div>
			</div>
			<?php if ($success == 1){ ?>
				<div class="success">
					<span>O jogo foi atualizado com sucesso!</span>
				</div>
			<?php } ?>
			<?php if ($success == 2){ ?>
				<div class="success">
					<span>O jogo foi removido com sucesso!</span>
				</div>
			<?php } ?>
			<div class="list-ranking">
				<table id="lista_gamer">
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
							<th>#</th>
							<th>Imagem</th>
							<th>Nome do Jogo</th>
							<th>Status</th>
							<th>Sua Nota</th>
							<th>Editar</th>
						</tr>
						<?php
						$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."'";	
						if($filtro == 0){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."'";	
						}
						if($filtro == "completado"){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."' AND status = 'Completado'";	
						}
						if($filtro == "jogando"){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."' AND status = 'Jogando'";	
						}
						if($filtro == "pausado"){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."' AND status = 'Pausado'";	
						}
						if($filtro == "pensando"){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."' AND status = 'Pensando em Jogar'";	
						}
						if($filtro == "pulei"){
							$sql_lista = "SELECT * FROM lista_gamer WHERE usuario = '". $usuario ."' AND status = 'Pulei Fora'";	
						}
						$numeros = 0;
						$temjogos = 0;
						$busca_lista = mysqli_query($link, $sql_lista);
						if($busca_lista){
							while ($dados_lista = mysqli_fetch_array($busca_lista, MYSQLI_ASSOC)) {
								$jogo_url = $dados_lista["jogo"];
								$sql_jogo = "SELECT * FROM jogos WHERE url = '$jogo_url'";
								$busca_jogo = mysqli_query($link, $sql_jogo);
								if($busca_jogo){
									$dados_jogo = mysqli_fetch_array($busca_jogo);
									$numeros ++;
									echo "<tr>";
									echo "<td class='nota'>". $numeros ."</td>";
									if ($dados_jogo["imagem_jogo"] != "") {
									echo "<td class='imagem'><a href='jogo.php?jogo=". $dados_jogo["url"] ."' target='_blank'><img src='fotos/jogos/". $dados_jogo["imagem_jogo"] ."'></a></td>";
									}else{
									echo "<td class='imagem'><a href='jogo.php?jogo=". $dados_jogo["url"] ."' target='_blank'><img src='fotos/default/jogo.png'></a></td>";
									}
									echo "<td class='nome'><a href='jogo.php?jogo=". $dados_jogo["url"] ."' target='_blank'>". $dados_jogo["nome"] ."</a></td>";
									echo "<td class='nota'>". $dados_lista["status"] ."</td>";
									echo "<td class='nota'>". $dados_lista["nota"] ."</td>";
									echo "<td class='addlist'><a href='#' onclick='mostraPopupEdita()'>Editar</a></td>";
									?>

									<div class="popup_editado popup_jogo" id="popup_editado">
										<div class="row top-row">
											<div class="col-md-10 nome"><h3 style="padding-left: 15px;"><?php if ($dados_jogo['nome'] == NULL){echo "-";}else{echo $dados_jogo['nome'];} ?></h3></div>
											<div class="col-md-2"><img class="fecha" src="fotos/default/fecha.png" onclick="escondePopupEdita()"></div>
										</div>
										<div class="row">
											<div class="col-md-3 imagem-jogo">
												<?php
												if ($dados_jogo['imagem_jogo'] == NULL) {
													echo "<img src='fotos/default/jogo.png'>";
												}else{
													$nomefotoatual = $dados_jogo['imagem_jogo'];
													echo "<img src='fotos/jogos/".$nomefotoatual."'>";
												}?>
											</div>
											<div class="col-md-9">
												<form method="post" action="formularios/editajogolista.php">
													<div class="col-md-12 linha row">
														<div class="col-md-5">
															<span class="nota-label label-popup">Minha Nota</span>
														</div>
														<div class="col-md-7 left-item">
															<?php  
															$notajogo = $dados_lista['nota'];
															$statusjogo = $dados_lista['status'];
															$tempojogo = $dados_lista['tempo'];
															$url = $dados_jogo['url'];													
															?>
															<select name="nota" id="nota">
																<option value="10" <?php if($notajogo == 10){ echo "selected"; } ?>>10</option>
																<option value="9.5" <?php if($notajogo == 9.5){ echo "selected"; } ?>>9.5</option>
																<option value="9.0" <?php if($notajogo == 9.0){ echo "selected"; } ?>>9.0</option>
																<option value="8.5" <?php if($notajogo == 8.5){ echo "selected"; } ?>>8.5</option>
																<option value="8.0" <?php if($notajogo == 8.0){ echo "selected"; } ?>>8.0</option>
																<option value="7.5" <?php if($notajogo == 7.5){ echo "selected"; } ?>>7.5</option>
																<option value="7.0" <?php if($notajogo == 7.0){ echo "selected"; } ?>>7.0</option>
																<option value="6.5" <?php if($notajogo == 6.5){ echo "selected"; } ?>>6.5</option>
																<option value="6.0" <?php if($notajogo == 6.0){ echo "selected"; } ?>>6.0</option>
																<option value="5.5" <?php if($notajogo == 5.5){ echo "selected"; } ?>>5.5</option>
																<option value="5.0" <?php if($notajogo == 5.0){ echo "selected"; } ?>>5.0</option>
																<option value="4.5" <?php if($notajogo == 4.5){ echo "selected"; } ?>>4.5</option>
																<option value="4.0" <?php if($notajogo == 4.0){ echo "selected"; } ?>>4.0</option>
																<option value="3.5" <?php if($notajogo == 3.5){ echo "selected"; } ?>>3.5</option>
																<option value="3.0" <?php if($notajogo == 3.0){ echo "selected"; } ?>>3.0</option>
																<option value="2.5" <?php if($notajogo == 2.5){ echo "selected"; } ?>>2.5</option>
																<option value="2.0" <?php if($notajogo == 2.0){ echo "selected"; } ?>>2.0</option>
																<option value="1.5" <?php if($notajogo == 1.5){ echo "selected"; } ?>>1.5</option>
																<option value="1.0" <?php if($notajogo == 1.0){ echo "selected"; } ?>>1.0</option>
																<option value="0.5" <?php if($notajogo == 0.5){ echo "selected"; } ?>>0.5</option>
																<option value="0.0" <?php if($notajogo == 0.0){ echo "selected"; } ?>>0.0</option>
																<option value="avaliar" <?php if($notajogo == 10){ echo "selected"; } ?>>Avaliar</option>
															</select>
														</div>
													</div>
													<div class="col-md-12 linha row">
														<div class="col-md-5">
															<span class="nota-label label-popup">Status</span>
														</div>
														<div class="col-md-7 left-item">
															<select name="status" id="status">
																<option value="Completado" <?php if($statusjogo == "Completado"){ echo "selected"; } ?>>Completado</option>
																<option value="Jogando" <?php if($statusjogo == "Jogando"){ echo "selected"; } ?>>Jogando</option>
																<option value="Pausado" <?php if($statusjogo == "Pausado"){ echo "selected"; } ?>>Pausado</option>
																<option value="Pensando em Jogar" <?php if($statusjogo == "Pensando em Jogar"){ echo "selected"; } ?>>Pensando em Jogar</option>
																<option value="Pulei Fora" <?php if($statusjogo == "Pulei Fora"){ echo "selected"; } ?>>Pulei Fora</option>
																<option value="Escolher" <?php if($statusjogo == "Escolher"){ echo "selected"; } ?>>Escolher ...</option>
															</select>
														</div>
													</div>
													<div class="col-md-12 linha row">
														<div class="col-md-5">
															<span class="nota-label label-popup">Tempo de Jogo</span>
														</div>
														<div class="col-md-7 left-item">
															<input type="text" name="tempo_jogado" <?php echo "value='". $tempojogo ."'"; ?>>
														</div>
														<?php


														?>
														<input style="display: none;" type="text" name="usuario" value="<?php if ($_SESSION['usuario'] == NULL){echo "-";}else{echo $_SESSION['usuario'];} ?>">
														<input style="display: none;" type="text" name="jogo" value="<?php echo $url; ?>">
														<input style="display: none;" type="text" name="pagina" value="1">
													</div>
													<?php
													if(!isset($_SESSION['usuario'])){
													?>
													<div class="col-md-12 linha row">
														<span style="position: absolute; right: 0px; margin-top: 20px;">É necessario logar para adicionar o jogo a sua lista</span>
													</div>
													<?php
													}else{
													?>
													<div class="col-md-12 linha row" style="display: block;">
														<button class="botao-addjogo" type="submit">Atualizar Jogo</button>
														</form>
														<form method="post" action="formularios/removejogolista.php">
															<input style="display: none;" type="text" name="usuario" value="<?php if ($_SESSION['usuario'] == NULL){echo "-";}else{echo $_SESSION['usuario'];} ?>">
															<input style="display: none;" type="text" name="jogo" value="<?php echo $url; ?>">
															<input style="display: none;" type="text" name="pagina" value="1">
															<button class="botao-addjogo" type="submit">Remover Jogo da Lista</button>
														</form>
													</div>
													<?php } ?>
												</div>
											</div>
										</div>
										<div id="sombra_2" onclick="escondePopupEdita()"></div>

									<?php
									$temjogos ++;
								}
							}
						}else{
							echo "não tem resultados";
						}
						//FECHA A BUSCA DE DADOS	

						if ($temjogos == 0) {
							echo "<div class='container'><p>O usuário ainda não tem jogos adicionados a esta lista.</p></div>";
							echo "<script>naoMostraTabela()</script>";
						}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>