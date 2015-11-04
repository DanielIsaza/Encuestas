<!doctype>
<!-- Vista para el acta de socializacion del microcurriculo-->
<html>
	<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Acta socializaci&oacute;n</title>
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
				<h2>Acta de socializaci&oacute;n del microcurr&iacute;culo</h2>
			</div>
		</header>	
			<!--division que contiene el formulario de la pagina-->
			<div class="row">
				<!--formulario-->
				<form action="#" method="post">
					<!--datos personales del estudiante-->
					<h2>Datos estudiante:</h2>
					<p>
						<label for="nombre"> Ingrese su nombre:</label>
                    	<input name="nombre" id="nombre" type="text" placeholder="Escriba su nombre completo" required />
					</p>
					<p>
						<label for="codigo">Ingrese su c&oacute;digo (su documento de identidad)</label>
                    	<input name="codigo" id="codigo" type="text" placeholder="Sin puntos, ni comas, ni espacios" required />
					</p>
					<!--preguntas-->
					<h2>Responda SI o NO a las siguentes preguntas:</h2>
					<p>
						<label for="pregunta1">El microcurrículo define el número de Créditos del Espacio Académico?<br></label>
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
                    	<textarea name="observaciones" id="observaciones" placeholder="Escriba sus observaciones"></textarea>
					</p>
					<!--seccion que contiene el boton para rediccionar la pagina-->
					<section class="contenedorCentrado">
						<button class="boton" type="submit" formaction="actaConcertacion.php">Continuar</button>
					</section>
				</form>
				
			</div>
		
	</body>
</html>