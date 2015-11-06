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
	/**
	*Metodo que permite agregar el acta de concertacion 
	*/
	public function agregarActaConcertacion($data) 
	{
        
        $sql = "INSERT into actaconcertacion(
          numeroActaConcertacion,
          ano,
          Grupo_idGrupo,
          Estudiante_idEstudiante)
          VALUES (
          '".$data['numero']."',
          '".$data['ano']."',
          ".$data['idGrupo'].",
          ".$data['idEstudiante'].")";
        $consulta = $this->query($sql);
    }
    /*
    *Metodo que retorna el id de un acta previamente agregado
    */
    public function buscarActa($data)
    {
    	$sql="SELECT idActaConcertacion 
    			FROM actaconcertacion
    			WHERE numeroActaConcertacion=".$data['numero']."
    			and Grupo_idGrupo =".$data['idGrupo']."  and
    			 Estudiante_idEstudiante =".$data['idEstudiante'];

    	$consulta = $this->query($sql);
    	$datos = array();
    	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_ASSOC))
        {
        	$datos[$i] = $dato['idActaConcertacion'];
        	$i++;
        }
     	return $datos;
    }
}