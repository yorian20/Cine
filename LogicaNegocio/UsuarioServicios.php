<?php

require dirname(__DIR__).'/BaseDatos/ConexionBD.php';
require dirname(__DIR__).'/LogicaNegocio/Usuario.php';

class UsuarioServicios {
    
    private $db;  
    
    function __construct() {
        $this->db = new ConexionBD();
    }

    //Buscar usuario por correo y password
    function buscarUsuario($correo,$password){
        $this->db->getConeccion();
        $sql = "SELECT * FROM USUARIOS WHERE CORREO='$correo' AND CLAVE='$password'";
        $registros = $this->db->executeQueryReturnData($sql);        
        $this->db->cerrarConeccion();      
        if($registros != null){
           $usuario = new Usuario($registros[0]['Cedula'],$registros[0]['Nombre'],$registros[0]['Telefono'],$registros[0]['Correo'],$registros[0]['Clave']);
        }
       return $usuario;
    }     
}
