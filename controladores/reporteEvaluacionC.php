<?php 
include_once("../modelo/Docente.php");
include_once("../modelo/ReporteEvaluacion.php");

$docente = new Docente();
$docentes = $docente->listaDocentes();

if(isset($_POST['myChoice']))
{	
	$reporte = new reporteEvaluacion();
	$pdf = $reporte->generarReporte($_POST['myChoice']);

	if(!is_null($pdf))
	{
		$reporte->descargar();
	}
}
?>