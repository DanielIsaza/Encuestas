<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDF.php");

$semestre = new Semestre();
$datos = array();
$datos = $semestre->listarSemestres();

$espacioA = new EspacioAcademico();
$datos2 = $espacioA->listarEspaciosAcademicos();

$grupo = new Grupo();
$datos3 = array();
$datos3 = $grupo->listarGrupos();

if(isset($_POST['thirdChoice']))
{
	$pregunta = new Pregunta();
	$datos = $pregunta->buscarInfoPregunta($_POST['thirdChoice']);

	$enunciado = new Enunciado();
	$preguntas = $enunciado->listarEnunciados();

	$pdf = new PDF();

	$pdf->titulo($datos,$pdf);
	
	$pdf->setSubtitulo('Acta Socializacion',$pdf);

	for($i=0;$i<(count($preguntas)-6);$i++)
	{
		$resp = respuestas($pregunta,$preguntas[$i]['numeroPregunta'],1);
		$pdf->crear($preguntas[$i],$resp[0],$resp[1],$pdf);
	}

	$pdf->setSubtitulo('Acta Concertacion',$pdf);
	
	for($i=6;$i<(count($preguntas)-2);$i++)
	{
		$resp = respuestas($pregunta,$preguntas[$i]['numeroPregunta'],2);
		$pdf->crear($preguntas[$i],$resp[0],$resp[1],$pdf);
	}

	$pdf->descarga($pdf);
}

/*
*Metodo que busca la cantidad de respuestas afirmativas y negativas de una pregunta
*/
function respuestas($pregunta,$num,$tipoActa)
{
	$cantidad = array();
	$busqueda['idGrupo']=$_POST['thirdChoice'];
	$busqueda['tipoActa'] = $tipoActa;
	$busqueda['tipoRespuesta']=1;
	$busqueda['numeroPregunta']=$num;

	$cantidad[0] = $pregunta->cantPreguntas($busqueda)[0]['cantidad'];

	$busqueda['idGrupo']=$_POST['thirdChoice'];
	$busqueda['tipoActa'] = $tipoActa;
	$busqueda['tipoRespuesta']=0;
	$busqueda['numeroPregunta']=$num;
	$cantidad[1] = $pregunta->cantPreguntas($busqueda)[0]['cantidad'];

	return $cantidad;
}
?>