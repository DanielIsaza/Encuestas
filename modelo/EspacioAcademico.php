<?php 

require_once("Modelo.php");

Class EspacioAcademico extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $nombre;
	private $idSemestre;
	/**
	*Constructor de la clase 
	*/
	public function EspacioAcademico ()
	{
		$idSemestre = 0;
		$nombre = "";
	}
	/**
	* Metodo que busca los espacios academicos 
	* de un semestre
	*/
	function listarEspaciosAcademicos()
	{
		$sql="SELECT idEspacioAcademico,nombre,Semestre_idSemestre FROM espacioacademico";
        $consulta = $this->query($sql);

        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
        	$datos[$i]['id'] = $dato['idEspacioAcademico'];
        	$datos[$i]['nombre'] = $dato['nombre'];
        	$datos[$i]['semestre'] = $dato['Semestre_idSemestre'];
        	$i++;
        }
        return $datos;
	}
}