<?php  

	$error = isset($_GET['error']) ? $_GET['error'] : 0;

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<script type="text/javascript">
		
		$(document).ready( function(){
			$('#enviar_login').click( function(){
				
				var campo_vazio = false;

				if($('#usuario').val() == ''){
					$('#usuario').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-user').css({'display': 'block'});
				}else{
					$('#usuario').css({'border': '2px solid #363636'});
					$('#required-user').css({'display': 'none'});
				}

				if($('#senha').val() == ''){
					$('#senha').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-pass').css({'display': 'block'});
				}else{
					$('#senha').css({'border': '2px solid #363636'});
					$('#required-pass').css({'display': 'none'});
				}

				if (campo_vazio){
					return false;
				}

			});
		});

	</script>
</head>
<body class="homepage login">
	<?php require 'html/header.php'; ?>
	<section class="main">
		<div class="title">
			<h2>Faça seu Login</h2>
		</div>
		<div class="formulario">
			<form id="formLogin" method="post" action="formularios/valida_usuario.php">
				<div class="form-item">
					<span>Usuário:</span>
					<input type="text" name="usuario" id="usuario">
					<span id="required-user" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
				<div class="form-item">
					<span>Senha:</span>
					<input type="password" name="senha" id="senha">
					<span id="required-pass" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
				<div class="esqueci-senha">
					<a href="#">Esqueci minha senha?</a>
				</div>
				<div class="enviar">
					<button id="enviar_login" type="submit" class="enviar-login">Entrar</button>
				</div>
				<?php 

				if ($error == 1) {
				?>
				<p class="error">O usuário e senha estão incorretos, verifique se os dados foram digitados corretamente</p>
				<?php
				}
				if ($error == 2) {
				?>
				<p class="error">A senha está inválida digite novamente ou recupere a senha</p>
				<?php
				}
				if ($error == 3) {
				?>
				<p class="error">Para acessar está página é necessário primeiramente realizar o login no site</p>
				<?php
				}
				?>
			</form>
		</div>
	</section>
	<?php require 'html/footer.html'; ?>
</body>
</html>