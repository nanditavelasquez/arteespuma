<html>

<body>
   <?php
       
       include('conectarbd.php');
       $cod = $_REQUEST['cod'];
       
       $sql = "DELETE FROM empleado WHERE cod_emp ='$cod'";
       
       $result = mysqli_query($con, $sql);
          ?>
   <?php
         include("mostrar_empleado.php");
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