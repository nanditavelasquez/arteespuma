<html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];

    // Validación básica
    $usuario = htmlspecialchars($usuario);
    $clave = htmlspecialchars($clave);

    if (!preg_match("/^[a-zA-Z0-9]*$/", $usuario)) {
        echo "Error: El nombre de usuario debe contener solo letras y números.";
        exit;
    }

    // Generar hash seguro de la contraseña
    $clave_hash = password_hash($clave, PASSWORD_DEFAULT);

    // Conectar a la base de datos
    include('conectarbd.php');

    if ($con->connect_error) {
        die("Error de conexión: " . $con->connect_error);
    }

    // Preparar y ejecutar la consulta
    $stmt = $con->prepare("INSERT INTO usuario (usuario, clave) VALUES (?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $con->error);
    }

    $stmt->bind_param("ss", $usuario, $clave_hash);
    if ($stmt->execute()) {
        include("login.html");
        ?>
        <script>
            Swal.fire({
                title: 'Usuario creado',
                icon: 'success',
            });
        </script>
        <?php
    } else {
        include("registrarse.html");
        ?>
        <script>
            Swal.fire({
                title: 'Mensaje de alerta',
                text: 'ingrese todos los campos',
                icon: 'error',
            });
        </script>
        <?php
    } 
} 
    
        
    // Cerrar la consulta y la conexión
    $stmt->close();
    $con->close();
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>