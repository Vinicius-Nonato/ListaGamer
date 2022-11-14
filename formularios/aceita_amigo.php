<?php 

	session_start();

	require_once('../conexao_db.php');

	$manda = $_POST['manda'];
	$recebe = $_POST['recebe'];

	$objDb = new db();
	$link = $objDb->mysql_connection();

	$sql = "UPDATE relacionamentos SET status = 'A' WHERE amigo2 = '$manda' AND amigo1 = '$recebe'";
	$sql_aceita = "INSERT INTO relacionamentos(amigo1, amigo2, status) VALUES ('$manda', '$recebe', 'A')";

	if(mysqli_query($link, $sql)){
		if (mysqli_query($link, $sql_aceita)) {
			header('Location: ../my_account.php?&usuario='.$recebe.'');
		}
		header('Location: ../my_account.php?&usuario='.$recebe.'');
	}else{
		header('Location:../my_account.php?mensagem=2&usuario='.$recebe.'');
	}

?>