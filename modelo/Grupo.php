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
	/**
	*Lista de los grupos presentes en la bd
	**/
	function listarGrupos()
	{
		$sql="SELECT idGrupo,NumeroGrupo,EspacioAcademico_idEspacioAcademico FROM grupo";
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['pk'] = $dato['idGrupo'];
        	$datos[$i]['nombre'] = $dato['NumeroGrupo'];
        	$datos[$i]['depende'] = $dato['EspacioAcademico_idEspacioAcademico'];
        	
        	$i++;
        }

        return $datos;
	}
	/**
	*Lista los grupos de un espacio academico
	*/
	function buscarGrupos($idEspacioAcademico)
	{
		$sql="SELECT idGrupo,NumeroGrupo,EspacioAcademico_idEspacioAcademico FROM grupo
				WHERE EspacioAcademico_idEspacioAcademico= ".$idEspacioAcademico;
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['pk'] = $dato['idGrupo'];
        	
        	$i++;
        }

        return $datos;
	}
}