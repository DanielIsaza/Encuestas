<?php 

require_once("Modelo.php");

Class EspacioAcademico extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $nombre;
	private $idSemestre;
	/**
	*Constructor de la clase 
	*/
	public function EspacioAcademico ()
	{
		$idSemestre = 0;
		$nombre = "";
	}
}