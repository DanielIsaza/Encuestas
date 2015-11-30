<?php 
require_once("Modelo.php");

Class PeriodoAcademico extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $id;
	private $periodo;

	/**
	* Lista de semestres 
	*/
	function listar()
	{
		$sql = "SELECT id,periodo FROM periodoacademico";

        $consulta = $this->query($sql);
        $datos = array();
        $i=0;

        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = array();
        	$datos[$i]['id'] = $dato['id'];
        	$datos[$i]['periodo'] = $dato['periodo'];
        	$i++;
        }

        return $datos;
	}

	function actual()
	{
		$sql = "SELECT MAX(id) FROM periodoacademico";

                $consulta = $this->query($sql);
                $datos = array();
                $i=0;

                while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
                {
                	$datos[$i] = array();
                	$datos[$i]['id'] = $dato['MAX(id)'];
                	$i++;
                }

                return $datos;
	}
}
?>