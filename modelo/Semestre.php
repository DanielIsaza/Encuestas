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
}