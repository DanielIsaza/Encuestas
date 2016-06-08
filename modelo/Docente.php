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
		$sql="SELECT idDocente,nombreDocente FROM docente ORDER BY nombreDocente ASC";
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $dato['idDocente'];
        	$datos[$i]['nombre'] = utf8_decode($dato['nombreDocente']);        	
        	$i++;
        }

        return $datos;
	}

	public function infoDocente($idDocente,$idActa)
	{
		$sql ="SELECT nombreDocente, nombre, nombreSemestre FROM docente JOIN grupo ON idDocente = Docente_idDocente
				JOIN actaconcertacion ON idGrupo = Grupo_idGrupo JOIN espacioacademico ON idEspacioAcademico = EspacioAcademico_idEspacioAcademico JOIN semestre ON idSemestre = Semestre_idSemestre
					WHERE idDocente =".$idDocente."  AND idActaConcertacion =".$idActa;

		$consulta = $this->query($sql);
		$datos = array();
		 $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['nombreDocente'] = $dato['nombreDocente'];
        	$datos[$i]['nombre'] = $dato['nombre'];
        	$datos[$i]['nombreSemestre'] = $dato['nombreSemestre'];
        	$i++;
        }

        return $datos;
	}
}