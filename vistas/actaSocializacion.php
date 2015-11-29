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
				<img class="img1" src="../img/logouq.jpg">
				<h1><B>Programa CIDBA</B></h1>
				<h2>Actas de concertaci&oacute;n acad&eacute;mica</h2>
				<img class="img2" src="../img/logo.jpg">
			</div>
		</header>	
		<!--division que contiene el formulario de la pagina-->
			<div class="row">

				<!--formulario que contene las preguntas del acta de socializacion-->
				<form method="post" data-abide>
					<div class="actaSociacion">
					<!--datos personales del estudiante-->
					<h2><B>Datos estudiante:</B></h2>
					
						<label for="nombre"><h3> Ingrese su nombre:</h3></label>
                    	<input name="nombre" id="nombre" type="text" placeholder="Escriba su nombre completo" required />
					
					
						<label for="codigo"><h3>Ingrese su c&oacute;digo (su documento de identidad)</h3></label>
                    	<input name="codigo" id="codigo" type="text" placeholder="Sin puntos, ni comas, ni espacios" required />
					<?php
						if($opciones[0]['mostrar']==1)
						{
					?>
					<!--preguntas-->
					<h2><B>Acta de socializaci&oacute;n del microcurr&iacute;culo</B><br></h2>
					<p><B>Responda SI o NO a las siguentes preguntas:</B></p>
					
					<fieldset>
						<legend><h3><B>Pregunta 1</B></h3></legend>
						<article for="pregunta1"><h3>&#191;El profesor socializ&oacute; el microcurr&iacute;culo en el espacio virtual del espacio acad&eacute;mico&#63;</h3>
						<p>A trav&eacute;s de un foro, una actividad, etc.</p>
						<label>
							<input type="radio" name="p1" value="1">SI
						</label>
						<label>
							<input type="radio" name="p1" value="0">NO
						</label>
						</article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 2</B></h3></legend>
						<article for="pregunta2"><h3>&#191;El microcurr&iacute;culo define el n&uacute;mero de cr&eacute;ditos del espacio acad&eacute;mico&#63;</h3>
						<label>
							<input type="radio" name="p2" value="1">SI
						</label>
						<label>
							<input type="radio" name="p2" value="0">NO
						</label>
						</article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 3</B></h3></legend>
						<article for="pregunta3"><h3>&#191;El microcurr&iacute;culo define los objetivos del espacio acad&eacute;mico&#63;</h3>
						<label>
							<input type="radio" name="p3" value="1">SI
						</label>
						<label>
							<input type="radio" name="p3" value="0">NO
						</label>
						</article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 4</B></h3></legend>
						<article for="pregunta4"><h3>&#191;El microcurr&iacute;culo define los temas a tratar durante el espacio acad&eacute;mico&#63;</h3>
						<label>
							<input type="radio" name="p4" value="1">SI
						</label>
						<label>
							<input type="radio" name="p4" value="0">NO
						</label>
						</article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 5</B></h3></legend>
						<article for="pregunta5"><h3>&#191;El microcurr&iacute;culo define el plan de evaluaci&oacute;n del espacio acad&eacute;mico, 
							de acuerdo con el art&iacute;culo 45 del Estatuto Estudiantil&#63;</h3>
						<label>
							<input type="radio" name="p5" value="1">SI
						</label>
						<label>
							<input type="radio" name="p5" value="0">NO
						</label></article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 6</B></h3></legend>
						<article for="pregunta6"><h3>&#191;Est&aacute; usted de acuerdo con las condiciones establecidas en el microcurr&iacute;culo&#63;</h3>
						<label>
							<input type="radio" name="p6" value="1">SI
						</label>
						<label>
							<input type="radio" name="p6" value="0">NO
						</label></article>
					</fieldset>
					<!--observaciones-->
					<h2>Observaciones:</h2>
					<h3>
						<label for="observaciones">Si tiene algo adicional que dese&eacute; 
							compartir con nosotros puede escribir sus comentarios<br></label>
                    	<textarea name="observaciones1" id="observaciones1" placeholder="Escriba sus observaciones"></textarea>
					</h3>
					</div>
					<?php
						}	
					?>
					<!--</h3>
					preguntas-->
					<?php
						if($opciones[1]['mostrar']==1)
						{
					?>
					<div class="actaConcertacion">
					<h2><B>Acta de concertacion acad&eacute;mica</B><br></h2>
					<p><B>Responda SI o NO a las siguentes preguntas:</B></p>
					<fieldset>
						<legend><h3><B>Pregunta 1</B></h3></legend>
						<article for="pregunta7"><h3>&#191;El profesor ha cumplido con la atenci&oacute;n de asesor&iacute;as e inquietudes 
							en los tiempos establecidos en el microcurr&iacute;culo&#63;</h3>
						<label>
							<input type="radio" name="p7" value="1">SI
						</label>
						<label>
							<input type="radio" name="p7" value="0">NO
						</label></article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 2</B></h3></legend>
						<article for="pregunta8"><h3>&#191;El profesor ha cumplido con la apertura de las actividades y 
							los recursos seg&uacute;n lo establecido en el cronograma del espacio acad&eacute;mico&#63;</h3>
						<label>
							<input type="radio" name="p8" value="1">SI
						</label>
						<label>
							<input type="radio" name="p8" value="0">NO
						</label></article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 3</B></h3></legend>
						<article for="pregunta9"><h3>&#191;El profesor ha dispuesto los recursos apropiados para desarrollar 
							los contenidos del espacio acad&eacute;mico&#63;</h3>
						<label>
							<input type="radio" name="p9" value="1">SI
						</label>
						<label>
							<input type="radio" name="p9" value="0">NO
						</label></article>
					</fieldset>
					<fieldset>
						<legend><h3><B>Pregunta 4</B></h3></legend>
						<article for="pregunta10"><h3>&#191;El profesor ha publicado en el libro de calificaciones de la plataforma, 
							la evaluaci&oacute;n y retroalimentaci&oacute;n a las actividades de los estudiantes, en los tiempos 
							establecidos en el estatuto estudiantil&#63;</h3>
						<label>
							<input type="radio" name="p10" value="1">SI
						</label>
						<label>
							<input type="radio" name="p10" value="0">NO
						</label></article>
					</fieldset>
					</div>
					<!--observaciones-->
					<h2>Observaciones:</h2>
					<h3>
						<label for="observaciones">Si tiene algo adicional que dese&eacute; 
							compartir con nosotros puede escribir sus comentarios<br></label>
                    	<textarea name="observaciones" id="observaciones" placeholder="Escriba sus observaciones"></textarea>
					</h3>
					<?php
						}	
					?>
					<!--seccion que contiene el boton para rediccionar la pagina-->
					<section class="contenedorCentrado">
						<!--boton que redirecciona al formulario acta de concertacion-->
						<button class="boton" type="submit" >Continuar</button>
					</section>		
				</form>	
			</div>
		
	</body>
</html>