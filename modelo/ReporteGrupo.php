<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDF.php");

class ReporteGrupo
{
	private $pdf;

	public function ReporteGrupo()
	{
		$this->pdf = new PDF(); 
		 #Establecemos los márgenes izquierda, arriba y derecha: 
        $this->pdf->SetMargins(30, 25,30); 

        #Establecemos el margen inferior: 
        $this->pdf->SetAutoPageBreak(true,25); 
	}

	public function generarReporte($idGrupo)
	{
		$acta =  new ActaConcertacion();
		$bool = $acta->buscarGrupo($idGrupo);

		if((count($bool)) > 0)
		{
			$pregunta = new Pregunta();
		 	$datos = $pregunta->buscarInfoPregunta($idGrupo);
			
			$enunciado = new Enunciado();
			$preguntas = $enunciado->listarEnunciados();

			$this->pdf->titulo($datos,$this->pdf);
			
			$this->pdf->setSubtitulo('Acta Socializacion',$this->pdf);

			for($i=0;$i<(count($preguntas)-6);$i++)
			{
				$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],1,$idGrupo);
				$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
			}

			$this->pdf->setSubtitulo('Acta Concertacion',$this->pdf);
			
			for($i=6;$i<(count($preguntas)-2);$i++)
			{
				$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],2,$idGrupo);
				$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
			}

			$observaciones = $this->getObservaciones($pregunta,$idGrupo);
			$this->pdf->setSubtitulo('Observaciones',$this->pdf);
			for($i=0;$i<count($observaciones);$i++)
			{
				$this->pdf->setObservaciones($observaciones[$i],$this->pdf);
			}

			return $this->pdf;
		}
	}
	/*
	*Metodo que busca la cantidad de respuestas afirmativas y negativas de una pregunta
	*/
	public function respuestas($pregunta,$num,$tipoActa,$idGrupo)
	{
		$cantidad = array();
		$busqueda['idGrupo']=$idGrupo;
		$busqueda['tipoActa'] = $tipoActa;
		$busqueda['tipoRespuesta']=1;
		$busqueda['numeroPregunta']=$num;

		$cantidad[0] = $pregunta->cantPreguntas($busqueda)[0]['cantidad'];

		$busqueda['idGrupo']=$idGrupo;
		$busqueda['tipoActa'] = $tipoActa;
		$busqueda['tipoRespuesta']=0;
		$busqueda['numeroPregunta']=$num;
		$cantidad[1] = $pregunta->cantPreguntas($busqueda)[0]['cantidad'];

		return $cantidad;
	}

	public function getObservaciones($pregunta,$idGrupo)
	{
		$busqueda['idGrupo']=$idGrupo;
		$busqueda['numeroPregunta']=11;

		return $pregunta->obtenerRespuesta($busqueda);
	}

	public function descargar($nombre)
	{
		$this->pdf->descarga($this->pdf,$nombre);
	}

	public function getPDF()
	{
		return $this->pdf;
	}
}
?>