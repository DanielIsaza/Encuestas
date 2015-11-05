<?php 

include_once("../modelo/EspacioAcademico.php");
$espacioAcademico = new EspacioAcademico();

if(isset($_POST['nombre']))	
{  
    $data = array();
    $data['nombre']    = $_POST['nombre'];
   	$data['Semestre_idSemestre']  = 1;

    $estudiante->agregarEstudiante($data);
}

?>