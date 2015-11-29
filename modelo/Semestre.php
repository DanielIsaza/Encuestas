<?php 

require_once("Modelo.php");

Class Semestre extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $nombreSemestre;
	private $idPlanEstudio;
	/**
	*Constructor de la clase 
	*/
	public function Semestre ()
	{
		$idPlanEstudio = 0;
		$nombreSemestre = "";
	}
	/**
	* Lista de semestres 
	*/
	function listarSemestres()
	{
		$sql = "SELECT idSemestre,nombreSemestre,PlanEstudio_idPlanEstudio 
					FROM semestre";

        $consulta = $this->query($sql);
        $datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['pk'] = $dato['idSemestre'];
        	$datos[$i]['nombre'] = $dato['nombreSemestre'];
        	$datos[$i]['depende'] = $dato['PlanEstudio_idPlanEstudio'];
        	$i++;
        }

        return $datos;
	}
}