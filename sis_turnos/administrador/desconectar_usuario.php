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
	alert("No ha iniciado ninguna sesi�n, por favor reg�strese")
	self.location = "login.php"
	</script>';}
?>



