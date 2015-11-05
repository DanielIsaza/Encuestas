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
	*Lista de los espacios academicos presentes en la bd
	**/
	function listarGrupos()
	{
		$sql="SELECT idGrupo,NumeroGrupo FROM grupo";
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $dato['idGrupo'];
        	$datos[$i]['numero'] = $dato['NumeroGrupo'];
        	$i++;
        }

        return $datos;
	}
}