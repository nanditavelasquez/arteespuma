<html>

<body>

  <?php

          $cod = $_REQUEST['cod'];
          $id = $_REQUEST['id'];
          $nom = $_REQUEST['nom'];
          $ape = $_REQUEST['ape'];
          $tel = $_REQUEST['tel'];
    
         include('conectarbd.php');
         
          mysqli_query($con,"UPDATE empleado SET id_cli = '$id', nom_emp ='$nom', ape_emp = '$ape', tel_emp = '$tel' WHERE cod_emp = '$cod' ") 
          or die ("problemas en el select: " .mysqli_error($con));

          ?>
  <?php
         include('mostrar_empleado.php');
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