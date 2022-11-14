<?php 

	session_start();

	require_once('../conexao_db.php');

	$manda = $_POST['manda'];
	$recebe = $_POST['recebe'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "DELETE FROM relacionamentos WHERE amigo1 = '$manda' AND amigo2 = '$recebe'";
	$sql_recusa = "DELETE FROM relacionamentos WHERE amigo2 = '$manda' AND amigo1 = '$recebe'";


	if(mysqli_query($link, $sql)){
		if (mysqli_query($link, $sql_recusa)) {
			header('Location: ../my_account.php?&usuario='.$recebe.'');
		}
		header('Location: ../my_account.php?&usuario='.$recebe.'');
	}else{
		header('Location:../my_account.php?mensagem=2&usuario='.$recebe.'');
	}

?>