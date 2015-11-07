<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");
include_once("../modelo/EspacioAcademico.php");

$semestre = new Semestre();
$datos = array();
$datos = $semestre->listarSemestres();

$espacioA = new EspacioAcademico();
$datos2 = $espacioA->listarEspaciosAcademicos();

if(isset($_POST['secondChoice']))
{	
	$grupo = new Grupo();
	$grupos = $grupo->buscarGrupos($_POST['secondChoice']);
	$reporte = new ReporteGrupo();
	
	for($i=0;$i<count($grupos);$i++)
	{
		$reporte->generarReporte($grupos[$i]['pk']);
	}

	$pdf = $reporte->getPDF();

	if(!is_null($pdf))
	{
		$reporte->descargar($pdf);
	}
}
?>