<?php 

	session_start();

	require_once('../conexao_db.php');

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$usuario_existe = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	if(mysqli_query($link, $usuario_existe)){
		$resultado_busca_usuario = mysqli_query($link, $usuario_existe);
		$resultado_existe = mysqli_fetch_array($resultado_busca_usuario);
		if (isset($resultado_existe['usuario'])) {
			header('Location: ../cadastro.php?error=1');
			die();
		}
	}

	$email_existe = "SELECT * FROM usuarios WHERE email = '$email'";
	if(mysqli_query($link, $email_existe)){
		$resultado_busca_email = mysqli_query($link, $email_existe);
		$resultado_existe_email = mysqli_fetch_array($resultado_busca_email);
		if (isset($resultado_existe_email['email'])) {
			header('Location: ../cadastro.php?error=2');
			die();
		}
	}


	$sql = "INSERT INTO usuarios(usuario, nome, sobrenome, email, senha) VALUES ('$usuario', '$nome', '$sobrenome', '$email', '$senha')";

	if(mysqli_query($link, $sql)){
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nome'] = $nome;
		$_SESSION['sobrenome'] = $sobrenome;
		$_SESSION['email'] = $email;
		header('Location: ../my_account.php?logado=2&usuario='.$usuario.'');
	}else{
		header('Location: ../cadastro.php?error=3');
	}

?>