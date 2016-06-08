<?php 

require_once("Modelo.php");

Class Estudiante extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
  *--------------------------------------
	*Atributos de la clase estudiante
  *--------------------------------------
	*/
  //codigo del estudiante que se representa por el numero del documento de identidad
	private $codigoEstudiante;
  //Nombre completo del estudiante
	private $nombreEstudiante;
  //identificador del programa academico al cual pertenece el estudiante
	private $idPrograma;
	/**
	*Constructor de la clase 
	*/
	public function Estudiante ()
	{
		$codigoEstudiante = 0;
		$nombreEstudiante = "";
		$idPrograma = 0;
	}
	/*
  * Metodo con la consulta sql para agregar un estudiante
  */
	public function agregarEstudiante($data) 
	{        
        $sql = "INSERT into estudiante(
          codigoEstudiante,
          nombreEstudiante,
          Programa_idPrograma)
          VALUES (
          ".$data['codigoEstudiante'].",
          '".$data['nombreEstudiante']."',
          ".$data['Programa_idPrograma'].")";
        $consulta = $this->query($sql);
    }
     /**
     * metodo que permite buscar el id del estudiante a traves de su codigo 
     */
     public function buscarId($codigo)
     {
     	$sql = "SELECT idEstudiante FROM estudiante WHERE codigoEstudiante=".$codigo;
     	$consulta = $this->query($sql);
      $datos=array();
     	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = $dato['idEstudiante'];
        	$i++;
        }
     	return $datos;
     }
     /*
     * Metodo que permite identificar si un estudiante ya ingreso u na evaluacion 
     * de un docente
     */
     public function buscarEstudiante($codigoEstudiante,$numeroActa,$idGrupo)
     {
        $sql = "SELECT idEstudiante FROM estudiante join actaconcertacion on idEstudiante = Estudiante_idEstudiante join grupo on idGrupo = Grupo_idGrupo where codigoEstudiante = ".$codigoEstudiante."  and numeroActaConcertacion = ".$numeroActa." and idGrupo =".$idGrupo." and periodoAcademico_idPeriodo = (SELECT MAX( id ) FROM periodoacademico)";
        
        $consulta = $this->query($sql);
        $datos=array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
          $datos[$i] = $dato['idEstudiante'];
          $i++;
        }
      return $datos;
     }
}