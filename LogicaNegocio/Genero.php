<?php

class Genero {
   
    private $codigo_genero;
    private $nombre_genero;

    function __construct($codigo_genero, $nombre_genero) {
        $this->codigo_genero = $codigo_genero;
        $this->nombre_genero = $nombre_genero;
    }
    
    function getCodigo_genero() {
        return $this->codigo_genero;
    }

    function getNombre_genero() {
        return $this->nombre_genero;
    }

    function setCodigo_genero($codigo_genero) {
        $this->codigo_genero = $codigo_genero;
    }

    function setNombre_genero($nombre_genero) {
        $this->nombre_genero = $nombre_genero;
    }


    
}

?>
