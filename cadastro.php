<?php  

	$error = isset($_GET['error']) ? $_GET['error'] : 0;

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<script type="text/javascript">
		
		$(document).ready( function(){
			$('#cadastrar').click( function(){

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

				if($('#confirmar-senha').val() == ''){
					$('#confirmar-senha').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-conf-pass').css({'display': 'block'});
				}else{
					$('#confirmar-senha').css({'border': '2px solid #363636'});
					$('#required-conf-pass').css({'display': 'none'});
				}

				$("#confirmar-senha").on('keyup', function() {
				var password = $("#senha").val();
				var confirmPassword = $("#confirmar-senha").val();
				if (password != confirmPassword){
					campo_vazio = true;
					$igual = 1;
					$('#password-message').css({'display': 'block'});
				}else{
					$('#password-message').css({'display': 'none'});
				}
					
				
				});

				if (campo_vazio == true){
					return false;
				}

						

			});
		});




	</script>
</head>
<body class="homepage cadastro">
	<?php require 'html/header.php'; ?>
	<section class="main">
		<div class="title">
			<h2>Criar Conta</h2>
		</div>
		<div class="formulario">
			<form method="post" id="formCadastro" action="formularios/registra_usuario.php">
				<div class="form-item">
					<span>Nome:</span>
					<input type="text" name="nome" id="nome">
					<span id="required-nome" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
				<div class="form-item">
					<span>Sobrenome:</span>
					<input type="text" name="sobrenome" id="sobrenome">
					<span id="required-sobrenome" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
				<div class="form-item">
					<span>Email:</span>
					<input type="email" name="email" id="email">
					<span id="required-email" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
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
				<div class="form-item">
					<span>Confirmar Senha:</span>
					<input type="password" name="confirmar-senha" id="confirmar-senha">
					<span id="required-conf-pass" class="error-input" style="display: none;">Campo Obrigatório</span>
				</div>
				<div class="enviar">
					<button type="submit" class="enviar" id="cadastrar">Cadastrar</button>
					<p class="error" id="password-message" style="display: none;">As senhas estão diferentes, verifique se as digitou corretamente</p>
					<?php if ($error == 1){ ?>
						<p class="error">O Nome de Usuário digitado já existe em nosso sistema, por favor digite outro nome</p>
					<?php } ?>
					<?php if ($error == 2){ ?>
						<p class="error">O Email digitado já existe em nosso sistema, por favor digite outro email</p>
					<?php } ?>
					<?php if ($error == 3){ ?>
						<p class="error">Houve um erro durante a criação de sua conta, por favor entre em contato com o administrador do site</p>
					<?php } ?>
				</div>
			</form>
		</div>
	</section>
	<?php require 'html/footer.html'; ?>
</body>
</html>