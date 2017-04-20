
<?php
$con=mysqli_connect("localhost","root","root","municipio");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT max(idusuario) FROM usuario ORDER BY idusuario";
$result=mysqli_query($con,$sql);

// Numeric array
$row=mysqli_fetch_array($result,MYSQLI_NUM);
//echo $row[0];


// Free result set
mysqli_free_result($result);

mysqli_close($con);
?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "municipio";
$id_user = $row[0];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE usuario SET estado='ACTIVO' WHERE idusuario='".$id_user."'";

if ($conn->query($sql) === TRUE) {
    echo "
	<html>
<head>
<meta http-equiv='Refresh' content='1;url=../municipio/login.php'>
</head>

<body>
<p>LA ACTIVACION SE A REALIZADO CORRECTAMENTE </p>
</body>
</html>
	";
} else {
    echo "ERROR EN LA ACTIVACION" . $conn->error;
}

$conn->close();
?>



       