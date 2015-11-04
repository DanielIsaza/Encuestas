<?php 

require_once("Modelo.php");

Class Grupo extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $idEspacioAcademico;
	private $idDocente;
	private $numeroGrupo;
	/**
	*Constructor de la clase 
	*/
	public function Grupo ()
	{
		$cedulaDocente = 0;
		$nombreDocente = 0;
		$idPrograma = 0;
		$correoElectronico = 0;
	}
}