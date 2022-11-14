<?php  

	session_start();

	$usuario_get = isset($_GET['usuario']) ? $_GET['usuario'] : 0;
	$usuario_session = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 0;

	$error = isset($_GET['error']) ? $_GET['error'] : 0;
	$success = isset($_GET['success']) ? $_GET['success'] : 0;

	if ($usuario_session == $usuario_get) {

	require_once('conexao_db.php');

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario_session'";	

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$busca_bd = mysqli_query($link, $sql);
	if($busca_bd){
		$dados_usuario = mysqli_fetch_array($busca_bd);
		if ($dados_usuario['usuario'] == NULL) {
			header('Location: /');	
		}
	}else{
		header('Location: /');
	}

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

			$('#editar-info').click( function(){

				var campo_vazio = false;

				if($('#senha-atual-perfil').val() == ''){
					$('#senha-atual-perfil').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-senha-atual-perfil').css({'display': 'block'});
				}else{
					$('#confirmar-senha-perfil').css({'border': '2px solid #363636'});
					$('#required-senha-atual-perfil').css({'display': 'none'});
				}	

			});

			$('#alterar-senha').click( function(){

				var campo_vazio = false;

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

				if($('#senha-atual-alter').val() == ''){
					$('#senha-atual-alter').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-senha-atual-alter').css({'display': 'block'});
				}else{
					$('#confirmar-senha').css({'border': '2px solid #363636'});
					$('#required-senha-atual-alter').css({'display': 'none'});
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

			$('#editar-redes').click( function(){

				var campo_vazio = false;

				if($('#senha-atual-redes').val() == ''){
					$('#senha-atual-redes').css({'border': '2px solid #cc0000'});
					campo_vazio = true;
					$('#required-senha-atual-redes').css({'display': 'block'});
				}else{
					$('#confirmar-senha-redes').css({'border': '2px solid #363636'});
					$('#required-senha-atual-redes').css({'display': 'none'});
				}	

			});

		});

		function openBloco(evt, blocoName) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("bloco");
		  for (i = 0; i < tabcontent.length; i++) {
		    tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tab-title");
		  for (i = 0; i < tablinks.length; i++) {
		    tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(blocoName).style.display = "block";
		  evt.currentTarget.className += " active";
		}


	</script>
	<style type="text/css">
		.main .edita_usuario{
			width: 90%;
		    margin-left: auto;
		    overflow: initial;
		    margin-right: auto;
		    margin-top: 0px;
		    border: 2px solid #363636;
		    padding: 50px;
		    border-radius: 5px;
		    margin-bottom: 30px;
		}

		.main .edita_usuario .form-item{
			margin: 10px 0px;
			margin-bottom: 30px;
		} 

		.main .edita_usuario .form-item span{
			display: block;
			width: 100%;
			margin-bottom: 10px;
			font-weight: bold;
		}

		.main .edita_usuario .form-item input{
			display: block;
			width: 100%;
			padding: 0px 10px;
			height: 30px;
		}

		.main .edita_usuario .esqueci-senha{
			width: 100%;
			text-align: right;
			font-size: 14px;
			margin-bottom: 10px;
		}
		.main .edita_usuario .enviar .enviar{
			width: 100%;
			background-color: #FFF;
			color: #000;
			font-weight: bold;
			box-shadow: none;
			text-transform: uppercase;
			letter-spacing: 0.75px;
			font-size: 18px; 
			padding: 10px 20px; 
			border-radius: 5px;
			border: 3px solid #000;
			cursor: pointer;
		}
		.main .edita_usuario .enviar .enviar:hover{
			background-color: #000;
			color: #FFF;
			transition: 0.5s;
		}

		.main .edita_usuario .enviar-login{
			width: 100%;
			background-color: #363636;
			color: #FFF;
			font-weight: bold;
			box-shadow: none;
			text-transform: uppercase;
			letter-spacing: 0.75px;
			font-size: 18px; 
			padding: 10px 20px; 
			border-radius: 5px;
			border: 3px solid #000;
			cursor: pointer;
		}

		.main .edita_usuario .enviar-login:hover{
			opacity: 75%;
			transition: 0.5s;
		}

		.main .edita_usuario .error{
			color: #ff0000;
			margin-top: 10px;
			font-size: 14px;
			margin-bottom: 0px;
		}

		.main .edita_usuario .error-input{
			position: absolute;
			font-size: 12px;
			width: initial !important;
			margin-top: 1px;
			color: #cc0000;
		}

		.main-edit .tab{
			width: 90%;
			margin: auto;
			margin-top: 20px;
		}
		.main-edit .tab .tab-title{
			display: inline-block;
		    border: 2px solid #000;
		    padding: 5px 10px;
		    margin: 0px 5px;
		}

		.main-edit .tab .tab-title:hover{
			background-color: #000;
		    color: #FFF;
		    transition: 0.5s;
		    cursor: pointer;
		}

		.main-edit .tab .tab-title.active{
			background-color: #000;
		    color: #FFF;
		    transition: 0.5s;
		    cursor: pointer;
		}
		.main-edit textarea{
			width: 100%;
		}
		.failure{
			background-color: red;
		    border: 2px solid #800000;
		    padding: 10px;
		    color: #FFF;
		    margin-bottom: 10px;
		}
		.main-edit .redes-sociais h6{
			font-size: 14px;
			margin-top: 5px;
		}
	</style>
</head>
<body class="homepage ">
	<?php require 'html/header.php'; ?>
	<section class="main main-edit">
		<div class="tab">
			<div class="tab-title" onclick="openBloco(event, 'usuario')">Informãções do Usuário</div>
			<div class="tab-title" onclick="openBloco(event, 'perfil')">Informações do Perfil</div>
			<div class="tab-title" onclick="openBloco(event, 'senha-bloco')">Alterar Senha</div>
			<div class="tab-title" onclick="openBloco(event, 'foto-perfil')">Alterar Foto de Perfil</div>
			<div class="tab-title active" onclick="openBloco(event, 'redes-sociais')">Alterar Redes Sociais</div>
		</div>
		<div class="edita_usuario">
			<?php if ($success == 1){ ?>
			<div class="success">
				<span>Você Alterou as Informações do usuário com sucesso!</span>
			</div>
			<?php } ?>
			<?php if ($success == 2){ ?>
			<div class="success">
				<span>Você Alterou as Informações do perfil com sucesso!</span>
			</div>
			<?php } ?>
			<?php if ($success == 3){ ?>
			<div class="success">
				<span>Você Alterou a sua senha com sucesso!</span>
			</div>
			<?php } ?>
			<div class="bloco info-pessoal" id="usuario" style="display: none;">
				<form method="post" id="formEditar" action="formularios/edita_usuario.php">
					<h2>Informações de Usuário</h2>
					<div class="form-item">
						<span>Email:</span>
						<input type="email" name="email" id="email" value="<?php if ($dados_usuario['email'] == NULL){echo "-";}else{echo $dados_usuario['email'];} ?>" disabled>
						<span id="required-email" class="error-input" style="display: none;">Campo Obrigatório</span>
					</div>
					<div class="form-item">
						<span>Usuário:</span>
						<input type="text" name="usuario" id="usuario" value="<?php if ($dados_usuario['usuario'] == NULL){echo "-";}else{echo $dados_usuario['usuario'];} ?>" disabled>
						<span id="required-user" class="error-input" style="display: none;">Campo Obrigatório</span>
					</div>
					<h2>Editar ou Adicionar Informações</h2>
					<div class="form-item">
						<span>Nome:</span>
						<input type="text" name="nome" value="<?php if ($dados_usuario['nome'] == NULL){echo "-";}else{echo $dados_usuario['nome'];} ?>" id="nome">
						<span id="required-nome" class="error-input" style="display: none;">Campo Obrigatório</span>
					</div>
					<div class="form-item">
						<span>Sobrenome:</span>
						<input type="text" name="sobrenome" value="<?php if ($dados_usuario['sobrenome'] == NULL){echo "-";}else{echo $dados_usuario['sobrenome'];} ?>" id="sobrenome">
						<span id="required-sobrenome" class="error-input" style="display: none;">Campo Obrigatório</span>
					</div>
					<h4>Para alterar os dados da conta é necessário inserir sua senha</h4>
					<div class="form-item">
						<span>Senha Atual:</span>
						<input type="password" name="senha-atual" id="senha-atual">
						<span id="required-senha-atual" class="error-input" style="display: none;">É necessário digitar a senha atual para realizar qualquer alteração</span>
						<?php if ($error == 2){ ?>
							<p class="error">Você digitou a senha atual incorreta</p>
						<?php } ?>
					</div>
					<div class="enviar">
						<button type="submit" class="enviar" id="cadastrar">Salvar Alterações</button>
						<p class="error" id="password-message" style="display: none;">As senhas estão diferentes, verifique se as digitou corretamente</p>
						<?php if ($error == 1){ ?>
							<p class="error">Não foi possível conectar-se ao banco de dados, entre em contato com o desenvolvedor do site</p>
						<?php } ?>
					</div>
				</form>
			</div>
			<div class="bloco info-pessoal" style="display: none;" id="perfil">
				<form method="post" id="formEditarPerfil" action="formularios/edita_perfil.php">
					<h2>Informações do Perfil</h2>
					<div class="form-item">
						<span>Biografia:</span>
						<textarea name="biografia" id="biografia"><?php if ($dados_usuario['biografia'] == NULL){echo "";}else{echo $dados_usuario['biografia'];} ?></textarea>
					</div>
					<div class="form-item">
						<span>Status:</span>
						<input type="text" name="status" id="status" value="<?php if ($dados_usuario['status'] == NULL){echo "";}else{echo $dados_usuario['status'];} ?>">
					</div>
					<div class="form-item">
						<span>Idade:</span>
						<input type="number" min="1" max="150" name="idade" value="<?php if ($dados_usuario['idade'] == NULL){echo "";}else{echo $dados_usuario['idade'];} ?>" id="idade">
					</div>
					<div class="form-item">
						<span>Apelido:</span>
						<input type="text" name="apelido" value="<?php if ($dados_usuario['apelido'] == NULL){echo "";}else{echo $dados_usuario['apelido'];} ?>" id="apelido">
					</div>
					<div class="form-item">
						<span>Generos de Jogos Preferidos:</span>
						<input type="text" name="generos_favoritos" value="<?php if ($dados_usuario['generos_favoritos'] == NULL){echo "";}else{echo $dados_usuario['generos_favoritos'];} ?>" id="generos_favoritos">
					</div>
					<div class="form-item">
						<span>Plataformas Preferidas:</span>
						<input type="text" name="consoles_favoritos" value="<?php if ($dados_usuario['consoles_favoritos'] == NULL){echo "";}else{echo $dados_usuario['consoles_favoritos'];} ?>" id="consoles_favoritos">
					</div>
					<div class="form-item">
						<span>País:</span>
						<input type="text" name="pais" value="<?php if ($dados_usuario['pais'] == NULL){echo "";}else{echo $dados_usuario['pais'];} ?>" id="pais">
						<span id="required-sobrenome" class="error-input" style="display: none;">Campo Obrigatório</span>
					</div>
					<h4>Para alterar os dados da conta é necessário inserir sua senha</h4>
					<div class="form-item">
						<span>Senha Atual:</span>
						<input type="password" name="senha-atual-perfil" id="senha-atual-perfil">
						<span id="required-senha-atual-perfil" class="error-input" style="display: none;">É necessário digitar a senha atual para realizar qualquer alteração</span>
						<?php if ($error == 2){ ?>
							<p class="error">Você digitou a senha atual incorreta</p>
						<?php } ?>
					</div>
					<div class="enviar">
						<button type="submit" class="enviar" id="editar-info">Salvar Alterações</button>
						<p class="error" id="password-message" style="display: none;">As senhas estão diferentes, verifique se as digitou corretamente</p>
						<?php if ($error == 1){ ?>
							<p class="error">Não foi possível conectar-se ao banco de dados, entre em contato com o desenvolvedor do site</p>
						<?php } ?>
					</div>
				</form>
			</div>
			<div class="bloco info-pessoal" id="senha-bloco" style="display: none;">
				<form method="post" id="formEditar" action="formularios/altera_senha.php">
					<h3>Alterar a senha</h3>
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
					<div class="form-item">
						<span>Senha Atual:</span>
						<input type="password" name="senha-atual-alter" id="senha-atual-alter">
						<span id="required-senha-atual-alter" class="error-input" style="display: none;">É necessário digitar a senha atual para realizar qualquer alteração</span>
						<?php if ($error == 2){ ?>
							<p class="error">Você digitou a senha atual incorreta</p>
						<?php } ?>
					</div>
					<div class="enviar">
						<button type="submit" class="enviar" id="alterar-senha">Salvar Alterações</button>
						<p class="error" id="password-message" style="display: none;">As senhas estão diferentes, verifique se as digitou corretamente</p>
						<?php if ($error == 1){ ?>
							<p class="error">Não foi possível conectar-se ao banco de dados, entre em contato com o desenvolvedor do site</p>
						<?php } ?>
					</div>
				</form>
			</div>
			<div class="bloco"  id="foto-perfil" style="display: none;">
				<?php 

				if(isset($_FILES['arquivo'])){
					$foto_perfil = $_FILES['arquivo'];
					$local = 'fotos/perfis/';
					$nomefoto = $foto_perfil['name'];
					$novonomefoto = $dados_usuario['usuario'];
					$extensao = strtolower(pathinfo($nomefoto, PATHINFO_EXTENSION));

					if ($foto_perfil['size'] > 4194304){
						echo "<div class='failure'><span>Tamanho de arquivo grande demais, aceitamos no máximo 4mb</span></div>";
					}else{
						if ($foto_perfil['error']) {
							echo "<div class='failure'><span>O arquivo não foi enviado, tente novamente ou contate novamente mais tarde</span></div>";
						}else{
							if ($extensao != "jpg" && $extensao != "png") {
								echo "<div class='failure'><span>O tipo de arquivo enviado não é um jpg ou um png, apenas estes dois formatos são aceitos neste site, tente novamente mais tarde</span></div>";
							}
						}
					}

					$senha_foto_perfil = md5($_POST['senha-atual-foto']);
					$usuario_foto = $_SESSION['usuario'];

					$sql_senha = "SELECT * FROM usuarios WHERE usuario = '$usuario_foto' AND senha = '$senha_foto_perfil' ";
					$resultado_senha = mysqli_query($link, $sql_senha);

					$dados_usuario_foto = mysqli_fetch_array($resultado_senha);

					$envia = "";

					if($resultado_senha){
							if (isset($dados_usuario_foto['usuario'])) {
								$envia = move_uploaded_file($foto_perfil["tmp_name"], $local . $novonomefoto . "." . $extensao);
							}
					}else{
							echo "<div class='failure'><span>A senha digitada esta incorreta, por favor digite novamente</span></div>";
						}


					$nomefotoextensao = $novonomefoto . "." . $extensao;

					if ($envia != '') {

						$sql_foto = "UPDATE usuarios SET foto_perfil = '$nomefotoextensao' WHERE usuario = '$usuario_foto'";

						if(mysqli_query($link, $sql_foto)){
							echo "<div class='success'><span>A Imagem do Perfil Foi alterada com sucesso</span></div>";
							}else{
								header('Location: ../editar_conta.php?error=1&usuario='.$usuario_foto.'');
							}
						}else{
							echo "<div class='failure'><span>A senha digitada esta incorreta, por favor digite novamente</span></div>";
						}

					}

				?>
				<form enctype="multipart/form-data" method="POST" action="">
					<?php $nomefotoatual = $dados_usuario['foto_perfil']; ?>
					<h3>Alterar Foto de Perfil</h3>
					<h5>Para que a imagem aparece em boa qualidade é encessario enviar uma imagem de resolução minima 200x200, e de preferência nas mesmas dimensões</h5>
					<div class="form-item">
						<?php echo "<img style='width: 200px;height: 200px; display: inline-block;' src='fotos/perfis/".$nomefotoatual."'>"; ?>
						<input style="display: inline-block;width: auto; " type="file" name="arquivo">
					</div>
					<h5>Para alterar os dados da conta é necessário inserir sua senha</h5>
					<div class="form-item">
						<span>Senha Atual:</span>
						<input type="password" name="senha-atual-foto" id="senha-atual-foto">
						<span id="required-senha-atual" class="error-input" style="display: none;">É necessário digitar a senha atual para realizar qualquer alteração</span>
					</div>
					<div class="form-item">
						<button type="submit" name="upload">Enviar Foto</button>
					</div>
				</form>
			</div>
			<div class="bloco redes-sociais" id="redes-sociais">
				<form method="post" id="formEditarPerfil" action="formularios/altera_redes.php">
					<h2>Minhas Redes Sociais</h2>
					<div class="form-item">
						<span>Twitter:</span>
						<input type="text" name="twitter" id="twitter" value="<?php if ($dados_usuario['twitter'] == NULL){echo "";}else{echo $dados_usuario['twitter'];} ?>">
						<h6>Para inserir o link da sua conta do twitter é necessário colocar apenas o que vem depois do arroba como no exemplo "@conta", vai ficar "conta"</h6>
					</div>
					<div class="form-item">
						<span>Instagram:</span>
						<input type="text" name="instagram" value="<?php if ($dados_usuario['instagram'] == NULL){echo "";}else{echo $dados_usuario['instagram'];} ?>" id="instagram">
						<h6>Para inserir o link da sua conta do instagram é necessário colocar apenas o que vem depois do arroba como no exemplo "@conta", vai ficar "conta"</h6>
					</div>
					<div class="form-item">
						<span>Facebook:</span>
						<input type="text" name="facebook" value="<?php if ($dados_usuario['facebook'] == NULL){echo "";}else{echo $dados_usuario['facebook'];} ?>" id="facebook">
						<h6>Para inserir o link da sua conta do facebook é necessário ir em seu perfil e copiar o que vem depois do link "https://www.facebook.com/"</h6>
					</div>
					<div class="form-item">
						<span>Email:</span>
						<input type="text" name="email_rede" value="<?php if ($dados_usuario['email_rede'] == NULL){echo "";}else{echo $dados_usuario['email_rede'];} ?>" id="email_rede">
					</div>
					<div class="form-item">
						<span>Twitch:</span>
						<input type="text" name="twitch" value="<?php if ($dados_usuario['twitch'] == NULL){echo "";}else{echo $dados_usuario['twitch'];} ?>" id="twitch">
						<h6>Para inserir o link da twitch é necessário inserir apenas o nome do seu usuário na plataforma da twitch</h6>
					</div>
					<div class="form-item">
						<span>Tiktok:</span>
						<input type="text" name="tiktok" value="<?php if ($dados_usuario['tiktok'] == NULL){echo "";}else{echo $dados_usuario['tiktok'];} ?>" id="tiktok">
						<span id="required-sobrenome" class="error-input" style="display: none;">Campo Obrigatório</span>
						<h6>Para inserir o link da sua conta no tiktok é necessário inserir o nome da sua com o @ na frente, assim como é exibido no aplicativo</h6>
					</div>
					<h4>Para alterar os dados da conta é necessário inserir sua senha</h4>
					<div class="form-item">
						<span>Senha Atual:</span>
						<input type="password" name="senha-atual-redes" id="senha-atual-redes">
						<span id="required-senha-atual-redes" class="error-input" style="display: none;">É necessário digitar a senha atual para realizar qualquer alteração</span>
						<?php if ($error == 2){ ?>
							<p class="error">Você digitou a senha atual incorreta</p>
						<?php } ?>
					</div>
					<div class="enviar">
						<button type="submit" class="enviar" id="editar-redes">Salvar Alterações</button>
						<p class="error" id="password-message" style="display: none;">As senhas estão diferentes, verifique se as digitou corretamente</p>
						<?php if ($error == 1){ ?>
							<p class="error">Não foi possível conectar-se ao banco de dados, entre em contato com o desenvolvedor do site</p>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php require 'html/footer.html'; ?>
	<?php }else{
		header('Location: /');
	} ?>
</body>
</html>