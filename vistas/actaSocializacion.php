<?php include_once("../controladores/actaSocializacionC.php");?>
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
		<script src="../js/modernizr.js"></script>
		<!-- CSS-->
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
				<h2>Acta de socializaci&oacute;n del microcurr&iacute;culo</h2>
			</div>
		</header>	
		<!--division que contiene el formulario de la pagina-->
			<div class="row">
				<!--formulario que contene las preguntas del acta de socializacion-->
				<form method="post" data-abide>
					<!--datos personales del estudiante-->
					<h2><B>Datos estudiante:</B></h2>
					
						<label for="nombre"><h3> Ingrese su nombre:</h3></label>
                    	<input name="nombre" id="nombre" type="text" placeholder="Escriba su nombre completo" required />
					
					
						<label for="codigo"><h3>Ingrese su c&oacute;digo (su documento de identidad)</h3></label>
                    	<input name="codigo" id="codigo" type="text" placeholder="Sin puntos, ni comas, ni espacios" required />
					
					<!--preguntas-->
					<h2><B>Responda SI o NO a las siguentes preguntas:</B><br></h2>
					
					
						<article for="pregunta1"><h3><B>1.</B> &#191;El profesor socializ&oacute; el microcurr&iacute;culo en el Espacio virtual del Espacio Acad&eacute;mico&#63;</h3>
						<p>A trav&eacute;s de un foro, una actividad, etc.</p>
						<select id="pregunta1" name="pregunta1" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select></article>
					
					
						<article for="pregunta2"><h3><B>2.</B> &#191;El microcurr&iacute;culo define el n&uacute;mero de Cr&eacute;ditos del Espacio Acad&eacute;mico&#63;</h3>
						<select id="pregunta2" name="pregunta2" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select></article>
					
						<article for="pregunta3"><h3><B>3. </B>&#191;El microcurr&iacute;culo define los Objetivos del Espacio Acad&eacute;mico&#63;</h3>
						<select id="pregunta3" name="pregunta3" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select></article>
					
						<article for="pregunta4"><h3><B>4. </B>&#191;El microcurr&iacute;culo define los Temas a tratar durante el Espacio Acad&eacute;mico&#63;</h3>
						<select id="pregunta4" name="pregunta4" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select></article>
					
						<article for="pregunta5"><h3><B>5. </B>&#191;El microcurr&iacute;culo define el plan de evaluaci&oacute;n del Espacio Acad&eacute;mico, 
							de acuerdo con el art&iacute;culo 45 del Estatuto Estudiantil&#63;</h3>
						<select id="pregunta5" name="pregunta5" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select></article>
					
						<article for="pregunta6"><h3><B>6. </B>&#191;Est&aacute; usted de acuerdo con las condiciones establecidas en el microcurr&iacute;culo&#63;</h3>
						<select id="pregunta6" name="pregunta6" required>
							<option value="" selected="selected">- selecciona -</option>
							<option value="1">SI</option>
							<option value="0">NO</option>
						</select> </article>
					</h3>
					<!--observaciones-->
					<h2>Observaciones:</h2>
					<h3>
						<label for="observaciones">Si tiene algo adicional que desee 
							compartir con nosotros puede escribir sus comentarios<br></label>
                    	<textarea name="observaciones" id="observaciones" placeholder="Escriba sus observaciones"></textarea>
					</h3>
					<!--seccion que contiene el boton para rediccionar la pagina-->
					<section class="contenedorCentrado">
						<!--boton que redirecciona al formulario acta de concertacion-->
						<button class="boton" type="submit" >Continuar</button>
					</section>
				</form>
				
			</div>
		
	</body>
</html>