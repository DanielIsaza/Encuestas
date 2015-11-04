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
		<!--formulario-->
		<form action="#" method="post">
			<!--preguntas-->
			<h2>Responda SI o NO a las siguentes preguntas:</h2>
			<p>
				<label for="pregunta1">El profesor ha cumplido con la atención de asesorías e inquietudes 
					en los tiempos establecidos en el microcurriculo?<br></label>
				<select id="pregunta1" name="pregunta1" required>
					<option value="" selected="selected">- selecciona -</option>
					<option value="1">SI</option>
					<option value="0">NO</option>
				</select>
			</p>
			<!--observaciones-->
			<h2>Observaciones:</h2>
			<p>
				<label for="observaciones">Si tiene algo adicional que desee 
					compartir con nosotros puede escribir sus comentarios</label>
               	<textarea name="observaciones" id="observaciones" placeholder="Escriba sus observaciones" required></textarea>
			</p>
			<section class="contenedorCentrado">
				<button class="boton" type="submit" formaction="#">Enviar</button>
			</section>
		</form>
		</div>
	</body>
</html>