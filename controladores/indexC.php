<?php
include_once("../modelo/Semestre.php");
include_once("../modelo/EspacioAcademico.php");
include_once("../modelo/Grupo.php");

$semestre = new Semestre();
$datos = array();
$datos = $semestre->listarSemestres();

$espacioA = new EspacioAcademico();
$datos2 = $espacioA->listarEspaciosAcademicos();

$grupo = new Grupo();
$datos3 = array();
$datos3 = $grupo->listarGrupos();
?>