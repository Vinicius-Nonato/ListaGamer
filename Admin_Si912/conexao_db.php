<?php 

class db{

	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $database = 'lista_gamer';

	public function mysql_connection(){

		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
		
		mysqli_set_charset($con, 'utf8');
		
		if(mysqli_connect_errno()){
			echo "Erro na conexão banco de dados";
			echo "</br>";
			echo mysqli_connect_errno();
		}	
	
		return $con;
	}
}

?>