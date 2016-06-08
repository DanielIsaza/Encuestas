<?php 

require_once("Modelo.php");

Class PlanEstudio extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $nombrePlanEstudio;
	private $idPrograma;
	/**
	*Constructor de la clase 
	*/
	public function PlanEstudio ()
	{
		$nombrePlanEstudio = "";
		$idPrograma = 0;
	}
	/*
	* Método que permite listar los planes de estudio
	*/
	public function listarPlanes()
	{
		$sql="SELECT idPlanEstudio,nombrePlanEstudio FROM planestudio";
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['pk'] = $dato['idPlanEstudio'];
        	$datos[$i]['nombre'] = $dato['nombrePlanEstudio'];
        	
        	$i++;
        }

        return $datos;
	}
}