<?php 
require dirname(__DIR__).'/BaseDatos/ConexionBD.php';
require dirname(__DIR__).'/LogicaNegocio/Genero.php';

class GeneroServicios {
    
    private $db;  
    
    function __construct() {
        $this->db = new ConexionBD();
    }
  
    function agregarGenero($Registros) {
        $this->db->getConeccion();
        $sql = "INSERT INTO GENERO(Nombre_Genero) VALUES(?)";
        $paramType = 's';
        $paramValue = array($Registros->getNombre_genero());
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }
    
    function modificarGenero($Registros) {
        $this->db->getConeccion();
        $sql = "UPDATE GENERO SET NOMBRE_GENERO = ? WHERE Codigo_Genero = ?";
        $paramType = "si";
        $paramValue = array($Registros->getNombre_genero(),$Registros->getCodigo_genero());
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }
    
    function eliminarGnero($codigo) {
        $this->db->getConeccion();
        $sql = "DELETE FROM GENERO WHERE Codigo_Genero = ?";
        $paramType = "i";
        $paramValue = array($codigo);
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }    
   
    function obtenerGenero() {
        $this->db->getConeccion();        
        $sql = "SELECT * FROM GENERO ORDER BY Codigo_Genero";
        $registros = $this->db->executeQueryReturnData($sql);
        $pelis =array();
        
        foreach ($registros as $posicion => $row){
            $peli = new Genero($row['Codigo_Genero'],$row['Nombre_Genero']);
            array_push($pelis, $peli);
        }
        $this->db->cerrarConeccion();        
        return $pelis;
    } 
    
    function obtenerGeneroByCodigo($codigo) {
        $this->db->getConeccion();
        $sql = "SELECT * FROM GENERO WHERE Codigo_Genero = $codigo";
        $registros = $this->db->executeQueryReturnData($sql);
        $this->db->cerrarConeccion();
        
        $libro = new Genero($registros[0]['Codigo_Genero'],$registros[0]['Nombre_Genero']);
        return $libro;
    }    
}

?>