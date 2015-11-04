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

	function listarGrupos($idEspacioAcademico)
	{
		$sql="SELECT idGrupo,NumeroGrupo FROM grupo WHERE EspacioAcademico_idEspacioAcademico=33".$idEspacioAcademico;
        $consulta = $this->query($sql);
     	$datos = array();
        $i=0;
        while($dato = $consulta->fetch_array())
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $row['idGrupo'];
        	$datos[$i]['numero'] = $row['NumeroGrupo'];
        	$i++;
        }

        return $datos;
	}
}