<!doctype>
<!-- Vista para el acta de concertacion academica-->
<html>
	<head>
		<!--cabecera de la pagina-->
		<title>Acta de concertaci&oacute;n acad&ecute;mica</title>
		<!-- JQuery-->
		<script src="//code.jquery.com/jquery-2.1.3.js"></script>
		<!-- JavaScript-->
		<script type="./main.js"></script>
		<script src="../js/modernizr.js"></script>
		<!-- CSS-->
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
				<h2>Acta de concertaci&oacute;n acad&ecute;mica</h2>
			</div>
		</header>
		<!--valores traidos desde index-->
		<?php
			$semestre = $_POST["s"];
			$materia = $_POST["m"];
			$grupo = $_POST["g"];
		?>

		<!--division que contiene el segundo formulario-->
		<div class="row">
		<!--formulario que contene las preguntas del acta de concertacion-->
		<form action="#" method="post">
			<!--preguntas-->
			<h2><B>Responda SI o NO a las siguentes preguntas:</B></h2>
			
				<article for="pregunta7"><h3><B>1. </B>&#191;El profesor ha cumplido con la atenci&acute;n de asesor&iacute;as e inquietudes 
					en los tiempos establecidos en el microcurriculo&#63;</h3>
				<select id="pregunta7" name="pregunta7" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select></article>
			
				<article for="pregunta8"><h3><B>2. </B>&#191;El profesor ha cumplido con la apertura de las actividades y 
					los recursos seg&uacute;n lo establecido en el cronograma del espacio acad&eacute;mico&#63;</h3>
				<select>
					<option value="">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select></article>
			
				<article for="pregunta9"><h3><B>3. </B>&#191;El profesor ha dispuesto los recursos apropiados para desarrollar 
					los contenidos del espacio acad&eacute;mico&#63;</h3>
				<select id="pregunta9" name="pregunta9" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select></article>
			
				<article for="pregunta10"><h3><B>4. </B>&#191;El profesor ha publicado en el libro de calificaciones de la plataforma, 
					la evaluaci&oacute;n y retroalimentaci&oacute;n <br>a las actividades de los estudiantes, en los tiempos 
					establecidos en el Estatuto Estudiantil&#63;</h3>
				<select id="pregunta10" name="pregunta10" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select></article>
			
			<!--observaciones-->
			<h2>Observaciones:</h2>
				<h3>
					<label for="observaciones">Si tiene algo adicional que desee 
						compartir con nosotros puede escribir sus comentarios<br></label>
                   	<textarea name="observaciones" id="observaciones" placeholder="Escriba sus observaciones"></textarea>
				</h3>
			<section class="contenedorCentrado">
				<!--boton que finaliza el proceso para el usuario-->
				<button class="boton" type="submit" formaction="#">Enviar</button>
			</section>
		</form>
		</div>
	</body>
</html>