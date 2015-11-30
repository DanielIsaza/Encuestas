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
	
	public function listaDocentes()
	{
		$sql="SELECT idDocente,nombreDocente FROM docente";
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $dato['idDocente'];
        	$datos[$i]['nombre'] = $dato['nombreDocente'];        	
        	$i++;
        }

        return $datos;
	}
}