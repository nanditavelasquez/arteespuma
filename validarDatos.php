<?php
   
   // Obtengo los datos cargados en el formulario de registro.
       $usuario = $_POST['usuario'];
       $clave = $_POST['contraseña'];

   // Crear conexión con la base de datos.
    include('conectarbd.php');

    $sql="INSERT INTO  usuario(usuario,clave) VALUES ('$usuario','$clave')";
        
    $resultado = mysqli_query($con, $sql);
     ?>
     <?php
     include("registrarse.html");
     ?>
     <?php

 mysqli_close($con);