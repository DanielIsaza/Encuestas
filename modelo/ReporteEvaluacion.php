<?php 

include_once("../modelo/Semestre.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDFeval.php");
include_once("../modelo/Docente.php");		 

class reporteEvaluacion
{
	private $pdf;

	public function reporteEvaluacion()
	{
		$this->pdf = new PDFeval(); 
        $this->pdf->importar();
	}

	public function generarReporte($idDocente,$periodo)
	{
		$acta =  new ActaConcertacion();
		$bool = $acta->evaluacionesDocente($idDocente,$periodo);

		if((count($bool)) > 0)
		{
			$i=0;
			while ($i < count($bool)) 
			{
				$this->pdf->importarPrimeraPag();
				//Diligenciar en el formato la informacion del docente
				$docente = new Docente();
				$info = $docente->infoDocente($idDocente,$bool[$i]);
				$info[0]['ano'] = $acta->buscarFecha($bool[$i]);
				$this->pdf->diligenciarDatos($info[0]);

				//Diligenciar la informacion de las respuestas
				$pregunta = new Pregunta();
				$data['idDocente'] = $idDocente;
				$data['idActaConcertacion'] = $bool[$i];
				
				$data['numeroPregunta'] = 13;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador1($resp[0]['respuesta']);

				$data['numeroPregunta'] = 14;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador2($resp[0]['respuesta']);

				$data['numeroPregunta'] = 15;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador3($resp[0]['respuesta']);

				$data['numeroPregunta'] = 16;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador4($resp[0]['respuesta']);

				$data['numeroPregunta'] = 17;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador5($resp[0]['respuesta']);

				//Diligenciar la segunda pagina de la evaluacion
				$this->pdf->importarSegundaPag();

				$data['numeroPregunta'] = 18;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador6($resp[0]['respuesta']);

				$data['numeroPregunta'] = 19;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador7($resp[0]['respuesta']);

				$data['numeroPregunta'] = 20;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador8($resp[0]['respuesta']);

				$data['numeroPregunta'] = 21;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador9($resp[0]['respuesta']);

				$data['numeroPregunta'] = 22;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador10($resp[0]['respuesta']);

				$data['numeroPregunta'] = 23;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador11($resp[0]['respuesta']);

				$data['numeroPregunta'] = 24;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador12($resp[0]['respuesta']);

				$data['numeroPregunta'] = 25;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador13($resp[0]['respuesta']);

				$data['numeroPregunta'] = 26;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->indicador14($resp[0]['respuesta']);

				$this->pdf->agregarPagina();
				$data['numeroPregunta'] = 27;
				$resp = $pregunta->obtenerRespuestaEvaluacion($data);
				$this->pdf->observaciones($resp[0]['respuesta']);

				$i++;
			}
		}

		return $this->pdf;
	}

	public function descargar()
	{
		$this->pdf->descarga();
	}

	public function getPDF()
	{
		return $this->pdf;
	}
}
?>