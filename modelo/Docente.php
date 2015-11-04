<?php 

require_once("Modelo.php");

Class Docente extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $cedulaDocente;
	private $nombreDocente;
	private $correoElectronico;
	private $idPrograma;
	/**
	*Constructor de la clase 
	*/
	public function Docente ()
	{
		$cedulaDocente = 0;
		$nombreDocente = "";
		$idPrograma = 0;
		$correoElectronico = "";
	}
}