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
}