<?php include("../controladores/PdfC.php"); ?>
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
    			<h2>Haga click aqu&iacute; para generar los reportes</h2>
    			<button class="boton" name="hola" type="submit" >Generar reportes</button>
    		</form>
		</div>
	</body>
</html>