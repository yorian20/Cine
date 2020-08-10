<?php   
   require dirname(__DIR__).'/LogicaNegocio/PeliculaServicios.php';

  //Aquí entra el Registrar y el modificar
  if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
        case 'registrar':
            guardarPelicula();
            header("location:../index.php");
            break;  
        case 'actualizar':
            actualizarPelicula();
            header("location:../index.php");
            break;  
        case 'votar':        
            actualizarPuntuacion();
            header("location:../Vistas/verpeliculas.php");
            break; 
    }
  }

  //Aquí entra el Eliminar
  if(isset($_GET['accion'])){
    switch ($_GET['accion']) {
        case 'eliminar':
            eliminarPelicula();            
            break;          
    }
  }  
  
  
  
  
  function guardarPelicula(){
      $nombre = $_POST['nombre'];
      $director = $_POST['director'];
      $sipnosis = $_POST['sipnosis'];
      $genero = $_POST['genero'];
      $puntuacion = $_POST['puntuacion'];
      
      
      $carpeta="../imagenes/";
  
      $file_name = $_FILES["file"]['name'];
      $file_tmp = $_FILES["file"]['tmp_name'];
      move_uploaded_file($file_tmp,$carpeta.$file_name);
 
     

      $imagen =  $carpeta.$file_name;
      
      $registros = new Pelicula(0,$nombre,$director,$sipnosis,$genero,$puntuacion,$imagen);
      
      $servicios= new PeliculaServicios();
      $servicios->agregarPelicula($registros);
  }
  
  function eliminarPelicula(){
      $codigo = $_GET['codigo'];
       
      $servicios = new PeliculaServicios();
      $servicios->eliminarPelicula($codigo);
  }

  function actualizarPelicula(){
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $director = $_POST['director'];
      $sipnosis = $_POST['sipnosis'];
      $genero = $_POST['genero'];
      $puntuacion = $_POST['puntuacion'];
      
      
      $carpeta="../imagenes/";
  
      $file_name = $_FILES["file"]['name'];
      $file_tmp = $_FILES["file"]['tmp_name'];
      move_uploaded_file($file_tmp,$carpeta.$file_name);
 
     

      $imagen =  $carpeta.$file_name;
      
      $registros = new Pelicula($codigo,$nombre,$director,$sipnosis,$genero,$puntuacion,$imagen);
      
      $servicios= new PeliculaServicios();
      $servicios->modificarPelicula($registros);
  }  
  
    function actualizarPuntuacion(){
        
      $codigo = $_POST['codigo'];
      $puntuacion = $_POST['puntuacion']+$_POST['puntuacionactual'];
     
      $registros = new Pelicula($codigo,'','','','',$puntuacion,'');
      
      $servicios= new PeliculaServicios();
      $servicios->modificarPuntuacion($registros);
  }  

?>