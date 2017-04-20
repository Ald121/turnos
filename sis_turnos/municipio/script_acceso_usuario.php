<?php 
//Proceso de conexi�n con la base de datos
include 'conexion.php';

//Inicio de variables de sesi�n
if (!isset($_SESSION)) {
  @session_start();
}

date_default_timezone_set('America/Guayaquil');
$hora_now= strtotime(date('H:i'));
//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

$consulta= "SELECT tipo_user FROM usuario WHERE usuario='".$usuario."' AND pass='".$contrasena."'and estado='ACTIVO'"; 
$resultado = $conexion->query($consulta);
$fila=mysqli_fetch_array($resultado);

if (count($fila)==0) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
if (isset($_POST['index_login'])) {
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "../index.html"
	</script>';
}
else{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "login.php"
	</script>';
}
}

$tipo_usuario=$fila['tipo_user'];

$consulta= "SELECT * FROM parametros "; 
$resultado = $conexion->query($consulta);
$fila=mysqli_fetch_array($resultado);

$hora_ini=strtotime($fila['hora_inicio']);
$hora_fin=strtotime($fila['hora_fin']);

$hora_ini_normal=$fila['hora_inicio'];
$hora_fin_normal=$fila['hora_fin'];


if ($hora_now>$hora_ini&&$hora_now<$hora_fin&&($tipo_usuario=='CLIENTE'||$tipo_usuario=='SECRE')) {
	//Consultar si los datos son est�n guardados en la base de datos

$consulta = "SELECT min(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE 
turnos.nombre_departamento=departamentos.nombre_departamento  
and turnos_proc.nroturno=turnos.nroturno and turnos_proc.estado='EN ESPERA'";

$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nroturno_inicial=$fila[0];

//echo $nroturno_inicial;


$consulta= "SELECT * FROM usuario WHERE usuario='".$usuario."' AND pass='".$contrasena."'and estado='ACTIVO'"; 
$resultado = $conexion->query($consulta);
$fila=mysqli_fetch_array($resultado);


if (count($fila)==0) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{

if (isset($_POST['index_login'])) {
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "../index.html"
	</script>';
}
else{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "login.php"
	</script>';
}
}
else //opcion2: Usuario logueado correctamente
{

	//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
	$_SESSION['idusuario'] = $fila['idusuario'];
	$_SESSION['nombres'] = $fila['nombres'];

 	$_SESSION["turnoactual"]=$nroturno_inicial;


	header("Location: index.php");
}
}
else{
if (isset($_POST['index_login'])) {
	echo '<script language = javascript>
	alert("El sistema unicamente funciona de '.$hora_ini_normal.' a '.$hora_fin_normal.'")
	self.location = "../index.html"
	</script>';
}
else{
	echo '<script language = javascript>
	alert("El sistema unicamente funciona de '.$hora_ini_normal.' a '.$hora_fin_normal.'")
	self.location = "login.php"
	</script>';
}

};



if ($tipo_usuario=='ADMIN') {
	//Consultar si los datos son est�n guardados en la base de datos

$consulta = "SELECT min(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE 
turnos.nombre_departamento=departamentos.nombre_departamento  
and turnos_proc.nroturno=turnos.nroturno and turnos_proc.estado='EN ESPERA'";

$resultado = $conexion->query($consulta);
$fila = mysqli_fetch_array($resultado);
$nroturno_inicial=$fila[0];

//echo $nroturno_inicial;


$consulta= "SELECT * FROM usuario WHERE usuario='".$usuario."' AND pass='".$contrasena."'and estado='ACTIVO'"; 
$resultado = $conexion->query($consulta);
$fila=mysqli_fetch_array($resultado);



if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{

if (isset($_POST['index_login'])) {
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "../index.html"
	</script>';
}
else{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "login.php"
	</script>';
}
}
else //opcion2: Usuario logueado correctamente
{

	//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
	$_SESSION['idusuario'] = $fila['idusuario'];
	$_SESSION['nombres'] = $fila['nombres'];

 $_SESSION["turnoactual"]=$nroturno_inicial;


	header("Location: index.php");
}
}






?>