<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$grupo = $_POST['tipo_admin'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = md5($_POST['nova_senha']);
	$senha_antiga = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->mysql_connection();


	$usuario_existe = "SELECT * FROM admin_usuarios WHERE usuario_admin = '$usuario'";
	if(mysqli_query($link, $usuario_existe)){
		$resultado_busca_usuario = mysqli_query($link, $usuario_existe);
		$resultado_existe = mysqli_fetch_array($resultado_busca_usuario);
		if (isset($resultado_existe['usuario'])) {
			header('Location: ../addadmin.php?error=1');
			die();
		}
	}

	$email_existe = "SELECT * FROM admin_usuarios WHERE email = '$email'";
	if(mysqli_query($link, $email_existe)){
		$resultado_busca_email = mysqli_query($link, $email_existe);
		$resultado_existe_email = mysqli_fetch_array($resultado_busca_email);
		if (isset($resultado_existe_email['email'])) {
			header('Location: ../addadmin.php?error=2');
			die();
		}
	}


	$sql = "INSERT INTO admin_usuarios(usuario_admin, nome, sobrenome, email, grupo, senha) VALUES ('$usuario', '$nome', '$sobrenome', '$email', '$grupo', '$senha')";

	if ($senha_antiga != $_SESSION['senha']) {
		header('Location: ../addadmin.php?error=4');
	}

	if(mysqli_query($link, $sql)){
		header('Location: ../addadmin.php?error=5');
	}else{
		header('Location: ../addadmin.php?error=3');
	}

?>