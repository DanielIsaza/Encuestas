<?php
require('../libs/pdf/fpdf.php');
require_once ("../libs/jpgraph/src/jpgraph.php");
require_once ("../libs/jpgraph/src/jpgraph_pie.php");

class PDF extends FPDF
{
    public $title;

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

    function setTitulo($t)
    {
        $this->title = $t;
        $this->AddPage();
        $this->SetFont('Times','',12);
        $this->SetX(30);
    }


    function grafico($si,$no)
    { 
        // Se define el array de valores y el array de la leyenda
        $datos = array($si,$no);
        //se asginan etiquetas a los valores agregados 
        $leyenda = array('SI','NO');
         
        //Se define el grafico
        $grafico = new PieGraph(450,300);
         
        //Añadimos el titulo y la leyenda
        $p1 = new PiePlot($datos);
        $p1->SetLegends($leyenda);
        $p1->SetCenter(0.4);
         
        //Se muestra el grafico
        $grafico->Add($p1);
        //se asigna nombre con ubicacion a la imagen en una carpeta temporal
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
        $pdf->grafico(2,4);
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
}
?>