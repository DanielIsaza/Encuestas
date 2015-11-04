<?php
require('../libs/pdf/fpdf.php');

class PDF extends FPDF
{
public $title;

function setTitle ($t){
    $this->title = $t;
}

function Header()
{

    // Logo
    $this->Image('../img/uniquindiologo.jpg',94,6,23);
    //$this->Image('../img/uniquindiologo.jpg',155,27,25,22);
    // Arial bold 15
    $this->SetFont('Arial','B',17);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetXY(90,40);
    $this->Cell(30,10,$this->title,0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


?>