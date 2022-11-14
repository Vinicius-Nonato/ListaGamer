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
									<col style="width: 30%">
									<col style="width: 30%">
									<col style="width: 5%">
									<col style="width: 5%">
								</colgroup>
								<tbody>
									<tr class="titulos">
										<th>Denunciado Por</th>
										<th>Nome do Denunciado</th>
										<th>Nome do Relatador</th>
										<th>Data de Solicitação</th>
										<th>Verificar</th>
									</tr>
									<tr>
										<td>Nome Ofensivo</td>
										<td>Zezinho_123</td>
										<td>Nico_Nonato</td>
										<td>05/04/22 14:22:09</td>
										<td><a href="verificar-denuncia.php" class="verificar">Verificar</a></td>
									</tr>
									<tr>
										<td>Nome Ofensivo</td>
										<td>Zezinho_123</td>
										<td>Nico_Nonato</td>
										<td>05/04/22 14:22:09</td>
										<td><a href="verificar-denuncia.php" class="verificar">Verificar</a></td>
									</tr>
									<tr>
										<td>Nome Ofensivo</td>
										<td>Zezinho_123</td>
										<td>Nico_Nonato</td>
										<td>05/04/22 14:22:09</td>
										<td><a href="verificar-denuncia.php" class="verificar">Verificar</a></td>
									</tr>
									<tr>
										<td>Nome Ofensivo</td>
										<td>Zezinho_123</td>
										<td>Nico_Nonato</td>
										<td>05/04/22 14:22:09</td>
										<td><a href="verificar-denuncia.php" class="verificar">Verificar</a></td>
									</tr>
									<tr>
										<td>Nome Ofensivo</td>
										<td>Zezinho_123</td>
										<td>Nico_Nonato</td>
										<td>05/04/22 14:22:09</td>
										<td><a href="verificar-denuncia.php" class="verificar">Verificar</a></td>
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