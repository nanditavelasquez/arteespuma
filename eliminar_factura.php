<html>

<body>
    <?php
    
           include('conectarbd.php');
           $factu = $_REQUEST['fac'];
      
           $sql = "DELETE FROM factura WHERE n_factu ='$factu'";
      
           $result=mysqli_query($con, $sql);
              
              ?>
    <?php
              include("mostrar_factura.php");
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