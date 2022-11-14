<?php 
	session_start(); 

	require_once('conexao_db.php');

	$sessao = $_SESSION['usuario_admin'];

	if ($sessao == NULL) {
		header('Location: /listagamer/Admin_Si912/index.php?error=1');
	}

	//FECHA A BUSCA DE DADOS		

	$estado = isset($_GET['estado']) ? $_GET['estado'] : 0;

	$sql = "SELECT * FROM admin_usuarios WHERE usuario_admin = '$sessao'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);

	if($busca_bd){
		$dados_admin = mysqli_fetch_array($busca_bd);
		if ($dados_admin['id_admin'] == NULL) {
			header('Location: /listagamer/Admin_Si912/index.php');	
		}
	}else{
		header('Location: /listagamer/Admin_Si912/index.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<script type="text/javascript">
		$(document).ready( function(){
			$('#alterar-button').click( function(){

				var campo_vazio = false;
				
				if($('#nome').val() == ''){
					$('#nome').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-nome').css({'display': 'block'});
				}else{
					$('#nome').css({'border': '2px solid #363636'});
					$('#required-nome').css({'display': 'none'});
				}

				if($('#sobrenome').val() == ''){
					$('#sobrenome').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-sobrenome').css({'display': 'block'});
				}else{
					$('#sobrenome').css({'border': '2px solid #363636'});
					$('#required-sobrenome').css({'display': 'none'});
				}

				if($('#email').val() == ''){
					$('#email').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-email').css({'display': 'block'});
				}else{
					$('#email').css({'border': '2px solid #363636'});
					$('#required-email').css({'display': 'none'});
				}

				/*if($('#senha').val() == ''){
					$('#senha').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-pass').css({'display': 'block'});
				}else{
					$('#senha').css({'border': '2px solid #363636'});
					$('#required-pass').css({'display': 'none'});
				}

				if($('#confirmar-senha').val() == ''){
					$('#confirmar-senha').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-conf-pass').css({'display': 'block'});
				}else{
					$('#confirmar-senha').css({'border': '2px solid #363636'});
					$('#required-conf-pass').css({'display': 'none'});
				}*/

				if($('#senha-atual').val() == ''){
					$('#senha-atual').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-senha-atual').css({'display': 'block'});
				}else{
					$('#confirmar-senha').css({'border': '2px solid #363636'});
					$('#required-senha-atual').css({'display': 'none'});
				}

				/*$("#confirmar-senha").on('keyup', function() {
				var password = $("#senha").val();
				var confirmPassword = $("#confirmar-senha").val();
				if (password != confirmPassword){
					campo_vazio = true;
					$igual = 1;
					$('#password-message').css({'display': 'block'});
				}else{
					$('#password-message').css({'display': 'none'});
				}
					
				
				});*/

				if (campo_vazio == true){
					return false;
				}

						

			});
		});
	</script>
	<style type="text/css">
		.error-input{
			color: red !important;
			font-size: 13px;
		}
		.admin-body .mensagem{
			background-color: #FFF;
		    padding: 10px;
		    margin-bottom: 10px;
		}
	</style>
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
						<h2>Minha Conta</h2>
					</div>
					<div class="container">
						<div class="row">
							<?php if ($estado == 1) { ?>
								<div class="col-md-12"><p class="mensagem">A conta de usuário foi a alterada com sucesso<p></div>
							<?php } ?>
							<?php if ($estado == 2) { ?>
								<div class="col-md-12"><p class="mensagem">Houve um erro de banco de dados, entre em contato com o desenvolvedor<p></div>
							<?php } ?>
							<?php if ($estado == 3) { ?>
								<div class="col-md-12"><p class="mensagem">A senha atual digitada não condiz com a senha atual, digite novamente<p></div>
							<?php } ?>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form method="post" action="formularios/edita_conta.php" class="alterar-admin" id="alterar-admin" name="alterar-admin">
									<div class="form-item">
										<span>Usuário</span>
										<input type="text" name="usuario_admin" id="usuario_admin" value="<?php if ($dados_admin['usuario_admin'] == NULL){echo "-";}else{echo $dados_admin['usuario_admin'];} ?>" disabled>
									</div>
									<div class="form-item">
										<span>Email</span>
										<input type="email" name="email" id="email" value="<?php if ($dados_admin['email'] == NULL){echo "-";}else{echo $dados_admin['email'];} ?>">
										<span id="required-email" class="error-input" style="display: none;">Campo Obrigatório</span>
									</div>
									<div class="form-item">
										<span>Nome</span>
										<input type="text" name="nome" id="nome" value="<?php if ($dados_admin['nome'] == NULL){echo "-";}else{echo $dados_admin['nome'];} ?>" >
										<span id="required-nome" class="error-input" style="display: none;">Campo Obrigatório</span>
									</div>
									<div class="form-item">
										<span>Sobrenome</span>
										<input type="text" name="sobrenome" id="sobrenome" value="<?php if ($dados_admin['sobrenome'] == NULL){echo "-";}else{echo $dados_admin['sobrenome'];} ?>">
										<span id="required-sobrenome" class="error-input" style="display: none;">Campo Obrigatório</span>
									</div>
									<div class="form-item">
										<span>Nova Senha</span>
										<input type="password" name="nova_senha" id="nova_senha">
									</div>
									<div class="form-item">
										<span>Confirmação de Nova Senha</span>
										<input type="password" name="nova_senha_conf" id="nova_senha_conf">
									</div>
									<div class="form-item final-alter">
										<span>Senha Atual</span>
										<input type="password" id="senha-atual" name="senha-atual">
										<span id="required-senha-atual" class="error-input" style="display: none;">Campo Obrigatório</span>
									</div>
									<div class="enviar">
											<span>É necessário digitar a senha atual para realizar alterações em sua conta</span>
											<button type="submit" class="enviar-login" id="alterar-button">Alterar</button>
									</div>
								</form>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>