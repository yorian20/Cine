<?php 
 
  require dirname(__DIR__).'/LogicaNegocio/PeliculaServicios.php';

 
 $servicios = new PeliculaServicios();    
 $peliculas = $servicios->obtenerPelicula();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tico Cines</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" type="text/css" href="./CSS/estilos1.css">
         
        <style>
            
section{
	position: relative;
	margin: auto;
	width:400px;
}

section h1{
	position: relative;
	margin: auto;
	padding:10px;
	text-align: center;
}

section form{
	position:relative;
	margin:auto;
	width:400px;
}

section form input{
	display:inline-block;
	padding:10px;
	width:95%;
	margin:5px;
}

section form input[type="submit"]{
	position:relative;
	margin:20px auto;
	left:4.5%;

}

table{
	position:relative;
	margin:auto;
	width:100%;
}

table#t1{
	left:-20%;
}


table thead tr th{
	padding:10px;
}

table tbody tr td{
	padding:10px;
}

html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}

        </style>
    </head>
<body>
    <div class="row">
        <div class="col-sm-6"> 
        <section>
    <br>
    <h1>Peliculas</h1>
    <input class="form-control" id="teclado" type="text"  placeholder="Buscar">
  <br>
    <table class="table table-bordered table-striped" > 
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Director</th>
                <th>Sipnosis</th>
                <th>Genero</th>
                <th>Puntuacion</th>
                <th>Imagen</th> 
            </tr>
        </thead>
        <tbody id="tbody">
       <?php
                    if(count($peliculas)>0):
                        foreach ($peliculas as $posicion => $pelicula):?>
                            <tr>
                                <td><?=$pelicula->getCodigo();?></td>
                                <td><?=$pelicula->getNombre();?></td>
                                <td><?=$pelicula->getDirector();?></td>
                                <td><?=$pelicula->getSipnosis();?></td>
                                <td><?=$pelicula->getGenero();?></td>
                                <td><?=$pelicula->getPuntuacion();?></td>
                                <td><img height="100px" src="<?php echo $pelicula->getImagen();?>"/></td>
                            </tr>
                <?php
                       endforeach;
                    endif;
                ?>
        </tbody>
    </table>
</section>
        </div>
         <div class="col-sm-6"> 
          <section>
          <br>
        <h1>Votar</h1> 
        <form method="post" action="../Controladores/PeliculaController.php" >		
            <label>Seleccione el codigo</label>
            <select name="codigo" required="">
                <?php
                 if(count($peliculas)>0):
                        foreach ($peliculas as $posicion => $pelicula):?>           
                <option value="<?=$pelicula->getCodigo();?>">
                   <?=$pelicula->getCodigo();?>               
                </option>         
                <?php
                    endforeach;
                        endif;
                ?>
            </select>
            <input type="number" value="0" name="puntuacion" required min="0" max="10" > 
            <input type="number" value="<?=$pelicula->getPuntuacion();?>" name="puntuacionactual" style="display: none"> 
            <input type="submit" name="accion" value="votar">
 
        </form>
    </section>
        </div>
        
    </div>

  
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $("#teclado").on("keyup", function() {
    var valor = $(this).val().toLowerCase();
    $("#tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
    });
  });
});


</script>


