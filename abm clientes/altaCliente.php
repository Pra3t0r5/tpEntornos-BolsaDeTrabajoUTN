<html>
    <head>
    <title>Alta Clientes</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero capturo los datos del form
        $nombreIng = $_POST['nombreCliente'];
        $apeIng= $_POST['apellidoCliente'];
        $emailIng= $_POST['emailCliente'];
        $telIng= $_POST['telefonoCliente'];
        $nomusuIng= $_POST['usuCliente'];
        $contIng= $_POST['contCliente'];
        $dniIng= $_POST['dniCliente'];
        $domIng= $_POST['domicilioCliente'];
        $carreraIng= $_POST['carrera'];
       // $locIng= Este campo es el idLocalidad, habria que hacer una funcion de busqueda, que traiga el id
       // de la tabla Localidad

       //Ahora tengo que armar la instruccion SQL
       $consSQL = "SELECT Count(dniCliente) AS cantClientes FROM cliente WHERE dniCliente='$dniIng'";
       $resultadoCons = mysql_query($link,$consSQL) or die (mysqli_error($link));

       //Ahora corroboro si encontro algo
       $cantCliEnc = mysqli_fetch_assoc($resultadoCons);
       if ($cantCliEnc['cantClientes' != 0]) {
           echo ("El usuario ya existe");
       } 
       else {
           $consSQL = "INSERT INTO cliente(nombreCliente, apellidoCliente, emailCliente, telefonoCliente,usuCliente, contCliente, dniCliente. domicilioCliente, carrera) 
           values ('$nombreIng','$apeIng','$emailIng','$telIng','$nomUsuIng','$contIng','$dniIng','$domIng','$carreraIng')";
           mysqli_query($link,$consSQL);
           echo("Cliente Registrado");
           //Ahora libero el conjunto de resultados
           mysqli_free_result($resultadoCons);
       }
       //Ahora cierro la conexion
       mysqli_close($link);
        ?>
    </body>
</html>