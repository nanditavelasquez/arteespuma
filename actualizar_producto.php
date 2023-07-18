<html>

<body>

  <?php
       
          $cod = $_REQUEST['cod'];
          $marca = $_REQUEST['marca'];
          $webof = $_REQUEST['webof'];
          $pre = $_REQUEST['precio'];
          
          $conexion = mysqli_connect("localhost","root","","cerveceria") or 
          die("problemas de conexion");

          mysqli_query($conexion, "UPDATE producto SET marca = '$marca', web_oficial = '$webof', precio = '$pre' WHERE cod_prod = '$cod' ") or
          die ("problemas en el select: " .mysqli_error($conexion));

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
           mysqli_close($conexion);

        ?>
</body>

</html>