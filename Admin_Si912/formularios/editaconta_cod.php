<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE usuarios SET usuario = '$usuario' , nome = '$nome', sobrenome = '$sobrenome', email = '$email' WHERE usuario = '$usuario'";

	if(mysqli_query($link, $sql)){
		header('Location: ../editar_usuario.php?usuario='. $usuario .'&sucesso=1');
	}else{
		header('Location: ../editar_usuario.php?usuario='. $usuario .'error=2');
	}

?>