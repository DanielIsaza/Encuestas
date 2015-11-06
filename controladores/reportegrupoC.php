<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/Enunciado.php");
include_once("../modelo/PDF.php");
require_once ("../libs/jpgraph/src/jpgraph.php");
require_once ("../libs/jpgraph/src/jpgraph_pie.php");

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

	grafico(2,4);
	crear($datos,$preguntas);
}

function grafico($si,$no)
{ 
	// Se define el array de valores y el array de la leyenda
	$datos = array($si,$no);
	$leyenda = array('SI','NO');
	 
	//Se define el grafico
	$grafico = new PieGraph(450,300);
	
	//Definimos el titulo 
/*	$grafico->title->Set("Mi primer grafico de tarta");
	$grafico->title->SetFont(FF_FONT1,FS_BOLD);*/
	 
	//Añadimos el titulo y la leyenda
	$p1 = new PiePlot($datos);
	$p1->SetLegends($leyenda);
	$p1->SetCenter(0.4);
	 
	//Se muestra el grafico
	$grafico->Add($p1);
    $nombreImagen = '../img/temp/' . 'grafico' . '.png';
    // Display the graph
    $grafico->Stroke($nombreImagen);
}

function crear($datos,$preguntas)
{
	$pdf = new PDF();
	$pdf->setTitle('Reporte '.$datos[0]['espacioAcademico']);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',14);
	$pdf->SetX(30);
	$pdf->Cell(0,10,'Docente: '.$datos[0]['docente'],0,10);
	$pdf->Cell(0,10,'Grupo: '.$datos[0]['numeroGrupo'],0,10);
	$pdf->Ln(6);
	$pdf->setFont('Times','',13);
	$pdf->Multicell(0,6,$preguntas[0]['enunciado'],0,7);
	$pdf->Ln(6);
	$pdf->Cell("", "", $pdf->Image('../img/temp/grafico.png', $pdf->GetX()+33,$pdf->GetY()),'LR',0,'R');
	$pdf->Output('reporte1.pdf','D');
	//$pdf->Output();
	unlink('../img/temp/grafico.png');
}
?>