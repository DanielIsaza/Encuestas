<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDF.php");

class reporteDocente
{
	private $pdf;

	public function reporteDocente()
	{
		$this->pdf = new PDF(); 
		 #Establecemos los márgenes izquierda, arriba y derecha: 
        $this->pdf->SetMargins(30, 25,30); 

        #Establecemos el margen inferior: 
        $this->pdf->SetAutoPageBreak(true,25); 
	}

	public function generarReporte($idDocente)
	{
		$acta =  new ActaConcertacion();
		$bool = $acta->buscarDocente($idDocente);

		if((count($bool)) > 0)
		{
			$pregunta = new Pregunta();
		 	$datos = $pregunta->buscarInfoPreguntaDocente($idDocente);
			
			$enunciado = new Enunciado();
			$preguntas = $enunciado->listarEnunciados();

			$this->pdf->titulo($datos,$this->pdf);
			if((($this->respuestas($pregunta,$preguntas[0]['numeroPregunta'],1,$idDocente)[0]) > 0) or
				(($this->respuestas($pregunta,$preguntas[0]['numeroPregunta'],1,$idDocente)[1]) > 0) ) 
			{
				$this->pdf->AddPage();
				
				$this->pdf->setSubtitulo('Acta Socializacion',$this->pdf);

				for($i=0;$i<(count($preguntas)-6);$i++)
				{
					$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],1,$idDocente);
					$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
				}

				$observaciones = $this->getObservacionesSocializacion($pregunta,$idDocente);
				$this->pdf->setSubtitulo('Observaciones',$this->pdf);
				for($i=0;$i<count($observaciones);$i++)
				{
					$this->pdf->setObservaciones($observaciones[$i],$this->pdf);
				}
			}
			if((($this->respuestas($pregunta,$preguntas[6]['numeroPregunta'],2,$idDocente)[0]) > 0) or
				(($this->respuestas($pregunta,$preguntas[6]['numeroPregunta'],2,$idDocente)[1]) > 0) ) 
			{
				$this->pdf->AddPage();
				
				$this->pdf->setSubtitulo('Acta Concertacion',$this->pdf);
				
				for($i=6;$i<(count($preguntas)-2);$i++)
				{
					$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],2,$idDocente);
					$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
				}

				$observaciones = $this->getObservacionesConcertacion($pregunta,$idDocente);
				$this->pdf->setSubtitulo('Observaciones',$this->pdf);
				for($i=0;$i<count($observaciones);$i++)
				{
					$this->pdf->setObservaciones($observaciones[$i],$this->pdf);
				}
			}
			return $this->pdf;
		}
	}

	/*
	*Metodo que busca la cantidad de respuestas afirmativas y negativas de una pregunta
	*/
	public function respuestas($pregunta,$num,$tipoActa,$idDocente)
	{
		$cantidad = array();
		$busqueda['idDocente']=$idDocente;
		$busqueda['tipoActa'] = $tipoActa;
		$busqueda['tipoRespuesta']=1;
		$busqueda['numeroPregunta']=$num;

		$cantidad[0] = $pregunta->cantPreguntasDocente($busqueda)[0]['cantidad'];

		$busqueda['idDocente']=$idDocente;
		$busqueda['tipoActa'] = $tipoActa;
		$busqueda['tipoRespuesta']=0;
		$busqueda['numeroPregunta']=$num;
		$cantidad[1] = $pregunta->cantPreguntasDocente($busqueda)[0]['cantidad'];

		return $cantidad;
	}

	public function getObservacionesSocializacion($pregunta,$idDocente)
	{
		$busqueda['idDocente']=$idDocente;
		$busqueda['numeroPregunta']=11;

		return $pregunta->obtenerRespuestaDocente($busqueda);
	}


	public function getObservacionesConcertacion($pregunta,$idDocente)
	{
		$busqueda['idDocente']=$idDocente;
		$busqueda['numeroPregunta']=12;

		return $pregunta->obtenerRespuestaDocente($busqueda);
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