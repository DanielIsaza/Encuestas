<?php 
include_once("../modelo/Administrador.php");
/**
* 
*/	

/**$asmin = new Administrador();*/
if(isset($_POST['login']))
{
	login();
}

if(isset($_POST['logout']))
{
	echo "ergeogs";
	logout();
}
function login()
	{

		$admin = new Administrador();

		$datos = array();
		$datos['login']= $_POST ["username"];
				$datos['pass']= $_POST ["pass"];

		$respuesta = $admin->isAdmin($datos);

		if($respuesta != null && count($respuesta) >0)
			{
				setcookie("chsm","logedin", time() + 3600, "/");
				echo "<script> window.opener.location.reload(); window.close(); </script>";
				header ( "Location: admin.php" );
				exit();
			} else{
				echo "<script>alert('error');</script>";
				}
	}
function logout() 
	{
		setcookie ( "chsm", "", time () - 3600, "/" );
		header ( "Location: admin.php" );
	}



/**if(isset($_POST['boton']))	
{  
?>
<script language="JavaScript">

function muestra_oculta(id){

	if (document.getElementById){ //se obtiene el id
		var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
		el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
	}
}**/
/**window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
#	muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV **/
#}
#</script>
#>?php  
#}

#?>
