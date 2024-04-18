<html>

<body>

  <?php
       
          $cod = $_REQUEST['cod'];
          $marca = $_REQUEST['marca'];
          $webof = $_REQUEST['webof'];
          $pre = $_REQUEST['precio'];
          
          include('conectarbd.php');
          
          mysqli_query($con, "UPDATE producto SET marca = '$marca', web_oficial = '$webof', precio = '$pre' WHERE cod_prod = '$cod' ") or
          die ("problemas en el select: " .mysqli_error($con));

          ?>
  <?php
          include('mostrar_producto.php');
          ?>
  <?php
          echo "<div class='alert alert-success content' role='alert'>
            Actualizado correctamente
            </div>";
            ?>
  <?php
           mysqli_close($con);

        ?>
</body>

</html>