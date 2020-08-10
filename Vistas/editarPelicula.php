<?php 
  require 'include/header.php';
  require dirname(__DIR__).'/LogicaNegocio/PeliculaServicios.php';
  require dirname(__DIR__).'/LogicaNegocio/GeneroObt.php';
  
  if(isset($_GET['codigo'])){
      $codigo = $_GET['codigo'];
      $servicios = new PeliculaServicios();
      $pelicula = $servicios->obtenerPeliculaByCodigo($codigo);
         
 $serviciosgenero = new  GeneroServicios();    
 $peliculageneros = $serviciosgenero->obtenerGenero();
  }
?>
    <body>
    <section>
        <br>
        <h1>EDITAR PELICULA</h1>
        <form method="post" action="../Controladores/PeliculaController.php" enctype="multipart/form-data">	
            <input type="text" placeholder="Codigo" name="codigo" required value="<?=$pelicula->getCodigo();?>" readonly="">
            <input type="text" placeholder="Nombre" name="nombre" required value="<?=$pelicula->getNombre();?>">
            <input type="text" placeholder="Director"  name="director" required value="<?=$pelicula->getDirector();?>">
            <input type="text" placeholder="Sipnosis" name="sipnosis" required value="<?=$pelicula->getSipnosis();?>">
            
            <label>Seleccione el genero</label>
            <select name="genero">
                <?php
                    if(count($peliculageneros) >0):
                foreach ($peliculageneros as $posicion => $genero):?>            
                <option value="<?=$genero->getCodigo_genero();?> ">
                    <?=$genero->getNombre_genero();?>                
                </option>         
                <?php
                    endforeach;
                        endif;
                ?>
            </select>
           <input type="number" value="<?=$pelicula->getPuntuacion();?>" name="puntuacion" required min="0" max="10" > 
            <label>Imagen</label>
            <input type="file" name="file" multiple="" required="">             
            <input type="submit" name="accion" value="actualizar">
        </form>
    </section>
    </body>
</html>
