<html>

<body>
  <?php
    
         include('conectarbd.php');
         $cod = $_REQUEST['cod'];
    
         $sql = "DELETE FROM producto WHERE cod_prod ='$cod'";
    
         $result=mysqli_query($con,$sql);
            ?>
  <?php
            include("mostrar_producto.php");
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