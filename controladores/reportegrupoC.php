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

	$pdf = new PDF();

	titulo($datos,$pdf);

	for($i=0;$i<(count($preguntas)-2);$i++)
	{
		crear($preguntas[$i],$pdf);
	}

	descarga($pdf);
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

function titulo($datos,$pdf)
{
	//se inserta el titulo en el pdf, nombre del espacio academico
	$pdf->setTitle('Reporte '.$datos[0]['espacioAcademico']);
	//Se agrega la pagina 
	$pdf->AddPage();
	// Se agrega el pie de pagina con el numero de pagina 
	$pdf->AliasNbPages();
	//se define un nuevo tipo y tamaño de letra para los subtitulos
	$pdf->SetFont('Times','B',14);
	//Se define la aliniacion horizontal que tendran en la hoja
	$pdf->SetX(30);
	//Se agregan el nombre del docente y del grupo en celdas separadas
	$pdf->Cell(0,10,'Docente: '.$datos[0]['docente'],0,10);
	$pdf->Cell(0,10,'Grupo: '.$datos[0]['numeroGrupo'],0,10);
}

function crear($pregunta,$pdf)
{
	$pdf->setTitle("");

	$pdf->SetX(30);
	//Se define un nuevo tipo y tamaño de letra para el contenido
	$pdf->setFont('Times','',13);
	//Se agrega en una multicelda (para mantener el contenido en el margen) el contenido del enunciado 
	$pdf->Multicell(0,6,$pregunta['enunciado'],0,7);
	//Se da un espacio 
	$pdf->Ln(6);
	//Se general el grafico respectivo con las respuestas de la pregunta
	grafico(2,4);
	//Se inserta el  grafico en el pdf
	$pdf->Cell("", "", $pdf->Image('../img/temp/grafico.png', $pdf->GetX()+33,$pdf->GetY()),'LR',0,'R');
	//se borra el grafico almacenad como archivo temporal
	unlink('../img/temp/grafico.png');
	//Se da un espacio entre los subtitulos y el contenido del reporte
	$pdf->Ln(93);
}

function descarga($pdf)
{
	//Se descarga el pdf con un nombre
	//$pdf->Output('reporte1.pdf','D');
	//Codigo que visualiza el pdf en el navegador ---> 
	$pdf->Output();
}
?>