<html>

<body>

   <?php
      
      $fac = $_REQUEST['n_factu'];
      $cod = $_REQUEST['cod'];
      $marca = $_REQUEST['marca'];
      $fecha = $_REQUEST['fecha'];
      $id = $_REQUEST['id'];
      $canti = $_REQUEST['can'];
      $pre = $_REQUEST['precio'];
      $iva = $_REQUEST['iva'];
      $total = $_REQUEST['total'];
      

      $conexion = mysqli_connect("localhost","root","","cerveceria") or 
         die("problemas de conexion");
   
      mysqli_query($conexion, "UPDATE factura set cod_prov = '$cod', marca = '$marca', fecha_factu = '$fecha', id_cli='$id', cantidad = '$canti', precio = '$pre', iva = '$iva', total = '$total' WHERE n_factu = '$fac' ") or
      die ("problemas en el select: " .mysqli_error($conexion));
          
      ?>
   <?php
      include('mostrar_factura.php');
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