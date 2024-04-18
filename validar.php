<html>
<?php
    
    // Obtengo los datos cargados en el formulario de registro.
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];
    
    // Crear conexión con la base de datos.
    include('conectarbd.php');
    
    $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = mysqli_query($con, $consulta);
    
    $filas = mysqli_num_rows($resultado);
    
    // Validar la conexión de base de datos.
    if ($filas) {
        include("index.php");
        exit;
    } else {
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
    mysqli_close($con);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </html>
    