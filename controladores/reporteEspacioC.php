<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/EspacioAcademico.php");

$semestre = new Semestre();
$datos = array();
$datos = $semestre->listarSemestres();

$espacioA = new EspacioAcademico();
$datos2 = $espacioA->listarEspaciosAcademicos();
?>