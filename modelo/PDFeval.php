<?php
require('../libs/pdf/fpdf.php');
require('../libs/fpdi/fpdi.php');
require_once ("../libs/jpgraph/src/jpgraph.php");
require_once ("../libs/jpgraph/src/jpgraph_pie.php");

class PDFEVAL extends FPDI
{
	/**
	*metodo que permite importar el pdf especificado
	*/
	function importar()
	{
		$this->setSourceFile("../doc/EVALUACION_DESEMPENO_DOCENTE.pdf");
	}
	/**
	* metodo que permite agregar una nueva pagina al documento
	*/
	function agregarPagina()
	{
		$this->addPage();
	}
	/**
	* metodo que importa la primera pagina del documento
	*/
	function importarPrimeraPag()
	{
		$tplIdx = $this->importPage(1);
		$this->addPage();
		$this->useTemplate($tplIdx, null.null.null.null,true);
		$this->setAutoPageBreak(false,0);
	}	
	/**
	*  metodo que importa la segunda pagina 
	*/
	function importarSegundaPag()
	{
		$tplIdx = $this->importPage(2);
		$this->addPage();
		$this->useTemplate($tplIdx, null.null.null.null,true);
		$this->setAutoPageBreak(false,0);
	}
	/**
	* metodo que permite descargar el documento
	*/
	function descarga()
	{
		$this->Output('EvaluacionDocente.pdf','D');
	}
	/**
	* metodo que da el contenido para la primera pagina
	*/
	function diligenciarDatos($data)
	{
		//Nombre docente
		$nombre = utf8_decode($data['nombreDocente']);
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(45, 50.5);
		$this->Write(0, $nombre);

		//Asignar facultad
		$nombre = "Ciencias Humanas y Bellas Artes";
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(25, 58.5);
		$this->Write(0, $nombre);

		//Asignar programa
		$nombre = "CIDBA";
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(27, 67);
		$this->Write(0, $nombre);

		//Asignar espacio academico
		$nombre = utf8_decode($data['nombre']);
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(64, 75.5);
		$this->Write(0, $nombre);

		//Asignar semestre
		$nombre = utf8_decode($data['nombreSemestre']);
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(142, 67);
		$this->Write(0, $nombre);

		//Asignar numero del grupo
		$numero = "grupo: ".$data['NumeroGrupo'];
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(180, 75.5);
		$this->Write(0, $numero);
		
		//manejo de fechas 
		list($dia,$mes,$ano) = explode("-",$data['ano'][0]);
		//Asignar Fecha
		$nombre = $dia;
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(130, 40);
		$this->Write(0, $nombre);


		$nombre = $mes;
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(152, 40);
		$this->Write(0, $nombre);


		$nombre = $ano;
		$this->SetFont('Arial','', 10);
		$this->SetTextColor(0,0,0);
		$this->SetXY(173, 40);
		$this->Write(0, $nombre);
	}

	/**
	*metodos que permiten marcar la opcion seleccionada po
	*por los estudiantes
	*/
	function indicador1($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(69, 178.5);
		}
		else if($op=="1")
		{
			$this->SetXY(129, 178.5);
		}
		else
		{
			$this->SetXY(188, 178.5);
		}
		$this->Write(0, $nombre);
	}

	function indicador2($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(69, 207);
		}
		else if($op=="1")
		{
			$this->SetXY(129, 207);
		}
		else
		{
			$this->SetXY(188, 207);
		}
		$this->Write(0, $nombre);
	}

	function indicador3($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(69, 235);
		}
		else if($op=="1")
		{
			$this->SetXY(129, 235);
		}
		else
		{
			$this->SetXY(188, 235);
		}
		$this->Write(0, $nombre);
	}

	function indicador4($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(69, 263);
		}
		else if($op=="1")
		{
			$this->SetXY(129, 263);
		}
		else
		{
			$this->SetXY(188, 263);
		}
		$this->Write(0, $nombre);
	}

	function indicador5($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(69, 292);
		}
		else if($op=="1")
		{
			$this->SetXY(130, 292);
		}
		else
		{
			$this->SetXY(189, 292);
		}
		$this->Write(0, $nombre);
	}

	function indicador6($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 28);
		}
		else if($op=="1")
		{
			$this->SetXY(130, 28);
		}
		else
		{
			$this->SetXY(189, 28);
		}
		$this->Write(0, $nombre);
	}

	function indicador7($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 55);
		}
		else if($op=="1")
		{
			$this->SetXY(130, 55.4);
		}
		else
		{
			$this->SetXY(190, 55.5);
		}
		$this->Write(0, $nombre);
	}

	function indicador8($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 84);
		}
		else if($op=="1")
		{
			$this->SetXY(131, 84);
		}
		else
		{
			$this->SetXY(190, 84);
		}
		$this->Write(0, $nombre);
	}

	function indicador9($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 112);
		}
		else if($op=="1")
		{
			$this->SetXY(132, 112);
		}
		else
		{
			$this->SetXY(192, 112);
		}
		$this->Write(0, $nombre);
	}

	function indicador10($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 140);
		}
		else if($op=="1")
		{
			$this->SetXY(131, 140);
		}
		else
		{
			$this->SetXY(191, 140);
		}
		$this->Write(0, $nombre);
	}
	
	function indicador11($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 169);
		}
		else if($op=="1")
		{
			$this->SetXY(130, 169);
		}
		else
		{
			$this->SetXY(190, 169);
		}
		$this->Write(0, $nombre);
	}

	function indicador12($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 196);
		}
		else if($op=="1")
		{
			$this->SetXY(130, 197);
		}
		else
		{
			$this->SetXY(190, 198);
		}
		$this->Write(0, $nombre);
	}

	function indicador13($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 224);
		}
		else if($op=="1")
		{
			$this->SetXY(131, 225);
		}
		else
		{
			$this->SetXY(191, 225);
		}
		$this->Write(0, $nombre);
	}

	function indicador14($op)
	{
		$nombre = "X";
		$this->SetFont('Arial','', 15);
		$this->SetTextColor(0,0,0);
		if($op == "0")
		{
			$this->SetXY(70, 253);
		}
		else if($op=="1")
		{
			$this->SetXY(131, 253);
		}
		else
		{
			$this->SetXY(190, 253);
		}
		$this->Write(0, $nombre);
	}

	function observaciones($data)
	{
		$this->SetFont('Arial','', 12);
		$this->SetTextColor(0,0,0);
		$this->Multicell(0,8,utf8_decode($data),0,7);
	}
}
?>