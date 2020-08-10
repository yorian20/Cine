<?php   
   require dirname(__DIR__).'/LogicaNegocio/GeneroServicios.php';

  //Aquí entra el Registrar y el modificar
  if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
        case 'registrar':
            guardarGenero();
            break;  
        case 'actualizar':
            actualizarGenero();
            break;  
    }
  }

  //Aquí entra el Eliminar
  if(isset($_GET['accion'])){
    switch ($_GET['accion']) {
        case 'eliminar':
            eliminarLibro();            
            break;          
    }
  }  
  
  
  header("location:../index.php");
  
  function guardarGenero(){
      $nombre = $_POST['nombre'];

       
       $registros = new Genero(0,$nombre);
      
      $servicios= new GeneroServicios();
      $servicios->agregarGenero($registros);
  }
  
  function eliminarGenero(){
      $codigo = $_GET['codigo'];
       
      $servicios = new GeneroServicios();
      $servicios->eliminarGenero($codigo);
  }

  function actualizarGenero(){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
    
      
      $registros = new Genero($codigo,$nombre);
      
      $servicios= new GeneroServicios();
      $servicios->modificarGenero($registros);
  }  

?>