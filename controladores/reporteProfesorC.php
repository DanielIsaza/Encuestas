<?php 
include_once("../modelo/Docente.php");
include_once("../modelo/reporteDocente.php");

$docente = new Docente();
$docentes = $docente->listaDocentes();

if(isset($_POST['myChoice']))
{	
	$reporte = new reporteDocente();
	$pdf = $reporte->generarReporte($_POST['myChoice']);
	if(!is_null($pdf))
	{
		$reporte->descargar('Reporte_Docente');
	}
}
?>