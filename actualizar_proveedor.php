<html>

<body>

    <?php

           $cod = $_REQUEST['cod'];
           $codpd = $_REQUEST['codpd'];
           $ema = $_REQUEST['ema'];
           $tel = $_REQUEST['tel'];
       
          include('conectarbd.php');
          
          mysqli_query($con, "UPDATE proveedor SET cod_prod = '$codpd', email = '$ema', tel_prov = '$tel' 
          WHERE cod_prov = '$cod' ") 
          or die ("problemas en el select: " .mysqli_error($con));

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

           mysqli_close($con);

        ?>

</body>

</html>