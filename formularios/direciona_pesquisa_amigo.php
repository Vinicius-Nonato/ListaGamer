<?php 
	
	$termo = $_POST['search'];

	header('Location: ../adiciona_amigos.php?termo='.$termo.'');

?>