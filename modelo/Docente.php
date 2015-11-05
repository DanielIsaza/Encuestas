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
	/*Metodo con la consulta sql para agregar un docente*/
	public function agregarDocente($data) {
        
        $sql = "INSERT into docente(
          cedulaDocente,
          nombreDocente,
          correoElectronico,
          Programa_idPrograma)
          VALUES (
          ".$data['cedulaDocente'].",
          ".$data['nombreDocente'].",
          '".$data['correoElectronico']."',
          ".$data['Programa_idPrograma'].")";
        $consulta = $this->query($sql);
       }
}