<?php
class Aereo extends Viaje {
    private $nroVuelo;
    private $nombreAereolinea;
    private $escalas;

    
    /*Setters*/
    
    /**
     * Establece el valor de nroVuelo
     */ 
    public function setNroVuelo($nroVuelo){
        $this->nroVuelo = $nroVuelo;
    }

    /**
     * Establece el valor de nombreAereolinea
     */ 
    public function setNombreAereolinea($nombreAereolinea){
        $this->nombreAereolinea = $nombreAereolinea;
    }

    /**
     * Establece el valor de escalas
     */ 
    public function setEscalas($escalas){
        $this->escalas = $escalas;
    }
    

    /*Getters*/
    
    /**
     * Obtiene el valor de nroVuelo
     */ 
    public function getNroVuelo(){
        return $this->nroVuelo;
    }

    /**
     * Obtiene el valor de nombreAereolinea
     */ 
    public function getNombreAereolinea(){
        return $this->nombreAereolinea;
    }

    /**
     * Obtiene el valor de escalas
     */ 
    public function getEscalas(){
        return $this->escalas;
    }

    /*Implementaciones de funciones*/
    
    public function __construct($responsableV,$arrayPasajero,$cantidadMax,$destino,$codigoViaje,$importe,$tipoAsiento,$nroVuelo,$nombreAereolinea,$escalas){
        parent::__construct($responsableV,$arrayPasajero,$cantidadMax,$destino,$codigoViaje,$importe,$tipoAsiento);
        $this->nroVuelo = $nroVuelo;
        $this->nombreAereolinea = $nombreAereolinea;
        $this->escalas = $escalas;
    }

    public function venderPasaje($objPasajero){
        $importe = parent::venderPasaje($objPasajero);
        if($importe != null){
            $tipoAsiento = parent::getTipoAsiento();
            if(($tipoAsiento == "1") && ($this->getEscalas() > 0)){  /* 1 = primera clase  /  2 =estandar  */
                $importe = $importe * 1.6;
            }else if(($tipoAsiento == "1") && ($this->getEscalas() == 0)){
                $importe = $importe * 1.4;
            }else if (($tipoAsiento != "1") && ($this->getEscalas() > 0)){
                $importe = $importe * 1.2;
            }
        }
        return $importe;
    }
    
    public function __toString(){
        $cadena = parent::__toString();
        return $cadena.
                "Numero del vuelo:".$this->getNroVuelo()."\n".
                "Nombre de la aerolineas: ".$this->getNombreAereolinea()."\n".
                "Escalas del vuelo: ".$this->getEscalas()."\n";
    }
    
    
    






}
?>