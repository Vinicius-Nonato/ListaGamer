<?php 

	session_start();

	require_once('../conexao_db.php');

	$senha_nova = "";

	$email = $_POST['email'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	if(isset($_POST['nova_senha'])){
		$senha_nova = md5($_POST['nova_senha']);
	}
	$usuario = $_SESSION['usuario_admin'];
	$senha = md5($_POST['senha-atual']);

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE admin_usuarios SET email = '$email' , nome = '$nome' ,sobrenome = '$sobrenome' WHERE usuario_admin = '$usuario'";

	$sql_senha = "SELECT * FROM admin_usuarios WHERE usuario_admin = '$usuario' AND senha = '$senha' ";
	$resultado_senha = mysqli_query($link, $sql_senha);

	$dados_usuario = mysqli_fetch_array($resultado_senha);


	if($resultado_senha){
		if (isset($dados_usuario['usuario_admin'])) {
			if(mysqli_query($link, $sql)){
				if ($senha_nova != "") {
					$sql_nova_senha = "UPDATE admin_usuarios SET senha = '$senha_nova' WHERE usuario_admin = '$usuario'";
					mysqli_query($link, $sql_nova_senha);	
				}
				header('Location: ../contaadmin.php?estado=1');
			}else{
				header('Location: ../contaadmin.php?estado=2');
			}

		}else{
			header('Location: ../contaadmin.php?estado=3');
		}
	}else{
		echo "falha";
	}



?>