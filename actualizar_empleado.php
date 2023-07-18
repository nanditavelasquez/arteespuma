<html>

<body>

  <?php

          $cod = $_REQUEST['cod'];
          $id = $_REQUEST['id'];
          $nom = $_REQUEST['nom'];
          $ape = $_REQUEST['ape'];
          $tel = $_REQUEST['tel'];
    
          $conexion = mysqli_connect("localhost","root","","cerveceria") or 
          die("problemas de conexion");
         
          mysqli_query($conexion,"UPDATE empleado SET id_cli = '$id', nom_emp ='$nom', ape_emp = '$ape', tel_emp = '$tel' WHERE cod_emp = '$cod' ") 
          or die ("problemas en el select: " .mysqli_error($conexion));

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
           mysqli_close($conexion);

          ?>
</body>

</html>