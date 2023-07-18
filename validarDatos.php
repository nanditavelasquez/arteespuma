<?php
   
   // Obtengo los datos cargados en el formulario de registro.
   $usuario = $_POST['usuario'];
   $pass = $_POST['contraseña'];

   // Guardo en la sesión el email del usuario.
   $_SESSION['usuario'] = $usuario;

   // Crear conexión con la base de datos.
   $conexion = mysqli_connect("localhost","root","","cerveceria") or 
    die("problemas de conexion");
         
   $consulta = "INSERT INTO usuario (usuario,clave) VALUES ('$usuario','$pass') ";
   $resultado = mysqli_query($conexion,$consulta);
       
     ?>
     <?php
     header("location: registrarse.html");
     ?>
     <?php

 mysqli_close($conexion);
 

