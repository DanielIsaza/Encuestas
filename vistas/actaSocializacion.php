<?php include_once("../controladores/actaSocializacionC.php");?>
<!doctype>
<!-- Vista para el acta de socializacion del microcurriculo-->
<html>
	<!--cabecera de la pagina-->
	<head>
		<!--titulo de la pestaña de pagina-->
		<title>Programa CIDBA</title>
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
				<h4><B><font color="white">Docente: <?php echo utf8_decode($nDocente); ?></font></B><h4>
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
						<label for="codigo"><h3>Ingrese su c&oacute;digo (su documento de identidad)</h3></label>
                    	<input name="codigo" id="codigo" type="text" placeholder="Sin puntos, ni comas, ni espacios" required />

						<label for="nombre"><h3> Ingrese su nombre:</h3></label>
                    	<input name="nombre" id="nombre" type="text" placeholder="Escriba su nombre completo" required />
					<?php
						if($opciones[0]['mostrar']==1)
						{
					?>
					<!--preguntas del acta de socializacion-->
					<h2><B>Acta de socializaci&oacute;n del microcurr&iacute;culo</B><br></h2>
					<p><B>Responda SI o NO a las siguentes preguntas:</B></p>
					<?php
					for ($i=1;$i < count($eSocializacion);$i++)	
					{
					?>
						<fieldset>
						<legend><h3><B>Pregunta <?php echo $i ?></B></h3></legend>
						<article for="pregunta1"><h3><?php echo utf8_decode($eSocializacion[$i]['enunciado'])?></h3>
						<label>
							<input type="radio" name="p<?php echo $i?>" value="1" required>SI
						</label>
						<label>
							<input type="radio" name="p<?php echo $i?>" value="0">NO
						</label>
						</article>
					</fieldset>
					<?php
					}
					?>
				<!--observaciones del acta de socializacion-->
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
					<!--Muestra el acta de concertacion academica-->
					<?php
						if($opciones[1]['mostrar']==1)
						{
					?>
					<div class="actaConcertacion">
					<h2><B>Acta de concertacion acad&eacute;mica</B><br></h2>
					<p><B>Responda SI o NO a las siguentes preguntas:</B></p>
					</div>
					<?php
					for ($i=1;$i < count($eConcertacion);$i++)	
					{
					?>
					<fieldset>
						<legend><h3><B>Pregunta <?php echo $i ?></B></h3></legend>
						<article for="pregunta<?php echo $i+6 ?>"><h3><?php echo utf8_decode($eConcertacion[$i]['enunciado']);?>
						</h3>
						<label>
							<input type="radio" name="p<?php echo $i+6 ?>" value="1" required>SI
						</label>
						<label>
							<input type="radio" name="p<?php echo $i+6 ?>" value="0">NO
						</label></article>
					</fieldset>
					<?php }?>
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
					<!--Muestra el formato de las evaluaciones de los docentes -->
					<?php
						if($opciones[2]['mostrar']==1)
						{
					?>
					<div class="evaluacionDesempeno">
					<h2><B>Evaluaci&oacute;n de desempe&ntilde;o docente</B><br></h2>
					<p><B>OBJETIVO</B><br>
					Obtener informaci&oacute;n acerca del desempe&ntilde;o de los profesores con el fin de promover acciones que contribuyan a su cualificaci&oacute;n.</p>
					</div>

					<fieldset required>
						<legend><h3><B>Indicador 1</B></h3></legend>
						<article for="pregunta11">
						<label>
							<p ALIGN=left><input type="radio" name="p11" value="0" required><br>
							El profesor analiz&oacute; con los estudiantes el plande trabajo de la asignatura o espacio acad&eacute;mico, al inicio del semestre.</p>
						</label>	
						<label>
							<p ALIGN=left><input type="radio" name="p11" value="1" ><br>
							Analiz&oacute; con los estudiantes el plan de trabajo, ya iniciado el semestre.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p11" value="2"><br>	
							Analiz&oacute; con los estudiantes el plan de trabajo, al finalizar el semestre &oacute; nunca lo hizo.
						</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 2</B></h3></legend>
						<article for="pregunta12">
						<label>
							<p ALIGN=left><input type="radio" name="p12" value="0" required><br>
							Es cumplido para iniciar y finalizar las actividades acad&eacute;micas programadas.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p12" value="1"><br>
							Su cumplimiento es relativo: Generalmente inicia o termina las actividades acad&eacute;micas a destiempo.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p12" value="2"><br>	
							Incumple de manera sistem&aacute;tica con los compromisos acad&eacute;micos.
						</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 3</B></h3></legend>
						<article for="pregunta13">
						<label>
							<p ALIGN=left><input type="radio" name="p13" value="0" required><br>
							Por sus explicaciones y manejo de bibliograf&iacute;a, demuestra que est&aacute; preparado para orientar la asignatura &oacute; espacio acad&eacute;mico.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p13" value="1"><br>
							Por sus explicaciones y manejo de bibliograf&iacute;a, parece estar medianamente preparado para orientar la asignatura.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p13" value="2"><br>	
							Por sus explicaciones y manejo de bibliograf&iacute;a, no parece estar preparado para orientar la asignatura.						
						</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 4</B></h3></legend>
						<article for="pregunta14">
						<label>
							<p ALIGN=left><input type="radio" name="p14" value="0" required><br>
							Emplea variados m&eacute;todos y recursos para orientar la asignatura &oacute; espacio acad&eacute;mico.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p14" value="1"><br>
							Emplea de manera espor&aacute;dica u ocasional alg&uacute;n m&eacute;todo de trabajo diferente al tradicional.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p14" value="2"><br>	
							Emplea de manera exclusiva el mismo m&eacute;todo de trabajo. Sus clases son todas iguales.
						</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 5</B></h3></legend>
						<article for="pregunta15">
						<label>
							<p ALIGN=left><input type="radio" name="p15" value="0" required><br>
							Toma en cuenta o valora la participaci&oacute;n positiva y aportes de los estudiantes. Respeta sus opiniones.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p15" value="1"><br>
							Da alguna importancia o valor a la participaci&oacute;n positiva y aporte de los estudiantes.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p15" value="2"><br>	
							Subestima o no valora la participaci&oacute;n positiva y aportes de los estudiantes. Sus opiniones no cuentan.						
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 6</B></h3></legend>
						<article for="pregunta16">
						<label>
							<p ALIGN=left><input type="radio" name="p16" value="0" required><br>
							Siempre est&aacute; disponible para brindar asesor&iacute;a o ayuda a los estudiantes en el horario acordado.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p16" value="1"><br>
							A veces est&aacute; disponible para brindar asesor&iacute;a o ayuda a los estudiantes en el horario acordado.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p16" value="2"><br>	
							Nunca est&aacute; disponible para brindar asesor&iacute;a o ayuda a los estudiantes en el horario acordado.					
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 7</B></h3></legend>
						<article for="pregunta17">
						<label>
							<p ALIGN=left><input type="radio" name="p17" value="0" required><br>
							Las t&eacute;cnicas y procedimientos que emplea para evaluar el rendimiento de sus estudiantes son variados.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p17" value="1"required><br>
							Ocasionalmente recurre al cambio de t&eacute;cnicas y procedimientos para evaluar el rendimiento de sus estudiantes.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p17" value="2"><br>	
							 Siempre utiliza la misma t&eacute;cnica y procedimiento para evaluar el rendimiento Acad&eacute;mico. No var&iacute;a su forma de evaluar.				
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 8</B></h3></legend>
						<article for="pregunta18">
						<label>
							<p ALIGN=left><input type="radio" name="p18" value="0" required><br>
							Da a conocer a sus estudiantes los resultados de las evaluaciones en la semana siguiente a la presentaci&oacute;n de la prueba.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p18" value="1"><br>
							Los resultados de la evaluaciones son conocidos en la segunda semana despu&eacute;s de presentada la prueba.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p18" value="2"><br>	
							Se demora m&aacute;s de dos semanas despu&eacute;s de presentada la prueba para dar a conocer los resultados de las evaluaciones.			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 9</B></h3></legend>
						<article for="pregunta19">
						<label>
							<p ALIGN=left><input type="radio" name="p19" value="0" required><br>
							Siempre analiza con los estudiantes, en grupo o individualmente, los resultados de sus evaluaciones, se preocupa por su rendimiento.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p19" value="1"><br>
							A veces analiza con los estudiantes, en grupo o individualmente, los resultados de sus evaluaciones y expresa alg&uacute;n inter&eacute;s por su rendimiento.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p19" value="2"><br>	
							Nunca analiza con los estudiantes, en grupo o individualmente, los resultados de sus evaluaciones. No parece interesado por su rendimiento.			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 10</B></h3></legend>
						<article for="pregunta20">
						<label>
							<p ALIGN=left><input type="radio" name="p20" value="0" required><br>
							Presta atenci&oacute;n a los trabajos que asigna a los estudiantes; los corrige y hace recomendaciones.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p20" value="1"><br>
							Presta alguna atenci&oaute;n a los trabajos que asigna a los estudiantes; algunas veces los corrige y hace recomendaciones.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p20" value="2"><br>	
							No presta atenci&oacute;n a los trabajos que asigna a los estudiantes; No corrige ni hace recomendaciones			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 11</B></h3></legend>
						<article for="pregunta21">
						<label>
							<p ALIGN=left><input type="radio" name="p21" value="0" required><br>
							Las relaciones con sus estudiantes se da en t&eacute;rminos de respeto, comprensi&oacute;n y trato igualitario; es abierto al di&aacute;logo.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p21" value="1"><br>
							El trato que da a  sus estudiantes en t&eacute;rminos de respeto, comprensi&oacute;n e igualdad es variable; No siempre se presta para el di&aacute;logo.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p21" value="2"><br>	
							Trata a  sus estudiantes de manera irrespetuosa, descort&eacute;s y desigual. No se presta para el di&aacute;logo.			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 12</B></h3></legend>
						<article for="pregunta22">
						<label>
							<p ALIGN=left><input type="radio" name="p22" value="0" required><br>
							Se interesa por la formaci&oacute;n de sus estudiantes como personas, como ciudadanos, como profesionales comprometidos con la comunidad.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p22" value="1"><br>
							De alguna manera se interesa por la formaci&oacute;n de sus estudiantes como personas, como ciudadanos, como profesionales comprometidos con la comunidad.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p22" value="2"><br>	
							Ning&uacute;n inter&eacute;s tiene en  la formaci&oacute;n de sus estudiantes como personas, como ciudadanos, como profesionales comprometidos con la comunidad.			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 13</B></h3></legend>
						<article for="pregunta23">
						<label>
							<p ALIGN=left><input type="radio" name="p23" value="0" required><br>
							Establece una relaci&oacute;n entre la asignatura o espacio acad&eacute;mico que orienta y la preparaci&oacute;n de los estudiantes para su ejercicio profesional</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p23" value="1"><br>
							Poca relaci&oacute;n hace entre la asignatura o espacio acad&eacute;mico y la preparaci&oacute;n de los estudiantes para su ejercicio profesional.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p23" value="2"><br>	
							Ninguna relaci&oacute;n hace entre la asignatura o espacio acad&eacute;mico y la preparaci&oacute;n de los estudiantes para su ejercicio profesional.			
							</label></p></article>
					</fieldset>

					<fieldset required>
						<legend><h3><B>Indicador 14</B></h3></legend>
						<article for="pregunta24">
						<label>
							<p ALIGN=left><input type="radio" name="p24" value="0" required><br>
							A trav&eacute;s de la orientaci&oacute;n de la asignatura o espacio acad&eacute;mico, crea y estimula ambientes propicios para la investigaci&oacute;n.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p24" value="1"><br>
							Poco ambiente brinda para la investigaci&oacute;n en el desarrollo de la asignatura o espacio acad&eacute;mico.</p>
						</label>
						<label>
							<p ALIGN=left><input type="radio" name="p24" value="2"><br>	
							Ning&uacute;n ambiente brinda para la investigaci&oacute;n en el desarrollo de la asignatura o espacio acad&eacute;mico.		
							</label></p></article>
					</fieldset>
					<!-- Observaciones del acta de los docentes-->
					<h2>Observaciones:</h2>
					<h3>
						<label for="observaciones">Si tiene algo adicional que dese&eacute; 
							compartir con nosotros puede escribir sus comentarios.<br></label>
                    	<textarea name="observacionesEval" id="observacionesEval" placeholder="Escriba sus observaciones"></textarea>
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