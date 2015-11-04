<?php 

require_once("Modelo.php");

Class Enunciado extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $numeroPregunta;
	private $enunciado;
	/**
	*Constructor de la clase 
	*/
	public function Enunciado ()
	{
		$numeroPregunta = 0;
		$enunciado = "";
	}
}