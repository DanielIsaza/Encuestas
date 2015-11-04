<?php 

include_once("../modelo/Estudiante.php");
$estudiante = new Estudiante();

if(isset($_POST['codigoEstudiante']))	
{  
    $data = array();
    $data['codigoEstudiante']    = $_POST['codigoEstudiante'];
    $data['nombreEstudiante']    = $_POST['nombreEstudiante'];
   	$data['Programa_idPrograma']  = 1;

    $estudiante->agregarEstudiante($data);
}

?>