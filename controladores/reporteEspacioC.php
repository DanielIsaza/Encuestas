<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/PlanEstudio.php");
include_once("../modelo/PeriodoAcademico.php");

$plan = new PlanEstudio();
$planes = array();
$planes = $plan->listarPlanes();

$semestre = new Semestre();
$datos = array();
$datos = $semestre->listarSemestres();

$espacioA = new EspacioAcademico();
$datos2 = $espacioA->listarEspaciosAcademicos();

$periodo = new PeriodoAcademico();
$actual = $periodo->actual()[0]['id'];

if(isset($_POST['secondChoice']))
{	
	$grupo = new Grupo();
	$grupos = $grupo->buscarGrupos($_POST['secondChoice'],$actual);

	if(count($grupos)>0)	
	{
		$reporte = new ReporteGrupo();

		for($i=0;$i<count($grupos);$i++)
		{
			$reporte->generarReporte($grupos[$i]['pk'],$actual);
		}

		$pdf = $reporte->getPDF();

		if(!is_null($pdf))
		{
			$reporte->descargar('Reporte_Por_Espacio_Academico');
		}
	}
}
?>