<html>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['contraseña'];

    // Validación básica
    $usuario = htmlspecialchars($usuario);

    if (!preg_match("/^[a-zA-Z0-9]*$/", $usuario)) {
        echo "Error: El nombre de usuario debe contener solo letras y números.";
        exit;
    }

    // Conectar a la base de datos
    include('conectarbd.php');

    if ($con->connect_error) {
        die("Error de conexión: " . $con->connect_error);
    }

    // Preparar y ejecutar la consulta para obtener el hash de la contraseña
    $stmt = $con->prepare("SELECT clave FROM usuario WHERE usuario = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $con->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hash_clave);
        $stmt->fetch();

        // Verificar la contraseña ingresada con el hash almacenado
        if (password_verify($clave, $hash_clave)) {
            include("index.php");
            exit;
        } 
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
}
    // Cerrar la consulta y la conexión
    $stmt->close();
    $con->close();
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </html>
