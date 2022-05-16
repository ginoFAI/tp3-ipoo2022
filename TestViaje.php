<?php

include "Viaje.php";
include "ResponsableV.php";
include "Pasajero.php";

echo "Desea usar un viaje anterior?: S o N \n";
$aswer = strtoupper(trim(fgets(STDIN)));
if ($aswer == "S") {
    $objRespViaje = new ResponsableV(2, 123123, 'Carlos', 'Gardel');
    $objViaje = new Viaje(23, 'Traful', 30, 12, $objRespViaje);
    $objPasajero1 = new Pasajero('Polaco', 'Goyeneche', 123123, 2999999);
    $objPasajero2 = new Pasajero('Pepito', 'Cibrian', 123123, 5492998222);
    $objPasajero3 = new Pasajero('Juan', 'Peron', 123123, 12312123);
    $objViaje->agregarPasajero($objPasajero1);
    $objViaje->agregarPasajero($objPasajero2);
    $objViaje->agregarPasajero($objPasajero3);
    echo menu();
    $viagiando = trim(fgets(STDIN));
    switch ($viagiando) {

        case '1':
            // 1) Cargar un viaje 
            echo "Ingrese los datos correspondientes:\n";
            echo "Codigo del viaje: \n";
            $viajeCodigo = strtoupper(trim(fgets(STDIN)));
            echo "Destino: \n";
            $lugarDestino = strtoupper(trim(fgets(STDIN)));
            echo "Cantidad máxima de asientos: \n";
            $maxAsientos = trim(fgets(STDIN));
            echo "Cantidad de asientos ocupados: \n";
            $asientosOcup = trim(fgets(STDIN));
            echo "Responsable del viaje: \n ";
            $responsableViaje = crearResponsable();
            $objViaje = new Viaje(
                $viajeCodigo,
                $lugarDestino,
                $maxAsientos,
                $asientosOcup,
                $responsableViaje);
            echo "Ingrese los datos de los pasajeros: \n";
            do {
                $continuar = false;
                $persona = [];
                $persona = infoPasajero();
                $objViaje->agregarPasajero($persona);
                echo "Desea agregar un nuevo pasajero?:(S)i o (N)o \n";
                $seguir = strtoupper(trim(fgets(STDIN)));
                if ($seguir == "S") {
                    $continuar = true;
                }
            } while ($continuar);
            break;

        case '2':
            // 2) Modificar un viaje
            echo modificacionDatos($objViaje);
            break;

        case '3':
            // 3) Ver datos de un viaje
            echo $objViaje;
            break;

        default:
            $finish = false;
            break;
    }
    ;



}
else {
    $finish = true;
    do {
        echo menu();
        $viagiando = trim(fgets(STDIN));
        switch ($viagiando) {

            case '1':
                // 1) Cargar un viaje 
                echo "Ingrese los datos correspondientes: \n";
                echo "Codigo del viaje: \n";
                $viajeCodigo = strtoupper(trim(fgets(STDIN)));
                echo "Destino: \n";
                $lugarDestino = strtoupper(trim(fgets(STDIN)));
                echo "Cantidad máxima de asientos: \n";
                $maxAsientos = trim(fgets(STDIN));
                echo "Cantidad de asientos ocupados: \n";
                $asientosOcup = trim(fgets(STDIN));
                echo "Datos del Responsable del viaje: \n ";
                $responsableViaje = crearResponsable();
                $objViaje = new Viaje(
                    $viajeCodigo,
                    $lugarDestino,
                    $maxAsientos,
                    $asientosOcup,
                    $responsableViaje);
                echo "Catos de los pasajeros: \n";
                do {
                    $continuar = false;
                    $persona = [];
                    $persona = infoPasajero();
                    $objViaje->agregarPasajero($persona);
                    echo "Desea agregar un nuevo pasajero?: (S)i o (N)o \n";
                    $seguir = strtoupper(trim(fgets(STDIN)));
                    if ($seguir == "S") {
                        $continuar = true;
                    }
                } while ($continuar);
                break;

            case '2':
                // 2) Modificar un viaje
                echo modificacionDatos($objViaje);
                break;

            case '3':
                // 3) Ver datos de un viaje
                echo $objViaje;
                break;

            default:
                $finish = false;
                break;
        }
        ;
    } while ($finish);
}


