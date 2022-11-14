<?php 

	session_start();

	require_once('../conexao_db.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$sql_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$resultado = mysqli_query($link, $sql);
	$resultado_usuario = mysqli_query($link, $sql_usuario);

	if($resultado){
		$dados_usuario = mysqli_fetch_array($resultado);

		if (isset($dados_usuario['usuario'])) {
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['sobrenome'] = $dados_usuario['sobrenome'];
			$_SESSION['email'] = $dados_usuario['email'];
			
			header('Location: ../my_account.php?usuario='.$_SESSION['usuario'].'');
			
		}else{
			if ($resultado_usuario) {
				$dados_usuario_error = mysqli_fetch_array($resultado_usuario);
				if (isset($dados_usuario_error['usuario'])) {
					header('Location: ../login.php?error=2');
				}else{
					header('Location: ../login.php?error=1');
				}
			}else{
				header('Location: ../login.php?error=1');
			}
			
		}
		
	}else{
		echo "Erro na Consulta, entrar em contato com o administrador do site";
	}
?>