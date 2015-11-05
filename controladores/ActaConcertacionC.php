<?php
	include_once("../modelo/ActaConcertacion.php");
	$acta = new ActaConcertacion();

	if(isset($_POST['numeroActaConcertacion']))	
	{  
    $data = array();
    $data['numeroActaConcertacion']    = $_POST['numeroActaConcertacion'];
    $data['año']    = $_POST['año'];
   	$data['Grupo_idGrupo']  = 1;
   	$data['Estudiante_idEstudiante'] = 1;

    $acta->agregarActaConcertacion($data);
	}

?>
