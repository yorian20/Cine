<?php 
require dirname(__DIR__).'/LogicaNegocio/Genero.php';

class GeneroServicios {

      private $db;  
    
    function __construct() {
        $this->db = new ConexionBD();
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
    
  
}

?>