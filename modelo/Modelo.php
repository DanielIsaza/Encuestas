<?php
	class Modelo
	{
		protected $conexion;
		protected $host;
		protected $db_name ;
		protected $username;
		protected $password;
		
		function __construct()
		{
		 $host = "localHost";
		 $db_name = "encuestas";
		 $username = "root";
		 $password = "r00t"; 
			try{
			
				$this->conexion = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

			}catch(PDOException $exception){

				echo "Conexion error".$exception->getMessage();
			}
		}

		protected function query($query)
		{
			$result = $this->conexion->prepare($query);
			$result->execute();
			return $result;
		}
}