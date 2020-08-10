<?php 
require dirname(__DIR__).'/BaseDatos/ConexionBD.php';
require dirname(__DIR__).'/LogicaNegocio/Pelicula.php';

class PeliculaServicios {
    
    private $db;  
    
    function __construct() {
        $this->db = new ConexionBD();
    }
  
    function agregarPelicula($Registros) {
        $this->db->getConeccion();
        $sql = "INSERT INTO PELICULA(Nombre,Director,Sipnosis,Genero,Puntuacion,Imagen) VALUES(?,?,?,?,?,?)";
        $paramType = 'ssssss';
        $paramValue = array($Registros->getNombre(),$Registros->getDirector(),$Registros->getSipnosis(),$Registros->getGenero(),$Registros->getPuntuacion(),$Registros->getImagen());
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }
    
    function modificarPelicula($Registros){
        $this->db->getConeccion();
        $sql = "UPDATE PELICULA SET Nombre = ?,Director= ?,Sipnosis = ?,Genero = ?,Puntuacion = ?,Imagen = ? WHERE Codigo = ?";
        $paramType = "ssssssi";
         $paramValue = array($Registros->getNombre(),$Registros->getDirector(),$Registros->getSipnosis(),$Registros->getGenero(),$Registros->getPuntuacion(),$Registros->getImagen(),$Registros->getCodigo());
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }
    
        function modificarPuntuacion($Registros){
        $this->db->getConeccion();
        $sql = "UPDATE PELICULA SET Puntuacion = ? WHERE Codigo = ?";
        $paramType = "si";
         $paramValue = array($Registros->getPuntuacion(),$Registros->getCodigo());
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }
    
    function eliminarPelicula($codigo) {
        $this->db->getConeccion();
        $sql = "DELETE FROM PELICULA WHERE Codigo= ?";
        $paramType = "i";
        $paramValue = array($codigo);
        $this->db->executeQuery($sql, $paramType, $paramValue);
        $this->db->cerrarConeccion();
    }    
   
    function obtenerPelicula() {
        $this->db->getConeccion();        
        $sql = "select peli.Codigo,peli.Nombre,peli.Director,peli.Sipnosis,gen.Nombre_Genero,peli.Puntuacion,peli.Imagen
        from Pelicula as peli inner join genero as gen on peli.Genero = gen.Codigo_Genero group by Codigo";
        $registros = $this->db->executeQueryReturnData($sql);
        $pelis =array();
        
        foreach ($registros as $posicion => $row){
            $peli = new Pelicula($row['Codigo'],$row['Nombre'],$row['Director'],$row['Sipnosis'],$row['Nombre_Genero'],$row['Puntuacion'],$row['Imagen']);
            array_push($pelis, $peli);
        }
        $this->db->cerrarConeccion();        
        return $pelis;
    } 
    
    function obtenerPeliculaByCodigo($codigo) {
        $this->db->getConeccion();
        $sql = "SELECT * FROM PELICULA WHERE Codigo = $codigo";
        $registros = $this->db->executeQueryReturnData($sql);
        $this->db->cerrarConeccion();
        
        $peli = new Pelicula($registros[0]['Codigo'],$registros[0]['Nombre'],$registros[0]['Director'],$registros[0]['Sipnosis'],$registros[0]['Genero'],$registros[0]['Puntuacion'],$registros[0]['Imagen']);
        return $peli;
    } 
    

   

}

?>