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
		<!-- CSS-->
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	
	<!--cuerpo de la pagina-->
	<body>
		<!--encabezado de la pagina-->
		<header>
			<!-- división que contiene el encabezado de la pagina-->
			<div class="encabezado">
				<h1>Programa CIDBA</h1>
				<h2>Acta de concertaci&oacute;n acad&ecute;mica</h2>
			</div>
		</header>
		<!--division que contiene el segundo formulario-->
		<div class="row">
		<!--formulario que contene las preguntas del acta de concertacion-->
		<form action="#" method="post">
			<!--preguntas-->
			<h2>Responda SI o NO a las siguentes preguntas:</h2>
			<p>
				<label for="pregunta7">&#191;El profesor ha cumplido con la atenci&acute;n de asesor&iacute;as e inquietudes 
					en los tiempos establecidos en el microcurriculo&#63;<br><br></label>
				<select id="pregunta7" name="pregunta7" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</p> 
			<p>
				<label for="pregunta8">&#191;El profesor ha cumplido con la apertura de las actividades y 
					los recursos seg&uacute;n lo establecido en el cronograma <br> del espacio acad&eacute;mico&#63;<br><br></label>
				<select>
					<option value="">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</p>
			<p>
				<label for="pregunta9">&#191;El profesor ha dispuesto los recursos apropiados para desarrollar 
					los contenidos del espacio acad&eacute;mico&#63;<br><br></label>
				<select id="pregunta9" name="pregunta9" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</p>
			<p>
				<label for="pregunta10">&#191;El profesor ha publicado en el libro de calificaciones de la plataforma, 
					la evaluaci&oacute;n y retroalimentaci&oacute;n <br>a las actividades de los estudiantes, en los tiempos 
					establecidos en el Estatuto Estudiantil&#63;<br><br></label>
				<select id="pregunta10" name="pregunta10" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</p>
			<!--observaciones-->
			<h2>Observaciones:</h2>
			<p>
				<label for="observaciones2">Si tiene algo adicional que desee 
					compartir con nosotros puede escribir sus comentarios<br></label>
               	<textarea name="observaciones2" id="observaciones2" placeholder="Escriba sus observaciones" required></textarea>
			</p>
			<section class="contenedorCentrado">
				<!--boton que finaliza el proceso para el usuario-->
				<button class="boton" type="submit" formaction="#">Enviar</button>
			</section>
		</form>
		</div>
	</body>
</html>