<?php

sleep(1);
include './conexion.php';
if ($_REQUEST) {
    $username = $_REQUEST['cedula'];
    $query = "select * from usuario where cedula = '" . strtolower($username) . "'";
    $results = $conexion->query($query);

    if (mysqli_num_rows(@$results) > 0) { // not available
       echo '

<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>NÙMERO DE CEDULA YA EXISTE, NO SE PUEDE REGISTRAR</strong> </div>
';
    } else {
         echo '

<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>NÙMERO DE CEDULA DISPONIBLE!!</strong> </div>
      ';
    }

function validarCI($strCedula)
{

if(is_null($strCedula) || empty($strCedula)){//compruebo si que el numero enviado es vacio o null
echo "Por Favor Ingrese la Cedula";
}else{//caso contrario sigo el proceso
if(is_numeric($strCedula)){
$total_caracteres=strlen($strCedula);// se suma el total de caracteres
if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
$nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
$ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
//extraigo los valores pares//
$valor2=substr($strCedula, 1, 1);
$valor4=substr($strCedula, 3, 1);
$valor6=substr($strCedula, 5, 1);
$valor8=substr($strCedula, 7, 1);
$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
//extraigo los valores impares//
$valor1=substr($strCedula, 0, 1);
$valor1=($valor1 * 2);
if($valor1>9){ $valor1=($valor1 - 9); }else{ }
$valor3=substr($strCedula, 2, 1);
$valor3=($valor3 * 2);
if($valor3>9){ $valor3=($valor3 - 9); }else{ }
$valor5=substr($strCedula, 4, 1);
$valor5=($valor5 * 2);
if($valor5>9){ $valor5=($valor5 - 9); }else{ }
$valor7=substr($strCedula, 6, 1);
$valor7=($valor7 * 2);
if($valor7>9){ $valor7=($valor7 - 9); }else{ }
$valor9=substr($strCedula, 8, 1);
$valor9=($valor9 * 2);
if($valor9>9){ $valor9=($valor9 - 9); }else{ }

$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
$suma=($suma_pares + $suma_impares);
$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
$digito=($dis - $suma);
if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
if ($digito==$ult_digito){//comparo los digitos final y ultimo
echo '
<div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>NÙMERO DE CEDULA CORRECTA!!</strong> </div>
';
}else{
echo '
<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>CÉDULA NO VÁLIDA</strong>';
}
}else{
echo '
<div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>CÉDULA NO VÁLIDA</strong>';
}
//echo "Es un Numero y tiene el numero correcto de caracteres que es de ".$total_caracteres."";

}else{
echo "Es un Numero y tiene solo".$total_caracteres;
}
}else{
echo '<div id="Success" style="color: #A52A2A; font-weight:bold; ">CÉDULA NO VÁLIDA</div>';
}
}
}

validarCI($_REQUEST['cedula']);



}