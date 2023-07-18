<html>
     <body>
         <?php
   
          // Obtengo los datos cargados en el formulario de registro.
          $usuario = $_POST['usuario'];
          $pass = $_POST['contraseña'];

          // Guardo en la sesión el email del usuario.
          $_SESSION['usuario'] = $usuario;

          // Crear conexión con la base de datos.
          $conexion = mysqli_connect("localhost","root","","cerveceria");

          $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$pass' ";
          $resultado = mysqli_query($conexion,$consulta);

          $filas = mysqli_num_rows($resultado);

          // Validar la conexión de base de datos.
          if($filas)
          {
            header("location: index.php");
          }

          else
          {
            ?>
              <?php
                include("login.html");
            ?>
            <script>
                  Swal.fire({
                  title: 'Mensaje de alerta',
                  text: 'contraseña o usuario incorrecto',
                  icon: 'error',
                 });

                </script>
            <?php
                }

             mysqli_free_result($resultado);
             mysqli_close($conexion);
            ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>