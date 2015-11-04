<?php 

include_once("../modelo/PDF.php");

if(isset($_POST['hola'])){
  crear();
}

function crear()
{
	$pdf = new PDF();
	$titulo = "Reporte 1";
	$pdf->setTitle($titulo);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	//for($i=1;$i<=10;$i++)
	  //  $pdf->Cell(0,10,'Printing line number '.$i,0,1);
	//$pdf->Image('../img/pastel.png');
	$pdf->Cell(0,10,'Mira mi oshita algo ashi seria el reporte de PDF con las graficas',0,1);
	$pdf->Cell("", "", $pdf->Image('../img/pastel.png', $pdf->GetX(),$pdf->GetY()),'LR',0,'R');
	$pdf->Output('reporte1.pdf','D');
	//$pdf->Output();
}
?>