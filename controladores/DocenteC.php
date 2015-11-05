<?php 

include_once("../modelo/Docente.php");
$docente = new Docente();

if(isset($_POST['cedulaDocente']))	
{  
    $data = array();
    $data['cedulaDocente']    = $_POST['cedulaDocente'];
    $data['nombreDocente']    = $_POST['nombreDocente'];
   	$data['Programa_idPrograma']  = 1;

    $docente->agregarDocente($data);
}

?>