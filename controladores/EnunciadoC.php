<?php 

include_once("../modelo/Enunciado.php");
$enunciado = new Enunciado();

if(isset($_POST['numeroPregunta']))	
{  
    $data = array();
    $data['numeroPregunta']    = $_POST['numeroPregunta'];
    $data['enunciado']    = $_POST['enunciado'];

    $enunciado->agregarEnunciado($data);
}

?>