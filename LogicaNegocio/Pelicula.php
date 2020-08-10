<?php

class Pelicula {
   
    private $codigo;
    private $nombre;
    private $director;
    private $sipnosis;
    private $genero;
    private $puntuacion;
    private $imagen;
    
    function __construct($codigo, $nombre, $director, $sipnosis, $genero, $puntuacion, $imagen) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->director = $director;
        $this->sipnosis = $sipnosis;
        $this->genero = $genero;
        $this->puntuacion = $puntuacion;
        $this->imagen = $imagen;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDirector() {
        return $this->director;
    }

    function getSipnosis() {
        return $this->sipnosis;
    }

    function getGenero() {
        return $this->genero;
    }

    function getPuntuacion() {
        return $this->puntuacion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function setSipnosis($sipnosis) {
        $this->sipnosis = $sipnosis;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setPuntuacion($puntuacion) {
        $this->puntuacion = $puntuacion;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }



           
   
    


}

?>