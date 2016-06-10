<?php 
include_once("../modelo/Docente.php");
include_once("../modelo/PeriodoAcademico.php");
include_once("../modelo/ReporteEvaluacion.php");

$docente = new Docente();
$docentes = $docente->listaDocentes();

if(isset($_POST['myChoice']))
{	
	$periodo = new PeriodoAcademico();
	$actual = $periodo->actual()[0]['id'];
	$reporte = new reporteEvaluacion();
	$pdf = $reporte->generarReporte($_POST['myChoice'],$actual);

	if(!is_null($pdf))
	{
		$reporte->descargar();
	}
}
?>