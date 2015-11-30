<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/PlanEstudio.php");
include_once("../modelo/PeriodoAcademico.php");

if(isset($_POST['reporteGeneral']))
{	
	$periodo = new PeriodoAcademico();
	$actual = $periodo->actual()[0]['id'];

	$semestre = new Semestre();
	$reporte = new ReporteGrupo();
	$espacioAcademico = new EspacioAcademico();
	$pdf = $reporte->getPDF();

	$datos = array();
	$datos = $semestre->listarSemestres();
		
	
	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[0]['pk']);
	$pdf->setTitulo($datos[0]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}
	
	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[1]['pk']);
	$pdf->setTitulo($datos[1]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[2]['pk']);
	$pdf->setTitulo($datos[2]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[3]['pk']);
	$pdf->setTitulo($datos[3]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[4]['pk']);
	$pdf->setTitulo($datos[4]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[5]['pk']);
	$pdf->setTitulo($datos[5]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[6]['pk']);
	$pdf->setTitulo($datos[6]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[7]['pk']);
	$pdf->setTitulo($datos[7]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[8]['pk']);
	$pdf->setTitulo($datos[8]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	$datos2 = $espacioAcademico->espaciosPorSemestre($datos[9]['pk']);
	$pdf->setTitulo($datos[9]['nombre']);
	for($i=0;$i<count($datos2);$i++)
	{
		grupos($datos2[$i],$reporte,$actual);
	}

	if(!is_null($pdf))
	{
		$reporte->descargar('Reporte_Por_Programa');
	}
}

function grupos($idEspacio,$reporte,$actual)
{
	$grupo = new Grupo();
	$grupos = $grupo->buscarGrupos($idEspacio['pk']);
	if(count($grupos)>0)	
	{
		for($i=0;$i<count($grupos);$i++)
		{
			$reporte->generarReporte($grupos[$i]['pk'],$actual);
		}
	}
}
?>