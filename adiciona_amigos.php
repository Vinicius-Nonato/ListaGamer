<?php 
	session_start(); 

	require_once('conexao_db.php');

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

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
							<div class="filter-item">Meus Amigos</div>
							<div class="filter-item active">Adicionar Amigos</div>
						</div>
					</div>
				</div>
				<div class="title" style="margin-top: 20px; margin-bottom: 20px; text-align: center;">
					<form method="post" id="formEditar" action="formularios/direciona_pesquisa_amigo.php">
						<input class="search-input" type="text" name="search" style="width: 300px;" placeholder="Procurar Usuário">
						<button type="submit" class="button">Pesquisar</button>
					</form>
				</div>
			</div>
			<div class="resultados">
				<h3>Os usuários com o termo "<?php echo $termo; ?>" encontrados foram:</h3>
			</div>
			<div class="pesquisa">
				<div class="row">
			<?php
			$sql = "SELECT * FROM usuarios WHERE usuario like '%$termo%'";
			$busca_usuario = mysqli_query($link, $sql);

			if ($busca_usuario) {
				while ($dados_usuario = mysqli_fetch_array($busca_usuario, MYSQLI_ASSOC)) {
					echo "<div class='col-md-3' style='border: 1px solid #000; text-align: center; margin-left: 5px; margin-right: 5px;'>";
					if ($dados_usuario['foto_perfil'] == NULL) {
					echo "<a href='my_account.php?usuario=".$dados_usuario['usuario']."' target='_blank'><img style='width: 100%;' src='fotos/default/perfil.jpg'>";
					}
					else{
						echo "<a href='my_account.php?usuario=".$dados_usuario['usuario']."' target='_blank'><img style='width: 100%;' src='fotos/perfis/". $dados_usuario["foto_perfil"] ."'>";
					}
					echo "<span style='color: #000; margin-top: 10px; margin-bottom: 10px; text-align: center;width: 100%;'>". $dados_usuario['usuario'] ."</span>";
					echo "</div>";
				}
			}

			?>
				</div>
			</div>
		</div>
	</section>	
	<?php require 'html/footer.html'; ?>
</body>
</html>