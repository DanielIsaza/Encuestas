<?php 

include_once("../modelo/Estudiante.php");
include_once("../modelo/ActaConcertacion.php");

//Se obtiene el valor del grupo seleccionado 
$grupoid = $_POST['secondChoice'];
//El valor se guarda en una cookie
setcookie("idGrupo",$grupoid,time()+360);

if(isset($_POST['nombre']))	
{  
	//Ingreso del estudiante que diligencio las actas
   $cod = ingresarEstudiante();
   //Ingreso del acta de socializacion 
   ingresarActa($cod);
   //Ingreso del acta de concertacion 
   ingresarActa2($cod);
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
}
?>