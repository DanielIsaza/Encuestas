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
	/*Metodo con la consulta sql para agregar un espacio academico*/
	public function agregarEspacioAcademico($data) {
        
        $sql = "INSERT into espacioacademico(
          nombre,
          Semestre_idSemestre)
          VALUES (
          '".$data['nombre']."',
          ".$data['Semestre_idSemestre'].")";
        $consulta = $this->query($sql);
       }
	/**
	* Metodo que busca los espacios academicos 
	* de un semestre
	*/
	function listarEspaciosAcademicos($idSemestre)
	{
		$sql="SELECT idEspacioAcademico,nombre FROM `espacioacademico` WHERE Semestre_idSemestre=".$idSemestre;
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch_array())
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $row['idEspacioAcademico'];
        	$datos[$i]['nombre'] = $row['nombre'];
        	$i++;
        }

        return $datos;
	}
}