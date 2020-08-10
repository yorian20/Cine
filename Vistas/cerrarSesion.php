<?php
   session_start();
   if(isset($_SESSION['usuarioLogueado'])){
       session_destroy();
   }
   header('location:login.php');
?>
