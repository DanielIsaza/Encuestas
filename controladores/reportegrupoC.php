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
	/*$busqueda['idGrupo']=$_POST['thirdChoice'];
	$busqueda['tipoRespuesta']=1;
	$busqueda['numeroPregunta']=1;

	print_r($busqueda);
	$afirmativas = $pregunta->cantPreguntas($datos);

	$busqueda['tipoRespuesta']=0;
	print_r($busqueda);
	$negativas = $pregunta->cantPreguntas($datos);

	print_r($afirmativas);
	print_r($negativas);*/

	$enunciado = new Enunciado();
	$preguntas = $enunciado->listarEnunciados();

	$pdf = new PDF();

	$pdf->titulo($datos,$pdf);

	for($i=0;$i<(count($preguntas)-2);$i++)
	{
		$pdf->crear($preguntas[$i],$pdf);
	}

	$pdf->descarga($pdf);
}
?>