<?php 

include_once("../modelo/Estudiante.php");
include_once("../modelo/ActaConcertacion.php");
include_once("../modelo/Pregunta.php");
include_once("../modelo/Grupo.php");
include_once("../modelo/ActaMostrar.php");
include_once("../modelo/Enunciado.php");

/**
* Creacion de las entidades a utilizar
*/
$mostrar = new ActaMostrar();
$validarE = new Estudiante();
$grupo = new Grupo();
$enunciado = new Enunciado();


$opciones = $mostrar->listar();
$eSocializacion = $enunciado->listarEnunciados(1);
$eConcertacion = $enunciado->listarEnunciados(2);

//Se obtiene el valor del grupo seleccionado 
$grupoid = $_POST['thirdChoice'];
$nDocente = $grupo->obtenerDocente($grupoid)['nombreDocente'];
//El valor se guarda en una cookie
setcookie("idGrupo",$grupoid,time()+360);

//Establece si la información para las actas de concertacion y socialización estan definidos.
if(isset($_POST['nombre']))	
{  
	if($opciones[0]['mostrar']==1)
	{
		$existe = $validarE->buscarEstudiante($_POST['codigo'],1,$_COOKIE["idGrupo"]);
		if (count($existe) == 0)
		{
			//Ingreso del estudiante que diligencio las actas
	   		$cod = ingresarEstudiante();
	   		//Ingreso del acta de socializacion 
	   		$act1 = ingresarActa($cod);
	   		//Ingreso preguntas Acta 1
	   		ingresarPreguntas($act1[0],$eSocializacion);

	   		echo "<script>alert('Su acta ha sido guardada, haga click para continuar'); window.location='Index.php';</script>";
	   	}
	   	else
	   	{
	   		echo "<script>alert('Solo se puede ingresar un acta por estudiante.'); window.location='Index.php';</script>";
	   	}
	}

	if($opciones[1]['mostrar']==1)
	{
		$existe = $validarE->buscarEstudiante($_POST['codigo'],2,$_COOKIE["idGrupo"]);
		if (count($existe) == 0)
		{
			//Ingreso del estudiante que diligencio las actas
	   		$cod = ingresarEstudiante();
	   		//Ingreso del acta de concertacion 
	  		$act2 =ingresarActa2($cod);
	   		//Ingreso preguntas Acta 1
	   		ingresarPreguntas2($act2[0],$eConcertacion);
	   		echo "<script>alert('Su acta ha sido guardada, haga click para continuar'); window.location='Index.php';</script>";
	   	}
	   	else
	   	{
	   		echo "<script>alert('Solo se puede ingresar un acta por estudiante.'); window.location='Index.php';</script>";
	   	}
	}

	if($opciones[2]['mostrar']==1)
	{
		$existe = $validarE->buscarEstudiante($_POST['codigo'],3,$_COOKIE["idGrupo"]);
		if (count($existe) == 0)
		{
			//Ingreso del estudiante que diligencio las actas
	   		$cod = ingresarEstudiante();
			//Ingreso del acta
			$eval = ingresarEval($cod);
			//Ingreso de las preguntas 
			ingresarPreguntas3($eval[0]);

			echo "<script>alert('Su respuesta ha sido guardada, haga click para continuar'); window.location='Index.php';</script>";
		}
		else
		{
	   		echo "<script>alert('Solo se puede responder una evaluaci&oacute;n por estudiante.'); window.location='Index.php';</script>";
	   	}
	}
}
/**
*Metodo que permite ingresar el estudiante a la base de datos
*/
function ingresarEstudiante()
{
	$estudiante = new Estudiante();
	$data['codigoEstudiante'] = $_POST['codigo'];
    $data['nombreEstudiante'] = $_POST['nombre'];
   	$data['Programa_idPrograma']  = 1;

    $estudiante->agregarEstudiante($data);

    return $estudiante->buscarId($data['codigoEstudiante']);
}
/*
*Metodo que permite ingresar el acta de socializacion a la base de datos
*/
function ingresarActa($cod)
{
	$acta = new ActaConcertacion();
	//El 1 corresponde a un acta de socializacion
	$data['numero']= 1;
	//año actual con 4 digitos
	$data['ano'] = date('d-m-Y');
	//id del grupo 
	$data['idGrupo'] =  $_COOKIE["idGrupo"];
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
	$data2['ano'] = date('d-m-Y');
	//id del grupo 
	$data2['idGrupo'] =  $_COOKIE ["idGrupo"];
	//codigo del estudiante
	$data2['idEstudiante'] = $cod[0];
	//Ingreso del acta
	$acta2->agregarActaConcertacion($data2);

	return $acta2->buscarActa($data2);
}
/**
*método que permite ingresar la evaluacion del docente a la base de datos
*/
function ingresarEval($cod)
{
	$eval = new ActaConcertacion();
	//l numero 3 corresponde a una evaluación de desempeño
	$data3['numero']= 3;
	//Fecha en la que se diligencia
	$data3['ano'] = date('d-m-Y');
	//id de grupo
	$data3['idGrupo'] = $_COOKIE["idGrupo"];
	//id del estudiante
	$data3['idEstudiante'] = $cod[0];
	//Ingreso del acta
	$eval->agregarActaConcertacion($data3);

	return $eval->buscarActa($data3);
}
/**
* Metodo que ingresa las respuestas del acta de socualizacion
*/
function ingresarPreguntas($act1,$eSocializacion)
{
	$pregunta = new Pregunta();
	//Enunciado al que corresponde la pregunta
	for($i=1; $i <= count($eSocializacion); $i++)
	{
		$data[$i]['idActa'] = $act1;
		$data[$i]['numero'] = $eSocializacion[$i]['numeroPregunta'];
		if($eSocializacion[$i]['numeroPregunta'] == 11)
		{
			$data[$i]['respuesta'] = utf8_encode($_POST['observaciones1']);
		}
		else
		{
			$data[$i]['respuesta']=$_POST['p'.$i];
		}
	}

	for($i=1;$i<=count($data);$i++)
	{
		$pregunta->agregarPregunta($data[$i]);
	}
}
/**
* metodo que permite ingresar la respuestas del acta de concertacion
*/
function ingresarPreguntas2($act2,$eConcertacion)
{
	$pregunta = new Pregunta();
	$data = array();
	//Enunciado al que corresponde la pregunta
	for($i=1; $i <= count($eConcertacion); $i++)
	{
		$data[$i]['idActa'] = $act2;
		$data[$i]['numero'] = $eConcertacion[$i]['numeroPregunta'];
		if($eConcertacion[$i]['numeroPregunta'] == 12)
		{
			$data[$i]['respuesta'] = utf8_encode($_POST['observaciones']);
		}
		else
		{
			$data[$i]['respuesta'] = $_POST['p'.($i+6)];
		}
	}
	for($i=1;$i<=count($data);$i++)
	{
		$pregunta->agregarPregunta($data[$i]);
	}
}
/*
* Metodo que permite ingresar las respuestas a la evaluacion 
* de los docentes
*/
function ingresarPreguntas3($eval)
{
	$pregunta = new Pregunta();
	//Enunciado al que corresponde la pregunta
	$data[0]['numero']= 13;
	$data[1]['numero']= 14;
	$data[2]['numero']= 15;
	$data[3]['numero']= 16;
	$data[4]['numero']= 17;
	$data[5]['numero']= 18;
	$data[6]['numero']= 19;
	$data[7]['numero']= 20;
	$data[8]['numero']= 21;
	$data[9]['numero']= 22;
	$data[10]['numero']= 23;
	$data[11]['numero']= 24;
	$data[12]['numero']= 25;
	$data[13]['numero']= 26;
	$data[14]['numero']= 27;
	//Respuestas dadas por el estudiante
	$data[0]['respuesta']= $_POST['p11'];
	$data[1]['respuesta']= $_POST['p12'];
	$data[2]['respuesta']= $_POST['p13'];
	$data[3]['respuesta']= $_POST['p14'];
	$data[4]['respuesta']= $_POST['p15'];
	$data[5]['respuesta']= $_POST['p16'];
	$data[6]['respuesta']= $_POST['p17'];
	$data[7]['respuesta']= $_POST['p18'];
	$data[8]['respuesta']= $_POST['p19'];
	$data[9]['respuesta']= $_POST['p20'];
	$data[10]['respuesta']= $_POST['p21'];
	$data[11]['respuesta']= $_POST['p22'];
	$data[12]['respuesta']= $_POST['p23'];
	$data[13]['respuesta']= $_POST['p24'];
	$data[14]['respuesta']= utf8_encode($_POST['observacionesEval']);

	//id del acta a la que pertenecen las respuestas
	$data[0]['idActa']= $eval;
	$data[1]['idActa']= $eval;
	$data[2]['idActa']= $eval;
	$data[3]['idActa']= $eval;
	$data[4]['idActa']= $eval;
	$data[5]['idActa']= $eval;
	$data[6]['idActa']= $eval;
	$data[7]['idActa']= $eval;
	$data[8]['idActa']= $eval;
	$data[9]['idActa']= $eval;
	$data[10]['idActa']= $eval;
	$data[11]['idActa']= $eval;
	$data[12]['idActa']= $eval;
	$data[13]['idActa']= $eval;
	$data[14]['idActa']= $eval;

	for($i=0;$i<count($data);$i++)
	{
		$pregunta->agregarPregunta($data[$i]);
	}
}

if(!isset($_POST['thirdChoice']))
{
	echo "<script>window.location='Index.php';</script>";
}
?>