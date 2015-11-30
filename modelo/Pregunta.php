<?php 

require_once("Modelo.php");

Class Pregunta extends Modelo
{
	function __construct()
	{
		parent::__construct();
	}
	/**
	*Atributos de la clase estudiante
	*/
	private $numeroPregunta;
	private $respuesta;
	private $idActaConcertacion;
	/**
	*Constructor de la clase 
	*/
	public function Pregunta ()
	{
		$numeroPregunta = 0;
		$respuesta = "";
		$idActaConcertacion = 0;
	}
	/*Metodo con la consulta sql para agregar un estudiante*/
	public function agregarPregunta($data) {
        
        $sql = "INSERT into pregunta(
          numeroPregunta,
          respuesta,
          ActaConcertacion_idActaConcertacion)
          VALUES (
          '".$data['numero']."',
          '".$data['respuesta']."',
          ".$data['idActa'].")";
		
		      $consulta = $this->query($sql);
       }

       public function buscarInfoPregunta($idGrupo)
       {
       	 $sql= "SELECT espacioacademico.nombre,grupo.NumeroGrupo,docente.nombreDocente,grupo.idGrupo 
       	 		 FROM grupo JOIN espacioacademico ON espacioacademico.idEspacioAcademico=grupo.EspacioAcademico_idEspacioacademico
       	 		  JOIN docente ON docente.idDocente = grupo.Docente_idDocente WHERE grupo.idGrupo =".$idGrupo;
       	 $consulta = $this->query($sql);

       	$datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
        	$datos[$i]['espacioAcademico'] = $dato['nombre'];
        	$datos[$i]['numeroGrupo'] = $dato['NumeroGrupo'];
        	$datos[$i]['docente'] = $dato['nombreDocente'];
          $datos[$i]['idGrupo'] = $dato['idGrupo'];

        	$i++;
        }
        return $datos;
       }

       public function buscarInfoPreguntaDocente($idDocente)
       {
         $sql= "SELECT docente.nombreDocente
          FROM grupo JOIN espacioacademico ON espacioacademico.idEspacioAcademico=grupo.EspacioAcademico_idEspacioacademico
           JOIN docente ON docente.idDocente = grupo.Docente_idDocente WHERE docente.idDocente=".$idDocente;
         $consulta = $this->query($sql);

        $datos = array();
        $i=0;
        while($dato = $consulta->fetch(PDO::FETCH_BOTH))
        {
          $datos[$i]['espacioAcademico'] = "";
          $datos[$i]['numeroGrupo'] = "";
          $datos[$i]['docente'] = $dato['nombreDocente'];
          $datos[$i]['idGrupo'] = "";

          $i++;
        }
        return $datos;
       }
       /*
       *Metodo que permite contar la cantidad de respuestas de un tipo para determinada pregunta
       */
       public function cantPreguntas($datos)
       {
       	 $sql="SELECT count(respuesta) from grupo join actaconcertacion on grupo.idGrupo = actaconcertacion.Grupo_idGrupo 
              join pregunta on actaconcertacion.idActaConcertacion = pregunta.ActaConcertacion_idActaConcertacion 
              where idgrupo=".$datos['idGrupo']." and numeroActaConcertacion = ".$datos['tipoActa']."
              and numeroPregunta=".$datos['numeroPregunta']."  
              and respuesta=".$datos['tipoRespuesta'];
       
         	$consulta = $this->query($sql);
          
         	$datos = array();
          $i=0;
          while($dato = $consulta->fetch(PDO::FETCH_BOTH))
          {
          	$datos[$i]['cantidad'] = $dato['count(respuesta)'];
          	$i++;
          }
          return $datos;  
       }
       /*
       *Metodo que permite contar la cantidad de respuestas de un tipo para determinada pregunta
       */
       public function cantPreguntasDocente($datos)
       {
         $sql="SELECT count(respuesta) from grupo join actaconcertacion on grupo.idGrupo = actaconcertacion.Grupo_idGrupo 
         join pregunta on actaconcertacion.idActaConcertacion = pregunta.ActaConcertacion_idActaConcertacion 
         where grupo.Docente_idDocente=".$datos['idDocente']." and numeroActaConcertacion =  ".$datos['tipoActa']."
          and numeroPregunta=".$datos['numeroPregunta']." and respuesta=".$datos['tipoRespuesta'];
       
          $consulta = $this->query($sql);
          
          $datos = array();
          $i=0;
          while($dato = $consulta->fetch(PDO::FETCH_BOTH))
          {
            $datos[$i]['cantidad'] = $dato['count(respuesta)'];
            $i++;
          }
          return $datos;  
       }
       /**
       *Metodo que permite obtener el valor de las respuestas ingresadas
       */
       public function obtenerRespuesta($datos)
       {
          $sql="SELECT respuesta from grupo join actaconcertacion on grupo.idGrupo = actaconcertacion.Grupo_idGrupo 
              join pregunta on actaconcertacion.idActaConcertacion = pregunta.ActaConcertacion_idActaConcertacion 
                where grupo.idGrupo=".$datos['idGrupo']." and numeroPregunta=".$datos['numeroPregunta'];

              $consulta = $this->query($sql);
          
          $datos = array();
          $i=0;
          while($dato = $consulta->fetch(PDO::FETCH_BOTH))
          {
            $datos[$i]['respuesta'] = $dato['respuesta'];
            $i++;
          }
          return $datos;
        }
        /**
       *Metodo que permite obtener el valor de las respuestas ingresadas
       */
       public function obtenerRespuestaDocente($datos)
       {
          $sql="SELECT respuesta from grupo join actaconcertacion on grupo.idGrupo = actaconcertacion.Grupo_idGrupo 
              join pregunta on actaconcertacion.idActaConcertacion = pregunta.ActaConcertacion_idActaConcertacion 
              where grupo.Docente_idDocente=".$datos['idDocente']." and numeroPregunta=".$datos['numeroPregunta'];

              $consulta = $this->query($sql);
          
          $datos = array();
          $i=0;
          while($dato = $consulta->fetch(PDO::FETCH_BOTH))
          {
            $datos[$i]['respuesta'] = $dato['respuesta'];
            $i++;
          }
          return $datos;
        }
}