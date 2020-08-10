<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio Sección</title>
        <link rel="stylesheet" type="text/css" href="../CSS/estilos1.css">
    </head>
    <body>
       <nav>
            <ul>
                <li><a href="verpeliculas.php">Lista Peliculas</a></li>
            </ul>
        </nav> 
        <section>
            <br>
            <h1>INGRESAR</h1>
            <form method="post" action="../Controladores/UsuarioController.php">		
                <input type="text" placeholder="Correo" name="correo" required>
                    <input  type="password" placeholder="Password" name="clave" required>
                    <input  type="submit" name="accion" value="Ingresar">
            </form>
        </section>  
 
    </body>
</html>