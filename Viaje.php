<?php
class Viaje
{
    private $codigoViaje;
    private $destino;
    private $cantidadMax;
    private $arrayPasajero;
    private $responsableV;
    private $tipoAsiento;
    private $importe;

   //setters 

    public function setCantidadMax($cantidadMax)
    {
        $this->cantidadMax = $cantidadMax;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function setCodigoViaje($codigoViaje)
    {
        $this->codigoViaje = $codigoViaje;
    }

    public function setArrayPasajero($arrayPasajero)
    {
        $this->arrayPasajero = $arrayPasajero;
    }


    public function setResponsableV($responsableV)
    {
        $this->responsableV = $responsableV;
    }


    public function setTipoAsiento($tipoAsiento)
    {
        $this->tipo = $tipoAsiento;
    }

  
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }


    //geters

    public function getArrayPasajero()
    {
        return $this->arrayPasajero;
    }


    public function getCantidadMax()
    {
        return $this->cantidadMax;
    }


    public function getDestino()
    {
        return $this->destino;
    }


    public function getCodigoViaje()
    {
        return $this->codigoViaje;
    }


    public function getResponsableV()
    {
        return $this->responsableV;
    }


    public function getTipoAsiento()
    {
        return $this->tipoAsiento;
    }


    public function getImporte()
    {
        return $this->importe;
    }



    //Implemenraciones

   
    public function __construct(
        $responsableV,
        $arrayPasajero,
        $cantidadMax,
        $destino,
        $codigoViaje,
        $importe,
        $tipoAsiento)
    {
        $this->responsableV = $responsableV;
        $this->arrayPasajero = $arrayPasajero;
        $this->cantidadMax = $cantidadMax;
        $this->destino = $destino;
        $this->codigoViaje = $codigoViaje;
        $this->importe = $importe;
        $this->tipoAsiento = $tipoAsiento;
    }


    public function agregarPasajero($nuevoObjPasajero)
    {
        $existe = $this->existePasajero($nuevoObjPasajero->getDocumento());
        if (!$existe) {
            $arrayPasajeros = $this->getArrayPasajero();
            array_push($arrayPasajeros, $nuevoObjPasajero);
            $this->setArrayPasajero($arrayPasajeros);
        }
    }

    public function quitarPasajero($documento)
    {
        $arrayPasajeros = $this->getArrayPasajero();
        $dimension = count($arrayPasajeros);
        $buscar = true;
        $i = 0;
        while ($buscar && $i <= $dimension) {
            if ($arrayPasajeros[$i]->getDocumento() == $documento) {
                $buscar = false;
            }
            else {
                $i++;
            }
        }
        if (!$buscar) {
            unset($arrayPasajeros[$i]);
            sort($arrayPasajeros);
            $this->setArrayPasajero($arrayPasajeros);
            $verificacion = true;
        }
        else {
            $verificacion = false;
        }
        return $verificacion;
    }

    public function hayPasajesDisponible()
    {
        $capacidad = count($this->getArrayPasajero());
        $verificacion = ($capacidad < $this->getCantidadMax()) ? true : false;
        return $verificacion;
    }


    public function cambiarDatoPasajero($documento, $opcion, $dato)
    {
        $objPasajero = $this->buscarPasajero($documento);
        switch ($opcion) {
            case 1:
                $objPasajero->setNombre($dato);
                break;
            case 2:
                $objPasajero->setApellido($dato);
                break;
            case 3:
                $objPasajero->setTelefono($dato);
                break;
        }
    }

    public function cambiarDatoResponsable($opcion, $dato)
    {
        $objRespo = $this->getResponsableV();
        switch ($opcion) {
            case 1:
                $objRespo->setNombre($dato);
                break;
            case 2:
                $objRespo->setApellido($dato);
                break;
            case 3:
                $objRespo->setNumEmpleado($dato);
                break;
            case 4:
                $objRespo->setNumLicencia($dato);
                break;
        }
    }

    public function cantidadPasajeros()
    {
        $cantidad = count($this->getArrayPasajero());
        return $cantidad;
    }


    public function existePasajero($dni)
    {
        $arrayPasajeros = $this->getArrayPasajero();
        $i = 0;
        $dimension = count($arrayPasajeros);
        $existe = false;
        if ($dimension > 0) {
            do {
                if ($arrayPasajeros[$i]->getDocumento() == $dni) {
                    $existe = true;
                }
                else {
                    $i++;
                }
            } while (!$existe && ($i < $dimension));
        }
        return ($existe);
    }


    public function buscarPasajero($dni)
    {
        $arrayPasajeros = $this->getArrayPasajero();
        $i = 0;
        $dimension = count($arrayPasajeros);
        $pasajero = null;
        $seguirBuscando = true;
        if ($this->existePasajero($dni)) {
            do {
                if ($arrayPasajeros[$i]->getDocumento() == $dni) {
                    $seguirBuscando = false;
                    $pasajero = $arrayPasajeros[$i];
                }
                else {
                    $i++;
                }
            } while ($seguirBuscando && ($i < $dimension));
        }
        return ($pasajero);
    }

    public function verUnPasajero($documento)
    {
        $objPasajero = $this->buscarPasajero($documento);
        return $objPasajero;
    }

    public function venderPasaje($objPasajero)
    {
        $importe = null;
        if ($this->hayPasajesDisponible()) {
            $this->agregarPasajero($objPasajero);
            $importe = $this->getImporte();
        }
        return $importe;
    }

    public function __toString()
    {
        return ("El destino del viaje es: " . $this->getDestino() . "\n" .
            "El codigo del viaje es: " . $this->getCodigoViaje() . "\n" .
            "La capacidad maxima del viaje es: " . $this->getCantidadMax() . "\n" . "\n" .
            "El responsable del viaje es: " . "\n" . $this->getResponsableV() . "\n" .
            "Los pasajeros del viaje son: " . "\n" . $this->pasajerosToString() . "\n");
    }


    private function pasajerosToString()
    {
        $arrayPasajeros = $this->getArrayPasajero();
        $separador = "************************";
        $toString = $separador . "\n";
        foreach ($arrayPasajeros as $pasajero) {
            $toString .= $pasajero . "\n" . $separador . "\n";
        }
        return $toString;
    }



}

?>