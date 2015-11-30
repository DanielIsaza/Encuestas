<?php include_once("../controladores/reportePeriodoC.php");?>
<!doctype>
<!-- Vista para el reporte de espacios academicos-->
<html>
<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Reporte Per&iacute;odo acad&eacute;mico</title>
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
        <img class="img1" src="../img/logouq.jpg">
				<h1><B>Programa CIDBA</B></h1>
				<h2>Reporte por per&iacute;odo acad&eacute;mico</h2>
        <img class="img2" src="../img/logo.jpg">
			</div>
		</header>
		<div class="contenedor">

			<form name= myChoices method="post" action="">
				<h2>Indique el per&iacute;odo acad&eacute;mico para el reporte</h2>
				<div>
					<h3>1. Seleccione el per&iacute;odo </h3>
					<select id=myChoice name="myChoice" required>
						<option value="" SELECTED>-Selecciona-</option>
						 <?php for($i=0;$i<count($periodos);$i++){ ?>
                                <option value="<?php echo $periodos[$i]['id']; ?>"><?php echo $periodos[$i]['periodo']?></option>
                            <?php  } ?>
					</select>
				</div>
				<section  class="contenedorCentrado">
                	<!--boton que redirecciona al formulario acta de socializacion-->
                   	<button class="boton" name="reportePeriodo" type="submit">Continuar</button>
                </section>
			</form>

		</div>
	</body>
</html>