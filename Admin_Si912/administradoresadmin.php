<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		


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
						<h2>Gerenciamento de Administradores</h2>
					</div>
					<div class="container geren-admin tabela-admin">
						<div class="row">
							<div class="col-md-6 search">
								<input type="text" name="procurar" placeholder="Pesquisar...">
							</div>
							<div class="col-md-6 aditionals">
								<div class="row">
									<div class="col-md-6 select-actions">
									</div>
									<div class="col-md-6">
										<div class="add-jogo">
											<a href="addadmin.php"><button type="text">Adicionar Administrador</button></a>
										</div>
										<div class=" filtrar">
											<button type="text">Filtrar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row tabela-jogos">
							<table>
								<colgroup>
									<col style="width: 5%">
									<col style="width: 30%">
									<col style="width: 25%">
									<col style="width: 25%">
									<col style="width: 15%">
								</colgroup>
								<tbody>
									<tr class="titulos">
										<th>Id</th>
										<th>Email</th>
										<th>Nome</th>
										<th>Sobrenome</th>
										<th>Grupo de Administrador</th>
									</tr>
									<tr>
										<td>1</td>
										<td>nico.nonato@gmail.com</td>
										<td>vinicius</td>
										<td>nonato</td>
										<td>Administrador-Geral</td>
									</tr>
									<tr>
										<td>2</td>
										<td>gustavo@gmail.com</td>
										<td>Gustavo</td>
										<td>de Souza</td>
										<td>Moderador</td>
									</tr>
									<tr>
										<td>3</td>
										<td>William@gmail.com</td>
										<td>William</td>
										<td>da Silva</td>
										<td>Moderador</td>
									</tr>
									<tr>
										<td>4</td>
										<td>nando@gmail.com</td>
										<td>Nando</td>
										<td>Soares</td>
										<td>Moderador</td>
									</tr>
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