<?php 

include_once("../modelo/PDF.php");


	$pdf = new PDF();
	$titulo = "Reporte 1";
	$pdf->setTitle($titulo);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	for($i=1;$i<=40;$i++)
	    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
	$pdf->Output('reporte1.pdf','D');
?>