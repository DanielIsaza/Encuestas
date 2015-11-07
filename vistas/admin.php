<?php include("../controladores/reporteProgramaC.php"); ?>
<!doctype>
<!--vista principal del administrador-->
<html>
	<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Administrador</title>
		<!--JQuery-->
		<script src="//code.jquery.com/jquery-2.1.3.js"></script>
		<!-- JavaScript-->
		<script type="./main.js"></script>
		<script src="../js/modernizr.js"></script>
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<!--foundation-->
        <link rel="stylesheet" href="../css/foundation.css">
	</head>
	<!--cuerpo de la pagina-->
	<body>
		<!--encabezado de la pagina-->
		<header>
			<!-- división que contiene el encabezado de la pagina-->
			<div class="encabezado">
				<h1><B>Programa CIDBA</B></h1>
				<h2>Bienvenido administrador</h2>
			</div>
		</header>
		<!-- división con el contenido de la pag-->
    	<div class="row">
    		<form action="#" method="post">
    			<h2>Aqu&iacute; puede generar los reportes</h2>
    			<div>
    				<h3>Generar reporte completo (Todos los espacios academicos)</h3>
    				<button class="boton" name="reporteGeneral" type="submit" id="reporteGeneral" >Generar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por espacio academico</h3>
    				<button class="boton" name="reporteMaterias" type="submit" formaction="reporteMateria.php" >Continuar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por grupo</h3>
    				<button class="boton" name="hola" type="reporteGrupo" formaction="reporteGrupo.php" >Continuar</button>
    			</div>
    		</form>
		</div>
	</body>
</html>