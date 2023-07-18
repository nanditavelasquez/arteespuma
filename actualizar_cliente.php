<html>

<body>
  <?php

    $id = $_REQUEST['id_cli'];
    $cod = $_REQUEST['cod'];
    $nombre = $_REQUEST['nom'];
    $apellido = $_REQUEST['ape'];
    $local = $_REQUEST['loca'];
    $direccion = $_REQUEST['dire'];

    $conexion = mysqli_connect("localhost","root","","cerveceria") or 
    die("problemas de conexion");
   
    mysqli_query($conexion,"UPDATE cliente SET cod_prod = '$cod', nom_cli ='$nombre', ape_cli = '$apellido', localidad = '$local', dire_cli = '$direccion' WHERE id_cli = '$id' ") 
    or die ("problemas en el select: " .mysqli_error($conexion));
    
           ?>
  <?php
         include('mostrar_cliente.php');
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