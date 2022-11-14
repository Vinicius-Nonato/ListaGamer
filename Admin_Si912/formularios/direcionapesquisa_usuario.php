<?php 
	
	$termo = $_POST['procurar'];

	header('Location: ../useradmin_pesquisa.php?termo='.$termo.'');

?>