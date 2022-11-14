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
							<a href='#'><div class="filter-item" >Meus Amigos</div></a>
							<a href='adiciona_amigos.php'><div class="filter-item" >Adicionar Amigos</div></a>
						</div>
					</div>
				</div>
				<div class="title">
					<h2>Amigos de <?php echo $usuario;?></h2>
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
						<col style="width: 30%">
					</colgroup>
					<tbody>
						<tr class="titulos">
							<th>#</th>
							<th>Foto de Perfil</th>
							<th>Usuario</th>
							<th>Ver Perfil</th>
						</tr>
						<?php

						$sql_amigos = "SELECT * FROM relacionamentos WHERE amigo2 = '$usuario'";
						$busca_amigos = mysqli_query($link, $sql_amigos);
						if ($busca_amigos) {
							while ($dados_amigo = mysqli_fetch_array($busca_amigos, MYSQLI_ASSOC)) {
							$nome_usuario = $dados_amigo['amigo1'];
							$sql_user = "SELECT * FROM usuarios WHERE usuario = '$nome_usuario'";
							$busca_user = mysqli_query($link, $sql_user);
							if ($busca_user) {
								$dados_user = mysqli_fetch_array($busca_user, MYSQLI_ASSOC);
								echo "<tr>";
								echo "<td>". $dados_user["id"] ."</td>";
								if ($dados_user['foto_perfil'] == NULL) {
									echo "<td><img style='width: 100%;' src='fotos/default/perfil.jpg'></td>";
								}
								else{
								echo "<td><img style='width: 100%;' src='fotos/perfis/". $dados_user["foto_perfil"] ."'></td>";
								}
								echo "<td>". $dados_user["usuario"] ."</td>";
								echo "<td style='text-align: center;'><a href='my_account.php?usuario=". $dados_user['usuario'] ."' style='color: blue; text-align: center;'>Perfil</a></td>";
								echo "</tr>";

							}
							echo $nome_usuario;
							?>
							<?php
							}
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