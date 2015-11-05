<?php 

require_once("Modelo.php");

Class ActaConcertacion extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase acta concertacion
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

	public function agregarActaConcertacion($data) {
        
        $sql = "INSERT into actaconcertacion(
          numeroActaConcertacion,
          año,
          Grupo_idGrupo,
          Estudiante_idEstudiante)
          VALUES (
          '".$data['numeroActaConcertacion']."',
          '".$data['año']."',
          ".$data['Grupo_idGrupo'].",
          ".$data['Estudiante_idEstudiante'].")";
        $consulta = $this->query($sql);
       }
}