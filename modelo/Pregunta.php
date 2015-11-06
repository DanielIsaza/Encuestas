<?php 

require_once("Modelo.php");

Class Pregunta extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $numeroPregunta;
	private $respuesta;
	private $idActaConcertacion;
	/**
	*Constructor de la clase 
	*/
	public function Pregunta ()
	{
		$numeroPregunta = 0;
		$respuesta = "";
		$idActaConcertacion = 0;
	}
	/*Metodo con la consulta sql para agregar un estudiante*/
	public function agregarPregunta($data) {
        
        $sql = "INSERT into pregunta(
          numeroPregunta,
          respuesta,
          ActaConcertacion_idActaConcertacion)
          VALUES (
          '".$data['numero']."',
          '".$data['respuesta']."',
          ".$data['idActa'].")";
		
		$consulta = $this->query($sql);
       }
}