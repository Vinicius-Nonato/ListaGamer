<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	$termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

	$sql = "SELECT * FROM usuarios WHERE usuario like '%$termo%' OR email like '%$termo%'";

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
						<h2>Gerenciamento de Usuários</h2>
					</div>
					<div class="container geren-jogos tabela-admin">
						<div class="row">
							<div class="col-md-8 search">
								<form method="post" action="formularios/direcionapesquisa_usuario.php">
									<input type="text" name="procurar" placeholder="Pesquisar...">
									<button class="button" type="submit">Pesquisar</button>
								</form>
							</div>
							<div class="col-md-4 aditionals">
								<div class="add-jogo">
									<a href="adicionarjogo.php"><button type="text">Adicionar Usuário</button></a>
								</div>
							</div>
						</div>
						<div class="row tabela-jogos">
							<table>
								<colgroup>
									<col style="width: 30%">
									<col style="width: 20%">
									<col style="width: 20%">
									<col style="width: 30%">
								</colgroup>
								<tbody>
									<tr class="titulos">
										<th>Usuario</th>
										<th>Nome</th>
										<th>Sobrenome</th>
										<th>Email</th>
									</tr>
									<?php 
									$busca_bd = mysqli_query($link, $sql);
									if ($busca_bd) {
										while ($dados_lista = mysqli_fetch_array($busca_bd, MYSQLI_ASSOC)) {
											echo "<tr>";
											echo "<td>". $dados_lista["usuario"] ."</td>";
											echo "<td><a href='editar_jogo.php?jogo=' target='_blank' style='color: #000;'>". $dados_lista["nome"] ."</a></td>";
											echo "<td>". $dados_lista["sobrenome"] ."</td>";
											echo "<td>". $dados_lista["email"] ."</td>";
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