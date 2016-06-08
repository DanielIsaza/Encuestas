<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDF.php");
include_once("../modelo/PeriodoAcademico.php");

class ReporteGrupo
{
	private $pdf;
	private $periodo;

	public function ReporteGrupo()
	{
		$this->pdf = new PDF(); 

		$this->periodo = new PeriodoAcademico();
		 #Establecemos los márgenes izquierda, arriba y derecha: 
        $this->pdf->SetMargins(30, 25,30); 

        #Establecemos el margen inferior: 
        $this->pdf->SetAutoPageBreak(true,25);

	}

	public function generarReporte($idGrupo,$periodo)
	{
		$acta =  new ActaConcertacion();
		$bool = $acta->buscarGrupo($idGrupo,$periodo);
		
		if((count($bool)) > 0)
		{
			$pregunta = new Pregunta();
		 	$datos = $pregunta->buscarInfoPregunta($idGrupo);
			
			$enunciado = new Enunciado();
			$preguntas = $enunciado->listarEnunciados(1);

			$this->pdf->titulo($datos,$this->pdf);
			if((($this->respuestas($pregunta,$preguntas[1]['numeroPregunta'],1,$idGrupo)[0]) > 0) or
				(($this->respuestas($pregunta,$preguntas[1]['numeroPregunta'],1,$idGrupo)[1]) > 0) ) 
			{
				$this->pdf->AddPage();
				
				$this->pdf->setSubtitulo('Acta Socializacion',$this->pdf);

				for($i=1;$i<=(count($preguntas));$i++)
				{
					if($preguntas[$i]['numeroPregunta'] != 11)
					{
						$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],1,$idGrupo);
						$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
					}
				}

				$observaciones = $this->getObservacionesSocializacion($pregunta,$idGrupo);
				$this->pdf->setSubtitulo('Observaciones',$this->pdf);
				for($i=0;$i<count($observaciones);$i++)
				{
					$this->pdf->setObservaciones($observaciones[$i],$this->pdf);
				}
			}

			$preguntas = $enunciado->listarEnunciados(2);
			
			if((($this->respuestas($pregunta,$preguntas[1]['numeroPregunta'],2,$idGrupo)[0]) > 0) or
				(($this->respuestas($pregunta,$preguntas[1]['numeroPregunta'],2,$idGrupo)[1]) > 0) ) 
			{				
				$this->pdf->AddPage();
				$this->pdf->setSubtitulo('Acta Concertacion',$this->pdf);
				
				for($i=1;$i<(count($preguntas));$i++)
				{
					if($preguntas[$i]['numeroPregunta'] != 12)
					{
						$resp = $this->respuestas($pregunta,$preguntas[$i]['numeroPregunta'],2,$idGrupo);
						$this->pdf->crear($preguntas[$i],$resp[0],$resp[1],$this->pdf);
					}
				}

				$observaciones = $this->getObservacionesConcertacion($pregunta,$idGrupo);
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

	public function getObservacionesSocializacion($pregunta,$idGrupo)
	{
		$busqueda['idGrupo']=$idGrupo;
		$busqueda['numeroPregunta']=11;

		return $pregunta->obtenerRespuesta($busqueda);
	}


	public function getObservacionesConcertacion($pregunta,$idGrupo)
	{
		$busqueda['idGrupo']=$idGrupo;
		$busqueda['numeroPregunta']=12;

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