function infoPasajero()
{


    echo "Ingrese apellido: \n";
    $apellido = strtoupper(trim(fgets(STDIN)));
    echo "Ingrese nombre: \n";
    $nombre = strtoupper(trim(fgets(STDIN)));
    echo "Ingrese DNI: \n";
    $dni = trim(fgets(STDIN));
    echo "Ingrese telefono celular: \n";
    $telefono = trim(fgets(STDIN));
    $pasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
    return $pasajero;
}

// menu punto 2

function menu2()
{
    return $menu = "Elija una opción: \n.
            1- Cambiar el código del viaje \n.
            2- Cambiar el destino \n.
            3- Cambiar la cantidad de pasajeros\n.
            4- Cambiar datos de un pasajero\n.
            5- Cambiar la capacidad máxima\n.
            6- Ver viaje \n.
            7- Salir \n.";

}


//// MENU PRINCIIPAL ////

function menu()
{
    $menu = "Ingrese una opción:\n\n
            1) Cargar un viaje \n
            2) Modificar un viaje \n
            3) Ver datos de un viaje \n
            4) Salir\n";

    return $menu;
}



function modificacionDatos($objeto)
{

    do {
        $salida = true;
        echo menu2();
        $eleccion2 = trim(fgets(STDIN));

        switch ($eleccion2) {
            case '1':
                // cambiar el código del viaje
                echo "Ingrese el nuevo código: \n";
                $newCod = strtoupper(trim(fgets(STDIN)));
                $objeto->setCodigoViaje($newCod);
                break;

            case '2':
                //cambiar el destino
                echo "Ingrese el nuevo destino: \n";
                $newDestino = strtoupper(trim(fgets(STDIN)));
                $objeto->setDestino($newDestino);
                break;

            case '3':
                //cambiar la cantidad de pasajeros que viajaron
                echo "Ingrese la nueva cantidad de pasajeros que viajaron: \n";
                $modCantPasajeros = trim(fgets(STDIN));
                $objeto->setCantPasajerosViaje($modCantPasajeros);
                break;

            case '4':
                //cambiar los datos de un pasajero
                $pasajeros = $objeto->getColecPasajeros();
                $nuevoArrayObjPasajeros = datosNuevoPasajero($pasajeros);
                $objeto->setColeccObjPasajero($nuevoArrayObjPasajeros);
                break;

            case '5':
                //cambiar la capacidad máxima de pasajeros
                echo "Ingrese el nuevo valor para la capacidad máxima: \n";
                $capacidadNew = trim(fgets(STDIN));
                $objeto->setCantMaxPasajeros($capacidadNew);
                break;

            case '6':
                //ver viaj
                echo $objeto;
                break;

            default:
                //salir
                $salida = false;
                break;
        }

    } while ($salida);
}


function crearResponsable()
{
    echo "Numero del empleado: ";
    $numero = trim(fgets(STDIN));
    echo "Numero de licencia del empleado: ";
    $licencia = trim(fgets(STDIN));
    echo "Nombre del empleado: ";
    $nombreResp = strtoupper(trim(fgets(STDIN)));
    echo "Apellido del empleado: ";
    $apellidoResp = strtoupper(trim(fgets(STDIN)));
    $objResponsable = new ResponsableV($numero, $licencia, $nombreResp, $apellidoResp);
    return $objResponsable;
}



function datosNuevoPasajero($objPasajeros)
{

    echo "DNI del pasajero a modificar: ";
    $nroDocume = trim(fgets(STDIN));
    echo "Nombre del pasajero: ";
    $nombreNuevo = strtoupper(trim(fgets(STDIN)));
    echo "Apellido del pasajero: ";
    $apellidoNuevo = strtoupper(trim(fgets(STDIN)));
    echo "Numero de telefono del pasajero: ";
    $nroTelNuevo = trim(fgets(STDIN));
    $cambio = $objPasajeros->modificarViajeros($nombreNuevo, $apellidoNuevo, $nroDocume, $nroTelNuevo);
    return $cambio;
}
