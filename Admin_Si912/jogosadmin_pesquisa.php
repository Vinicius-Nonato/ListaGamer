<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	$termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

	$sql = "SELECT * FROM jogos WHERE nome like '%$termo%'";

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		

	$objDb = new db();
	$link = $objDb->mysql_connection();

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
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
						<h2>Gerenciamento de Jogos</h2>
					</div>
					<div class="container geren-jogos tabela-admin">
						<div class="row">
							<div class="col-md-8 search">
								<form method="post" action="formularios/direcionapesquisa.php">
									<input type="text" name="procurar" placeholder="Pesquisar...">
									<button class="button" type="submit">Pesquisar</button>
								</form>
							</div>
							<div class="col-md-4 aditionals">
								<div class="add-jogo">
									<a href="adicionarjogo.php"><button type="text">Adicionar Jogo</button></a>
								</div>
							</div>
						</div>
						<div class="row tabela-jogos">
							<table>
								<colgroup>
									<col style="width: 40%">
									<col style="width: 30%">
									<col style="width: 15%">
									<col style="width: 5%">
									<col style="width: 5%">
									<col style="width: 5%">
								</colgroup>
								<tbody>
									<tr class="titulos">
										<th>Nome</th>
										<th>Plataformas</th>
										<th>Produtora</th>
										<th>Distribuidora</th>
										<th>Url</th>
										<th>Status</th>
									</tr>
									<?php 
									$busca_bd = mysqli_query($link, $sql);
									if ($busca_bd) {
										while ($dados_lista = mysqli_fetch_array($busca_bd, MYSQLI_ASSOC)) {
											echo "<tr>";
											echo "<td><a href='editar_jogo.php?jogo=". $dados_lista["url"] ."' target='_blank' style='color: #000;'>". $dados_lista["nome"] ."</a></td>";
											echo "<td>". $dados_lista["plataforma"] ."</td>";
											echo "<td>". $dados_lista["produtora"] ."</td>";
											echo "<td>". $dados_lista["distribuidora"] ."</td>";
											echo "<td>". $dados_lista["url"] ."</td>";
											echo "<td>". $dados_lista["status"] ."</cairo_matrix_transform_distance(matrix, dx, dy)>";
											echo "</tr>";
										}
									}

									 ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>