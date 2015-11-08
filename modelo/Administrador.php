<?php
require_once("Modelo.php");

class Administrador extends Modelo
{
	public $login;
	public $password;

	function __construct()
	{
		parent::__construct();
	}

	public function Administrador()
	{
		$this->login = "";
		$this->password = "";
	}
	

	public function isAdmin($data)
	{
		$sql = "SELECT login FROM administrador WHERE 
				login =".$data['login']." and password=".$data['pass'];
		$consulta = $this->query($sql);

		$datos=array();
     	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
        	$datos[$i]['login'] = $dato['login'];
        	$i++;
        }
        return $datos;

	}
}
?>