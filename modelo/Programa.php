<?php 

require_once("Modelo.php");

Class Programa extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $codigoPrograma;
	private $nombrePrograma;
	private $correoPrograma;
	/**
	*Constructor de la clase 
	*/
	public function Programa ()
	{
		$codigoPrograma = 0;
		$nombrePrograma = "";
		$correoPrograma = "";
	}
}