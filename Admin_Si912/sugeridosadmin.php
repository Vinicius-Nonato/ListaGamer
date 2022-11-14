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
						<h2>Jogos Sugeridos por Usuários</h2>
					</div>
					<div class="container geren-jogos tabela-admin">
						<div class="row tabela-jogos tabela-solicitacao">
							<table>
								<colgroup>
									<col style="width: 30%">
									<col style="width: 25%">
									<col style="width: 15%">
									<col style="width: 15%">
									<col style="width: 5%">
									<col style="width: 5%">
									<col style="width: 5%">
								</colgroup>
								<tbody>
									<tr class="titulos">
										<th>Nome do Jogo</th>
										<th>Plataformas</th>
										<th>Empresa</th>
										<th>Nome do Usuário</th>
										<th>Ano Lançamento</th>
										<th>Verificar</th>
										<th>Excluir</th>
									</tr>
									<tr>
										<a href="Solicitacaoadmin.php">
										<td>Jogo Que não existe</td>
										<td>Xbox 360, PS3, Xbox One, PC</td>
										<td>Empresa ficticia</td>
										<td>vinicius_login</td>
										<td>2022</td>
										<td><a href="solicitacaoadmin.php" class="verificar">Verificar</a></td>
										<td><a href="#" class="excluir">Excluir</a></td>
										</a>
									</tr>
									<tr>
										<td>Call of Duty Black Ops 3</td>
										<td>Xbox SeriesX, PS4, Xbox One, PC</td>
										<td>Activision</td>
										<td>vinicius_login</td>
										<td>2019</td>
										<td><a href="solicitacaoadmin.php" class="verificar">Verificar</a></td>
										<td><a href="#" class="excluir">Excluir</a></td>
									</tr>
									<tr>
										<td>Fifa 42</td>
										<td>Pc, Mobile, Xbox One, PS4, PS5, Xbox Series X, Nintendo Switch</td>
										<td>EA Sports</td>
										<td>Bin</td>
										<td>2021</td>
										<td><a href="solicitacaoadmin.php" class="verificar">Verificar</a></td>
										<td><a href="#" class="excluir">Excluir</a></td>
									</tr>
									<tr>
										<td>Bloons TD6</td>
										<td>Pc, Mobile</td>
										<td>Supergiant Games</td>
										<td>vinicius_login</td>
										<td>2022</td>
										<td><a href="solicitacaoadmin.php" class="verificar">Verificar</a></td>
										<td><a href="#" class="excluir">Excluir</a></td>
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