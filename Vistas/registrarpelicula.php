<?php   require_once './include/header.php';
  require dirname(__DIR__).'/LogicaNegocio/GeneroServicios.php';

 
 $servicios = new GeneroServicios();    
 $peliculageneros = $servicios->obtenerGenero();
?>
<body>
    <section>
        <br>
        <h1>REGISTRAR PELICULA</h1> 
        <form method="post" action="../Controladores/PeliculaController.php" enctype="multipart/form-data">		
            <input type="text" placeholder="Nombre" name="nombre" required>
            <input type="text" placeholder="Director"  name="director" required>
            <input type="text" placeholder="Sipnosis" name="sipnosis" required> 
            <label>Seleccione el genero</label>
            <select name="genero">
                <?php
                    if(count($peliculageneros) >0):
                foreach ($peliculageneros as $posicion => $genero):?>            
                <option value="<?=$genero->getCodigo_genero();?>">
                    <?=$genero->getNombre_genero();?>                
                </option>         
                <?php
                    endforeach;
                        endif;
                ?>
            </select>
            <input type="text" value="0" name="puntuacion" required readonly=""> 
            <label>Imagen</label>
            <input type="file" name="file" multiple="" required="">
            <input type="submit" name="accion" value="registrar">
 
        </form>
    </section>
    </body>
</html>
