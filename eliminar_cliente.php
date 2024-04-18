<html>

<body>

   <?php

         include('conectarbd.php');
         $id = $_REQUEST['id'];

         $sql = "DELETE FROM cliente WHERE id_cli ='$id'";

         $result = mysqli_query($con, $sql);

         ?>
   <?php
         include("mostrar_cliente.php");
         ?>
   <?php
         echo "<div class='alert alert-success content' role='alert'>
            Eliminado exitosamente
            </div>";
            ?>
   <?php
    mysqli_close($con);
        ?>
</body>

</html>