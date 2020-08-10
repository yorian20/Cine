<?php 
 
  require dirname(__DIR__).'/LogicaNegocio/GeneroServicios.php';

 
 $servicios = new GeneroServicios();    
 $generos = $servicios->obtenerGenero();
 
 
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
            </tr>
        </thead>
        <tbody>
       <?php
                    if(count($generos)>0):
                        foreach ($generos as $posicion => $genero):?>
                            <tr>
                                <td><?=$genero->getCodigo_genero();?></td>
                                <td><?=$genero->getNombre_genero()?></td>
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