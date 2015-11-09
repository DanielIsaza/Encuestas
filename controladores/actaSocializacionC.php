<?php 

include_once("../modelo/Estudiante.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");

//Se obtiene el valor del grupo seleccionado 
$grupoid = $_POST['secondChoice'];
//El valor se guarda en una cookie
setcookie("idGrupo",$grupoid,time()+360);

if(isset($_POST['nombre']))	
{  
	//Ingreso del estudiante que diligencio las actas
   $cod = ingresarEstudiante();
   //Ingreso del acta de socializacion 
   $act1 = ingresarActa($cod);
   //Ingreso del acta de concertacion 
   $act2 =ingresarActa2($cod);
   //Ingreso preguntas Acta 1
   ingresarPreguntas($act1[0]);
   //Ingreso preguntas Acta 1
   ingresarPreguntas2($act2[0]);
   header ( "Location: Index.php" );
}
/**
*Metodo que permite ingresar el estudiante a la base de datos
*/
function ingresarEstudiante()
{
	$estudiante = new Estudiante();
	$data['codigoEstudiante']    = $_POST['codigo'];
    $data['nombreEstudiante']    = $_POST['nombre'];
   	$data['Programa_idPrograma']  = 1;

    $estudiante->agregarEstudiante($data);

    return $estudiante->buscarId($data['codigoEstudiante']);
}
/*
*Metodo que permite ingresar el acta a la base de datos
*/
function ingresarActa($cod)
{
	$acta = new ActaConcertacion();
	//El 1 corresponde a un acta de socializacion
	$data['numero']= 1;
	//año actual con 4 digitos
	$data['ano'] = date('Y');
	//id del grupo 
	$data['idGrupo'] =  $_COOKIE ["idGrupo"];
	//codigo del estudiante
	$data['idEstudiante'] = $cod[0];
	//Ingreso del acta
	$acta->agregarActaConcertacion($data);

	return $acta->buscarActa($data);
}

/**
*Metodo quepermite ingresar el acta de concertacion 
*/
function ingresarActa2($cod)
{
	$acta2 = new ActaConcertacion();
	//El 2 corresponde a un acta de concertacion
	$data2['numero']= 2;
	//año actual con 4 digitos
	$data2['ano'] = date('Y');
	//id del grupo 
	$data2['idGrupo'] =  $_COOKIE ["idGrupo"];
	//codigo del estudiante
	$data2['idEstudiante'] = $cod[0];
	//Ingreso del acta
	$acta2->agregarActaConcertacion($data2);

	return $acta2->buscarActa($data2);
}

/**
*metodo que ingresa el primer conjunto de preguntas
*numeroPregunta,
          *respuesta,
          *ActaConcertacion_idActaConcertacion
*/
function ingresarPreguntas($act1)
{
	$pregunta = new Pregunta();
	//Enunciado al que corresponde la pregunta
	$data[0]['numero']= 1;
	$data[1]['numero']= 2;
	$data[2]['numero']= 3;
	$data[3]['numero']= 4;
	$data[4]['numero']= 5;
	$data[5]['numero']= 6;
	//Respuesta dada por el estudiante
	$data[0]['respuesta']= $_POST['pregunta1'];
	$data[1]['respuesta']= $_POST['pregunta2'];
	$data[2]['respuesta']= $_POST['pregunta3'];
	$data[3]['respuesta']= $_POST['pregunta4'];
	$data[4]['respuesta']= $_POST['pregunta5'];
	$data[5]['respuesta']= $_POST['pregunta6'];
	//id del acta a la que pertenecen las respuestas
	$data[0]['idActa']= $act1;
	$data[1]['idActa']= $act1;
	$data[2]['idActa']= $act1;
	$data[3]['idActa']= $act1;
	$data[4]['idActa']= $act1;
	$data[5]['idActa']= $act1;

	for($i=0;$i<count($data);$i++)
	{
		$pregunta->agregarPregunta($data[$i]);
	}
}

function ingresarPreguntas2($act2)
{
	$pregunta = new Pregunta();
	//Enunciado al que corresponde la pregunta
	$data[0]['numero']= 7;
	$data[1]['numero']= 8;
	$data[2]['numero']= 9;
	$data[3]['numero']= 10;
	$data[4]['numero']= 11;
	//Respuesta dada por el estudiante
	$data[0]['respuesta']= $_POST['pregunta7'];
	$data[1]['respuesta']= $_POST['pregunta8'];
	$data[2]['respuesta']= $_POST['pregunta9'];
	$data[3]['respuesta']= $_POST['pregunta10'];
	$data[4]['respuesta']= $_POST['observaciones'];
	//id del acta a la que pertenecen las respuestas
	$data[0]['idActa']= $act2;
	$data[1]['idActa']= $act2;
	$data[2]['idActa']= $act2;
	$data[3]['idActa']= $act2;
	$data[4]['idActa']= $act2;

	for($i=0;$i<count($data);$i++)
	{
		$pregunta->agregarPregunta($data[$i]);
	}
}
?>