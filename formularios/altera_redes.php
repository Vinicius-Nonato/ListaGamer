<?php 

	session_start();

	require_once('../conexao_db.php');

	$twitter = $_POST['twitter'];
	$instagram = $_POST['instagram'];
	$facebook = $_POST['facebook'];
	$tiktok = $_POST['tiktok'];
	$email_rede = $_POST['email_rede'];
	$twitch = $_POST['twitch'];
	$usuario = $_SESSION['usuario'];
	$senha = md5($_POST['senha-atual-redes']);

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE usuarios SET twitter = '$twitter', instagram = '$instagram' , facebook = '$facebook', email_rede = '$email_rede', twitch = '$twitch', tiktok = '$tiktok'  WHERE usuario = '$usuario'";

	$sql_senha = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";
	$resultado_senha = mysqli_query($link, $sql_senha);

	$dados_usuario = mysqli_fetch_array($resultado_senha);

	if($resultado_senha){
		if (isset($dados_usuario['usuario'])) {
			if(mysqli_query($link, $sql)){
				header('Location: ../editar_conta.php?success=2&usuario='.$usuario.'');
			}else{
				header('Location: ../editar_conta.php?error=1&usuario='.$usuario.'');
			}
		}else{
			header('Location: ../editar_conta.php?error=2&usuario='.$usuario.'');
		}
	}else{
		echo "falha";
	}



?>