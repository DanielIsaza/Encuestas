<?php 

require_once("Modelo.php");

Class Enunciado extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $numeroPregunta;
	private $enunciado;
	/**
	*Constructor de la clase 
	*/
	public function Enunciado ()
	{
		$numeroPregunta = 0;
		$enunciado = "";
	}
	/*Metodo con la consulta sql para agregar un enunciado*/
	public function agregarEnunciado($data) {
        
        $sql = "INSERT into enunciado(
          numeroPregunta,
          enunciado)
          VALUES (	
          ".$data['numeroPregunta'].",
          '".$data['enunciado']."'	)";
        $consulta = $this->query($sql);
       }

     public function listarEnunciados()
     {
     	$sql="SELECT enunciado FROM enunciado";
     	$consulta=$this->query($sql);
     	$datos=array();
     	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
        	$datos[$i]['enunciado'] = $dato['enunciado'];
        	$i++;
        }
        return $datos;
	}
     
}