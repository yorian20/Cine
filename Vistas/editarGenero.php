<?php 
  require 'include/header.php';
  require dirname(__DIR__).'/LogicaNegocio/GeneroServicios.php';
  
  if(isset($_GET['codigo'])){
      $codigo = $_GET['codigo'];
      
       $servicios = new GeneroServicios();    
 $genero = $servicios->obtenerGeneroByCodigo($codigo);

  }
?>
    <body>
    <section>
        <br>
        <h1>EDITAR GENERO</h1>
        <form method="post" action="../Controladores/GeneroController.php" enctype="multipart/form-data">	
            <input type="text" placeholder="Codigo" name="codigo" required value="<?=$genero->getCodigo_genero();?>" readonly="">
            <input type="text" placeholder="Nombre" name="nombre" required value="<?=$genero->getNombre_genero()?>">            
            <input type="submit" name="accion" value="actualizar">
        </form>
    </section>
    </body>
</html>
