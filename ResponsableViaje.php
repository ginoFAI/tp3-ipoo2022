<?php
class ResponsableV{
    private $nombre;
    private $apellido;
    private $numEmpleado;
    private $numLicencia;

    /**Setters**/

    /**
     * Establece el valor de numLicencia
     */ 
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    /**
     * Establece el valor de numEmpleado
     */ 
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    /**
     * Establece el valor de apellido
     */ 
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Establece el valor de nombre
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }


	/*Getters**/

    /**
     * Obtiene el valor de nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */ 
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Obtiene el valor de numEmpleado
     */ 
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    /**
     * Obtiene el valor de numLicencia
     */ 
    public function getNumLicencia(){
        return $this->numLicencia;
    }


	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

	public function __construct($nombre,$apellido,$numEmpleado,$numLicencia)
	{
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numEmpleado = $numEmpleado;
		$this->numLicencia = $numLicencia;
	}

	public function __toString()
	{
		return ("Nombre del responsable del viaje: ".$this->getNombre()."\n".
				"Apellido del responsable del viaje: ".$this->getApellido()."\n".
				"Numero de empleado: ".$this->getNumEmpleado()."\n".
				"Numero de licencia: ".$this->getNumLicencia()."\n");
	}

}
?>