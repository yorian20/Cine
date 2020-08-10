<?php 
   session_start(); 
   if(!isset($_SESSION['usuarioLogueado'])){
       header("Location: Vistas/login.php");
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tico Cines</title>
        <link rel="stylesheet" type="text/css" href="./CSS/estilos1.css">
    </head>