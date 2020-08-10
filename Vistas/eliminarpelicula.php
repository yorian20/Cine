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
        <section>
 
    <h1>Peliculas</h1>
  
  <br>
    <table border="1"> 
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Director</th>
                <th>Sipnosis</th>
                <th>Genero</th>
                <th>Puntuacion</th>
                <th>Imagen</th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
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
                                <td><a href="../Controladores/PeliculaController.php?accion=eliminar&codigo=<?=$pelicula->getCodigo();?>">Eliminar</a></td>
                            </tr>
                <?php
                       endforeach;
                    endif;
                ?>
        </tbody>
    </table>
</section>


  
</body>
</html>