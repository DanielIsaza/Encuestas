<?php 

include_once("../modelo/PDF.php");
require_once ("../libs/jpgraph/src/jpgraph.php");
require_once ("../libs/jpgraph/src/jpgraph_pie.php");

if(isset($_POST['hola'])){

	grafico();
    crear();
}

function grafico()
{ 
	// Se define el array de valores y el array de la leyenda
	$datos = array(2,2,1,1);
	$leyenda = array("uno","dos","tres","cuatro");
	 
	//Se define el grafico
	$grafico = new PieGraph(450,300);
	
	//Definimos el titulo 
	$grafico->title->Set("Mi primer grafico de tarta");
	$grafico->title->SetFont(FF_FONT1,FS_BOLD);
	 
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

function crear()
{
	$pdf = new PDF();
	$titulo = "Reporte 1";
	$pdf->setTitle($titulo);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->SetX(30);
	$pdf->Cell(0,10,'Mira mi oshita algo ashi seria el reporte de PDF con las graficas',0,1);
	$pdf->Ln(6);
	$pdf->Cell("", "", $pdf->Image('../img/temp/grafico.png', $pdf->GetX()+33,$pdf->GetY()),'LR',0,'R');
	//$pdf->Output('reporte1.pdf','D');
	$pdf->Output();
	unlink('../img/temp/grafico.png');
}
?>