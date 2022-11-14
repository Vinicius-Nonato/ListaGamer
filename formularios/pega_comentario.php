<?php 
	
	session_start();

	require_once('../conexao_db.php');


	$objDb = new db();
	$link = $objDb->mysql_connection();

	$perfil = $_POST['perfil'];

	$sql = "SELECT * FROM comentarios_perfil WHERE perfil = '$perfil'";

	$resultado = mysqli_query($link, $sql);

	if ($resultado) {
	 	while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	 		echo "<div class='comentario-div'>";
	 		echo "<span class='usuario'>". $registro['usuario'] ."</span>";
	 		echo "<span class='data'>". $registro['data_comentario'] ."</span>";
	 		echo "<p class='comentario'>". $registro['comentario'] ."</p>";
	 		echo "</div>";
	 	}
	 } else{
	 	echo "erro";
	 }

?>