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
	} else
	{
		echo "<script>alert('error');</script>";
	}
}
function logout() 
{
	setcookie ( "chsm", "", time () - 3600, "/" );
	header ( "Location: admin.php" );
}
?>