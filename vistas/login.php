<?php include_once("../controladores/loginC.php");?>
<html>
<head>

<title>Muestra oculta</title>


</head>

<body>
<form action="#" method="post">
	<!--Al hace llamado a la función solo tienes que idicar el nombre del DIV entre parentesis -->
	<p><a style='cursor: pointer;' onclick="muestra_oculta('contenido_a_mostrar')" title="">Mostrar / Ocultar</a></p>

	<div id="contenido_a_mostrar">
	<p>Este contenido tiene que mostrarse con el link</p>
	</div>
	<div>
		<button name="boton" id="boton" class="boton" type="submit" formaction="#" >Enviar</button>
	<div>
</form>
</body>
</html>