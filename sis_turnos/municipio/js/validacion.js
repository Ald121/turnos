
function validarcedula() {
    var cedula;
    var suma;
    var sumatotal = 0;
    var i;
    var tot = 0;
    cedula = document.customForm.cedula.value;
    var elemento = document.querySelector('#cedula');
    if (cedula.length == 10) {
        for (i = 1; i <= 9; i++) {
            if ((i % 2) != 0) {
                suma = (cedula.substring(i - 1, i)) * 2;
                if (suma > 9)
                    suma = suma - 9;
            } else {
                suma = suma + (cedula.substring(i - 1, i));
            }
            sumatotal = sumatotal + parseInt(suma);

        }
        while (sumatotal > 0) {
            sumatotal = sumatotal - 10;
        }
        if (cedula.substring(9, 10) != (sumatotal * -1)) {
            //elemento.className = "danger";
            elemento.value = "";
            alert("Cédula no valida");
        } else {
            elemento.focus(false);

            //alert("Cédula valida");
        }
    } else if (cedula.length < 10 || cedula.length == 11 || cedula.length == 12) {
        elemento.value = "";
        alert("Cédula no valida");

    } else if (cedula.length == 13) {
        for (i = 1; i <= 9; i++) {
            if ((i % 2) != 0) {
                suma = (cedula.substring(i - 1, i)) * 2;
                if (suma > 9)
                    suma = suma - 9;
            } else {
                suma = suma + (cedula.substring(i - 1, i));
            }
            sumatotal = sumatotal + parseInt(suma);

        }
        while (sumatotal > 0) {
            sumatotal = sumatotal - 10;
        }
        if (cedula.substring(9, 10) != (sumatotal * -1)) {
            //elemento.className = "danger";
            elemento.value = "";
            alert("Cédula no valida");
        } else {

            tot = (cedula.substring(10, 13));
            if (tot == '001' || tot == '002' || tot == '003' || tot == '004') {

            } else {
                elemento.value = "";
                alert("Cédula no valida");
            }
        }

    }
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}




