<?php  
	$error = isset($_GET['error']) ? $_GET['error'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'html/head.html'; ?>
	<style type="text/css">
		.admin-box .error{
			font-size: 16px;
			width: initial !important;
			margin-top: 1px;
			color: #cc0000;
		}
	</style>
</head>
<body class="admin-body">
	<div class="admin-box">
		<div class="container formulario-admin">
			<div class="row logo-title">
				<h3 class="col-md-12">Logo</h3>
			</div>
			<form class="login-admin" method="post" action="formularios/entra_admin.php">
				<div class="form-item">
					<span>Administrador</span>
					<input type="text" name="usuario">
				</div>
				<div class="form-item">
					<span>Senha</span>
					<input type="password" name="senha">
				</div>
				<div class="enviar">
						<button type="submit" class="enviar-login">Entrar</button>
				</div>
			</form>
			<?php if($error == 1){ ?>
			<p class="error">As credenciais estão incorretas</p>
			<?php } ?>
		</div>
	</div>
</body>
</html>