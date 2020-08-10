<?php   require_once './include/header.php';



?>
<body>
    <section>
        <br>
        <h1>REGISTRAR GENERO</h1> 
        <form method="post" action="../Controladores/GeneroController.php" enctype="multipart/form-data">		
            <input type="text" placeholder="Nombre Genero" name="nombre" required>
            <input type="submit" name="accion" value="registrar">
        </form>
    </section>
    </body>
</html>
