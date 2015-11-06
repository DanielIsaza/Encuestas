<?php 

include_once("../modelo/Estudiante.php");
include_once("../modelo/ActaConcertacion.php");

//Se obtiene el valor del grupo seleccionado 
$grupoid = $_POST['secondChoice'];
//El valor se guarda en una cookie
setcookie("id[grupo]",$grupoid,time()+360);

if(isset($_POST['nombre']))	
{  
   $cod = ingresarEstudiante();
	//cookie con el id de estudiante
   	setcookie("id[estudiante]",$cod[0],time()+360);
   	ingresarActa($cod);
   	cambio();
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
	$acta->agregarActaConcertacion($data);
}

function cambio(){
	sleep(1);
header("Location: actaConcertacion.php"); 
}
?>