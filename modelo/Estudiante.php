<?php 

require_once("Modelo.php");

Class Estudiante extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $codigoEstudiante;
	private $nombreEstudiante;
	private $idPrograma;
	/**
	*Constructor de la clase 
	*/
	public function Estudiante ()
	{
		$codigoEstudiante = 0;
		$nombreEstudiante = "";
		$idPrograma = 0;
	}
	/*Metodo con la consulta sql para agregar un estudiante*/
	public function agregarEstudiante($data) 
	{        
        $sql = "INSERT into estudiante(
          codigoEstudiante,
          nombreEstudiante,
          Programa_idPrograma)
          VALUES (
          ".$data['codigoEstudiante'].",
          '".$data['nombreEstudiante']."',
          ".$data['Programa_idPrograma'].")";
        $consulta = $this->query($sql);
    }
     /**
     *
     */
     public function buscarId($codigo)
     {
     	$sql = "SELECT idEstudiante FROM estudiante WHERE codigoEstudiante=".$codigo;
     	$consulta = $this->query($sql);

     	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = $dato['idEstudiante'];
        	$i++;
        }
     	return $datos;
     }
}