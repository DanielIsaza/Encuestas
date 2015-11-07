<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");

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
	$reporte = new ReporteGrupo();
	$pdf = $reporte->generarReporte($_POST['thirdChoice']);
	if(!is_null($pdf))
	{
		$reporte->descargar('Reporte_Por_Grupo');
	}
}
?>