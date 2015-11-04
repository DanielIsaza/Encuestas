<?php 

require_once("Modelo.php");

Class ActaConcertacion extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $numeroActaConcertacion;
	private $año;
	private $idGrupo;
	private $idEstudiante;
	/**
	*Constructor de la clase 
	*/
	public function ActaConcertacion ()
	{
		$numeroActaConcertacion = 0;
		$año = "";
		$idGrupo = 0;
		$idGrupo = 0;
	}
}