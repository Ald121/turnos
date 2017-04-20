<?php 
//Proceso de conexi�n con la base de datos
include 'conexion.php';

//Inicio de variables de sesi�n
if (!isset($_SESSION)) {
  @session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

//Consultar si los datos son est�n guardados en la base de datos
$consulta= "SELECT * FROM usuario WHERE usuario='".$usuario."' AND pass='".$contrasena."'and estado='ACTIVO'"; 
$resultado= mysql_query($consulta,$conexion) or die (mysql_error());
$fila=mysql_fetch_array($resultado);


if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "login.php"
	</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
	$_SESSION['id_usuario'] = $fila['idusuario'];
	$_SESSION['nombres'] = $fila['nombres'];

	header("Location: index.php");
}
?>