<html>
 
<head>
 
<title>Ejemplo sencillo de AJAX</title>
 
 <script src="../js/jquery-1.8.3.min.js"></script>
 
<script>
function realizaProceso(valorCaja1){
        var parametros = {
                "valorCaja1" : valorCaja1
        };
        $.ajax({
                data:  parametros,
                url:   'ejemplo_ajax_proceso.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}

setInterval( "realizaProceso(document.getElementById('reloj').innerText)", 100 );
   $.ajaxSetup({ cache: false });

$(document).ready(function(){
   $('#reloj').load('reloj_espera.php');
})
</script>
 
</head>
 
<body>

	<div id="reloj"><img src="img/loading.gif"></div>
 
Introduce valor 1
 
<input type="text" name="caja_texto" id="valor1" value="0"/> 
 
 
Introduce valor 2
 
<input type="text" name="caja_texto" id="valor2" value="0"/>
 
Realiza suma
 
<input type="button" href="javascript:;" onclick="realizaProceso(document.getElementById('reloj').innerText);return false;" value="Calcula"/>
 
<br/>
 
Resultado: <span id="resultado">0</span>
 
</body>
 
</html>