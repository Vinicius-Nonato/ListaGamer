<?php 
	
	$termo = $_POST['search'];

	header('Location: ../pesquisa.php?termo='.$termo.'');

?>