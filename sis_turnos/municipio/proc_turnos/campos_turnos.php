<?php 
include '../conexion.php';
@session_start();

if ($_SESSION["tipouser"]=='CLIENTE') {


$consulta = "SELECT * FROM departamentos where abreviatura='".$_SESSION["getdep"]."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

$nombre_dep=$fila[0];


$consulta = "SELECT max(nroturno) FROM turnos WHERE estado='EN ESPERA' and idusuario='" . $_SESSION["idusuario"] . "' and nombre_departamento='".$_SESSION['departamento']."' and nombre_departamento='".$nombre_dep."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

$_SESSION["idturno"]=$fila[0];
              
       ?>
          <div class="row-fluid">
           <div class="alert alert-warning span6">
                                <strong>SU TURNO</strong> 
                                <h1><strong><?php
                if($_SESSION["idturno"]==""){
                echo("0");  
                  }
                else
                {echo($_SESSION["idturno"]);}
                
       ?></strong></h1>
                            </div>

    <?php
           $consulta = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc WHERE (turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='EN ESPERA' or turnos_proc.estado='CANCELADO') and turnos.nroturno=turnos_proc.nroturno and idusuario='" . $_SESSION["idusuario"] . "'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = mysqli_fetch_array($resultado);
              
       ?>
                    <div class="alert alert-info span6">
                                <?php
echo "<strong>NRO. MAXIMO DE TURNOS: <h3>2</h3></strong> <br>";
echo "<strong>NRO. DE TURNOS GENERADOS: ".'<h3>'.$fila[0].'</h3></strong>';
       ?>
                            </div>
                            </div>
                            <?php 
};
                             ?>

                             <?php 

if ($_SESSION["tipouser"]=='ADMIN') {


$consulta = "SELECT * FROM departamentos where abreviatura='".$_SESSION["getdep"]."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

$nombre_dep=$fila[0];


$consulta = "SELECT max(nroturno) FROM turnos WHERE estado='EN ESPERA' and idusuario='" . $_SESSION["idusuario"] . "' and nombre_departamento='".$_SESSION['departamento']."' and nombre_departamento='".$nombre_dep."'";
$resultado = $conexion->query($consulta)or die ( $mysqli->error);
$fila = mysqli_fetch_array($resultado);

$_SESSION["idturno"]=$fila[0];
              
       ?>
          <div class="row-fluid">
           <div class="alert alert-warning span6">
                                <strong>SU TURNO</strong> 
                                <h1><strong><?php
                if($_SESSION["idturno"]==""){
                echo("0");  
                  }
                else
                {echo($_SESSION["idturno"]);}
                
       ?></strong></h1>
                            </div>

    <?php
           $consulta = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc WHERE (turnos_proc.estado='ACTIVO' or turnos_proc.estado='ATENDIDO' or turnos_proc.estado='EN ESPERA' or turnos_proc.estado='CANCELADO') and turnos.nroturno=turnos_proc.nroturno and idusuario='" . $_SESSION["idusuario"] . "'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = mysqli_fetch_array($resultado);
              
       ?>
                    <div class="alert alert-info span6">
                                <?php
echo "<strong>NRO. DE TURNOS GENERADOS: ".'<h3>'.$fila[0].'</h3></strong>';
       ?>
                            </div>
                            </div>
                            <?php 
};
                             ?>