<?php include("../controladores/reporteProgramaC.php"); 
	  include("../controladores/loginC.php");
?>
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
				<img class="img1" src="../img/logouq.jpg">
				<h1><B>Programa CIDBA</B></h1>
				<h2>Bienvenido administrador</h2>
				<img class="img2" src="../img/logo.jpg">
			</div>
		</header>

		<!-- división con el login de la pag-->
    	<div class="row">
    		<?php
				if(!isset($_COOKIE["chsm"]))
				{
			?>
    		<form action="#" method="POST">
				<div class="form-group">
					<label for="username"><h3>Username:</h3></label>
					<input type="text" placeholder="Ingrese su username" name="username" id="username" required/>
				</div>	
				<div class="form-group">
					<label for="pass"><h3>Contraseña:</h3></label>
					<input type="password" placeholder="Ingrese su contraseña" name="pass" id="pass" required/>
				</div>	
				<button type="submit" id="login" name="login">Iniciar Sesión</button>
			</form>

    	</div>
    	<?php
			}else
			{
		?>
		
		<!--<a href="/Encuestas/vistas/admin">Cerrar Sesi&oacute;n</a>-->
		<!-- división con el contenido de la pag-->
    	<div class="row">
    		<form action="#" method="post">
    			
    			<h2>Aqu&iacute; puede generar los reportes</h2>
    			<div>
    				<h3>Generar reporte completo (Todos los espacios academicos)</h3>
    				<button class="botonP" name="reporteGeneral" type="submit" id="reporteGeneral" >Generar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por espacio academico</h3>
    				<button class="botonP" name="reporteMaterias" type="submit" formaction="reporteMateria.php" >Generar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por grupo</h3>
    				<button class="botonP" name="hola" type="reporteGrupo" formaction="reporteGrupo.php" >Generar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por profesor</h3>
    				<button class="botonP" name="reporteProfesor" type="reporteProfesor" formaction="reporteProfesor.php" >Generar</button>
    			</div>
    			<div>
    				<h3>Generar reporte por periodo acad&eacute;mico</h3>
    				<button class="botonP" name="reporteProfesor" type="reportePeriodo" formaction="reportePeriodo.php" >Generar</button>
    			</div>
    			<button type="submit" id="logout" name="logout">Cerrar Sesi&oacute;n</button>
    		</form>
		</div>
		<?php
			}
		?>
	</body>
</html>