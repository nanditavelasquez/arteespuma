<html>

<body>

    <?php

           $cod = $_REQUEST['cod'];
           $codpd = $_REQUEST['codpd'];
           $ema = $_REQUEST['ema'];
           $tel = $_REQUEST['tel'];
       
          $conexion = mysqli_connect("localhost", "root", "", "cerveceria") or
          die ("problemas de conexion");
          
          mysqli_query($conexion, "UPDATE proveedor SET cod_prod = '$codpd', email = '$ema', tel_prov = '$tel' 
          WHERE cod_prov = '$cod' ") 
          or die ("problemas en el select: " .mysqli_error($conexion));

          ?>
    <?php
          include('mostrar_proveedor.php');
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