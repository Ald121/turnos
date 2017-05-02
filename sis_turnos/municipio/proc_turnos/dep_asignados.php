<?php
include '../conexion.php';
@session_start();

$consulta = "SELECT * FROM departamentos where idusuario='".$_SESSION["idusuario"]."'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);

while ($fila = $resultado->fetch_array()) {

?>  

                    <div class="metro-nav-block nav-light-purple">
                        <a data-original-title="" href="#">
                        <i class="icon-tags"></i>
                       
                        <div class="status" style="text-transform:uppercase"><strong><?php echo $fila[0];?></strong></div>
                        </a>
                    </div>

                         <?php
}

/*info_general_secre.php?dept=<?php echo $fila[0];?>&dep=<?php echo $fila[1];?>*/

$consulta = "SELECT nombre_modulo,nombre_departamento FROM departamentos where idusuario='".$_SESSION["idusuario"]."'";
$resultado = $conexion->query($consulta)or die ( $conexion->error);
$fila = $resultado->fetch_array();

$consulta2 = "SELECT count(turnos_proc.nroturno) FROM turnos,turnos_proc,departamentos WHERE turnos.nombre_departamento=departamentos.nombre_departamento and nombre_modulo='".$fila['nombre_modulo']."' and turnos_proc.nroturno=turnos.nroturno and (turnos_proc.estado='ACTIVO' or turnos_proc.estado='EN ESPERA') ";
$resultado2 = $conexion->query($consulta2)or die ( $conexion->error);
$fila2 = $resultado2->fetch_array();

?>

 <div class="metro-nav-block nav-light-green">
                        <a data-original-title="" href="#">
                        <i class="icon-user"><?php echo $fila2[0]; ?></i>
                       
                        <div class="status" style="text-transform:uppercase"><strong>CLIENTES EN ESPERA</strong></div>
                        </a>
                    </div>

<div class="metro-nav-block nav-light-blue">
                        <a data-original-title="" href="info_general_secre.php?dept=<?php echo $fila['nombre_departamento'];?>&dep=<?php echo $fila['nombre_modulo'];?>&btn_iniciar=0">
                        <i class="icon-tags"></i>
                       
                        <div class="status" style="text-transform:uppercase"><strong>INICIAR</strong></div>
                        </a>
                    </div>

<div class="metro-nav-block nav-block-orange">
                        <a data-original-title="" href="#" id="btn_detener_atencion">
                        <i class="icon-remove-sign"></i>
                        <div class="status" style="text-transform:uppercase"><strong>DETENER ATENCIÓN</strong></div>
                        </a>
                    </div>

     <script type="text/javascript">

 $(document).ready(function(){

    $("#btn_detener_atencion").on("click", function(){
        var parametros = {};
                $.ajax({
                        data:  parametros,
                        url:   'proc_turnos/detener_atencion.php',
                        type:  'post',
                        beforeSend: function () {
                              // $("#div_asignacion").html("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                                console.log(response);
                        }
                });
            });

    })

 </script>

