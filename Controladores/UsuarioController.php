<?php

  require dirname(__DIR__).'/LogicaNegocio/UsuarioServicios.php';
  session_start();        
  
  if(isset($_POST['accion'])){
      switch ($_POST['accion']){          
          case 'Ingresar':
              $usuario = validarUsuario();
              if(!empty($usuario)){
                  $_SESSION['usuarioLogueado'] = $usuario;
                  header('location:../index.php');
              }else{
                  header('location:../Vistas/login.php');
              }
          break;          
      }
  }

  
  function validarUsuario(){
      
    $correo = $_POST['correo']; 
    $clave = $_POST['clave'];
    
    $servicios = new UsuarioServicios();
    $usuario = $servicios->buscarUsuario($correo, $clave);

    return $usuario;
  }

?>