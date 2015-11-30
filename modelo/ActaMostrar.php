<?php 

require_once("Modelo.php");

Class ActaMostrar extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase acta concertacion
	*/
	private $id;
	private $mostrar;

	public function listar()
	{
		$sql="SELECT id,mostrar FROM actamostrar";
     	$consulta=$this->query($sql);
     	$datos=array();
     	$i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
        	$datos[$i]['id'] = $dato['id'];
        	$datos[$i]['mostrar'] = $dato['mostrar'];
        	$i++;
        }
        return $datos;
	}
	public function activarSocializacion()
	{
		$sql ="UPDATE encuestas.actamostrar SET mostrar = 1 WHERE actamostrar.id = 1";
     	$consulta=$this->query($sql);

     	$sql ="UPDATE encuestas.actamostrar SET mostrar = 0 WHERE actamostrar.id= 2";
     	$consulta=$this->query($sql);
	}
	public function activarConcertacion()
	{
		$sql ="UPDATE encuestas.actamostrar SET mostrar = 0 WHERE actamostrar.id = 1";
     	$consulta=$this->query($sql);

     	$sql ="UPDATE encuestas.actamostrar SET mostrar = 1 WHERE actamostrar.id= 2";
     	$consulta=$this->query($sql);

	}
	public function desactivar()
	{
		$sql ="UPDATE encuestas.actamostrar SET mostrar = 0 WHERE actamostrar.id = 1";
     	$consulta=$this->query($sql);

     	$sql ="UPDATE encuestas.actamostrar SET mostrar = 0 WHERE actamostrar.id= 2";
     	$consulta=$this->query($sql);

	}
}