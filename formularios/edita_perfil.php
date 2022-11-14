<?php 

	session_start();

	require_once('../conexao_db.php');

	$foto_perfil = $_POST['foto-perfil'];
	$biografia = $_POST['biografia'];
	$status = $_POST['status'];
	$idade = $_POST['idade'];
	$apelido = $_POST['apelido'];
	$generos_favoritos = $_POST['generos_favoritos'];
	$consoles_favoritos = $_POST['consoles_favoritos'];
	$pais = $_POST['pais'];
	$usuario = $_SESSION['usuario'];
	$senha = md5($_POST['senha-atual-perfil']);

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE usuarios SET foto_perfil = '$foto_perfil', biografia = '$biografia' , status = '$status', idade = '$idade', apelido = '$apelido', generos_favoritos = '$generos_favoritos', consoles_favoritos = '$consoles_favoritos', pais = '$pais'  WHERE usuario = '$usuario'";

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