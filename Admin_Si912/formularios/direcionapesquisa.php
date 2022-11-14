<?php 
	
	$termo = $_POST['procurar'];

	header('Location: ../jogosadmin_pesquisa.php?termo='.$termo.'');

?>