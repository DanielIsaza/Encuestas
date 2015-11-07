<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");
include_once("../modelo/EspacioAcademico.php");


if(isset($_POST['reporteGeneral']))
{	
	$semestre = new Semestre();
	$reporte = new ReporteGrupo();
	$espacioAcademico = new EspacioAcademico();
	$pdf = $reporte->getPDF();

	$datos = array();
	$datos = $semestre->listarSemestres();
		
	
	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[0]['id']);
	$pdf->setTitulo($datos[0]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}
	
	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[1]['id']);
	$pdf->setTitulo($datos[1]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[2]['id']);
	$pdf->setTitulo($datos[2]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[3]['id']);
	$pdf->setTitulo($datos[3]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[4]['id']);
	$pdf->setTitulo($datos[4]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[5]['id']);
	$pdf->setTitulo($datos[5]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[6]['id']);
	$pdf->setTitulo($datos[6]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[7]['id']);
	$pdf->setTitulo($datos[7]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[8]['id']);
	$pdf->setTitulo($datos[8]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[9]['id']);
	$pdf->setTitulo($datos[9]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte);
	}

	if(!is_null($pdf))
	{
		$reporte->descargar($pdf);
	}
}

function grupos($idEspacio,$reporte)
{
	$grupo = new Grupo();
	$grupos = $grupo->buscarGrupos($idEspacio['pk']);
	if(count($grupos)>0)	
	{
		for($i=0;$i<count($grupos);$i++)
		{
			$reporte->generarReporte($grupos[$i]['pk']);
		}
	}
}
?>