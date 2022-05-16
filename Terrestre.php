<?php
class Terrestre extends Viaje {

    
    public function __construct($responsableV,
    $arrayPasajero,
    $cantidadMax,
    $destino,
    $codigoViaje,
    $importe,
    $tipoAsiento){
        parent::__construct($responsableV,
        $arrayPasajero,
        $cantidadMax,
        $destino,
        $codigoViaje,
        $importe,
        $tipoAsiento);
        }
    
    public function venderPasaje($objPasajero){
        $importe = parent::venderPasaje($objPasajero);
        if($importe != null){
            $agregarCama = (parent::getTipoAsiento() == 1) ? ($importe * 1.25) : ($importe);  /* 1 = semicama o cama  /  x = asiento   */
            $importe = $importe + $agregarCama;
        }
        return $importe;
    }

}
?>