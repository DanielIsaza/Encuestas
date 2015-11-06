<?php
	include_once("../modelo/ActaConcertacion.php");

  print_r($_COOKIE);
  die();

	if(isset($_POST['pregunta7']))	
	{  
    $acta = new ActaConcertacion();
    
    $data = array();
    //numero predeterminado 2 por ser un acta de concertacions
    $data['numero']    = 2;
    //año actual con 4 digitos
    $data['ano'] = date('Y');
    //grupo al que pertenece el acta de concertacion
    $data['idGrupo'] =  $_COOKIE ["idGrupo"];
    //codigo del estudiante
    $data['idEstudiante'] = $_COOKIE ["idEstudiante"];    
    print_r($data);

    $acta->agregarActaConcertacion($data);

    si();
	}

function si(){
  unset($_COOKIE['idGrupo']);
  unset($_COOKIE['idEstudiante']);
}
?>
