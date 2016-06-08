<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ReporteGrupo.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/PeriodoAcademico.php");

$periodo = new PeriodoAcademico();
$periodos = $periodo->listar();

	if(isset($_POST['reportePeriodo']))
	{
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
			grupos($datos2[$i],$reporte);
		}
		
		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[1]['pk']);
		$pdf->setTitulo($datos[1]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[2]['pk']);
		$pdf->setTitulo($datos[2]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[3]['pk']);
		$pdf->setTitulo($datos[3]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[4]['pk']);
		$pdf->setTitulo($datos[4]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[5]['pk']);
		$pdf->setTitulo($datos[5]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[6]['pk']);
		$pdf->setTitulo($datos[6]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[7]['pk']);
		$pdf->setTitulo($datos[7]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[8]['pk']);
		$pdf->setTitulo($datos[8]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[9]['pk']);
		$pdf->setTitulo($datos[9]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[10]['pk']);
		$pdf->setTitulo($datos[10]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}
		
		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[11]['pk']);
		$pdf->setTitulo($datos[11]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[12]['pk']);
		$pdf->setTitulo($datos[12]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[13]['pk']);
		$pdf->setTitulo($datos[13]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[14]['pk']);
		$pdf->setTitulo($datos[14]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[15]['pk']);
		$pdf->setTitulo($datos[15]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[16]['pk']);
		$pdf->setTitulo($datos[16]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[17]['pk']);
		$pdf->setTitulo($datos[17]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[18]['pk']);
		$pdf->setTitulo($datos[18]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		$datos2 = $espacioAcademico->espaciosPorSemestre($datos[19]['pk']);
		$pdf->setTitulo($datos[19]['nombre']);
		for($i=0;$i<count($datos2);$i++)
		{
			grupos($datos2[$i],$reporte);
		}

		if(!is_null($pdf))
		{
			$reporte->descargar('Reporte_Por_Periodo');
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
				$reporte->generarReporte($grupos[$i]['pk'],$_POST['myChoice']);
			}
		}
	}
?>