<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);


	$sql = "SELECT * FROM admin_usuarios WHERE usuario_admin = '$usuario' AND senha = '$senha' ";

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$resultado = mysqli_query($link, $sql);

	if($resultado){
		$dados_usuario = mysqli_fetch_array($resultado);

		if (isset($dados_usuario['usuario_admin'])) {
			$_SESSION['usuario_admin'] = $dados_usuario['usuario_admin'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['sobrenome'] = $dados_usuario['sobrenome'];
			$_SESSION['email'] = $dados_usuario['email'];
			$_SESSION['senha'] = $dados_usuario['senha'];
			
			header('Location: ../painel.php');
			
		}else{
		
			header('Location: ../index.php?error=1');	
		}
		
	}else{
		echo "Erro na Consulta, entrar em contato com o administrador do site";
	}
?>