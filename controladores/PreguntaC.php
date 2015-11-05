<?php 

include_once("../modelo/Pregunta.php");
$pregunta = new Pregunta();

if(isset($_POST['numeroPregunta']))	
{  
    $data = array();
    $data['numeroPregunta']    = $_POST['numeroPregunta'];
    $data['respuesta']    = $_POST['respuesta'];
   	$data['ActaConcertacion_idActaConcertacion']  = 1;

    $pregunta->agregarPregunta($data);
}

?>