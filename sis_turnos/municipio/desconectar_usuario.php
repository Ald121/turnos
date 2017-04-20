<?php 
@session_start();

if ($_SESSION['nombres'])
{	
	session_destroy();
	echo '<script language = javascript>alert("SU SESION HA TERMINADO CORRECTAMENTE")self.location = "index.php"</script>';    
}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor regístrese")
	self.location = "login.php"
	</script>';}
?>



