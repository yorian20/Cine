<?php


class Usuario {
   
    private $Cedula;
    private $Nombre;
    private $Telefono;
    private $Correo;
    private $Clave;
    
    function __construct($Cedula, $Nombre, $Telefono, $Correo, $Clave) {
        $this->Cedula = $Cedula;
        $this->Nombre = $Nombre;
        $this->Telefono = $Telefono;
        $this->Correo = $Correo;
        $this->Clave = $Clave;
    }
    
    function getCedula() {
        return $this->Cedula;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getClave() {
        return $this->Clave;
    }

    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setClave($Clave) {
        $this->Clave = $Clave;
    }



}
