<html>
    <head>
    <title>Alta Ofertas Laborales</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero capturo los datos del form
        $idOfertaIng = $_POST['idOfertaLaboral'];
        $descOfertaIng = $_POST['descOferta'];
        $modalidadOfertaIng = $_POST['modalidadOferta'];
        $horarioLabIng = $_POST['horarioLaboral'];
        $remuneracionIng = $_POST['remuneracion'];
        $carreraIng = $_POST['carrera'];
        $idLocIng = $_POST['idLocalidad']; 
       

       //Ahora tengo que armar la instruccion SQL para corroborar que ya no este ingresada 
       $consSQL = "SELECT Count(idOfertaLaboral) AS cantOfertas FROM ofertalaboral WHERE idOfertaLaboral='$idOfertaIng'";
       $resultadoCons = mysql_query($link,$consSQL) or die (mysqli_error($link));

       //Ahora corroboro si encontro algo
       $cantOfertEnc = mysqli_fetch_assoc($resultadoCons);
       if ($cantOfertEnc['cantOfertas'] != 0) {
           echo ("La oferta ya existe");
       } 
       else {
           $consSQL = "INSERT INTO ofertalaboral(descOferta, modalidadOferta, horarioLaboral, remuneracion, carrera, idLocalidad) 
           VALUES ('$descOfertaIng','$modalidadOfertaIng','$horarioLabIng','$remuneracionIng','$carreraIng','$idLocIng')";
           mysqli_query($link,$consSQL);
           echo("Oferta Registrada");
           //Ahora libero el conjunto de resultados
           mysqli_free_result($resultadoCons);
       }
       //Ahora cierro la conexion
       mysqli_close($link);
        ?>
    </body>
</html>