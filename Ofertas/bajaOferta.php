<html>
    <head>
        <title>Baja Oferta Laboral</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero traigo los datos del form
        $idOfertaIng = $_POST['idOfertaLaboral'];
        //Ahora armo la consulta
        $consSQL = "SELECT * FROM ofertalaboral WHERE idOfertaLaboral=$idOfertaIng";
        $resultadoCons = mysqli_query($link,$consSQL) or die (mysqli_error($link));

        //Corroboro si encontro algo
        if (mysqli_num_rows($resultadoCons) == 0) {
            echo("Oferta Inexistente");
        }
        else {
            $consSQL = "DELETE FROM ofertalaboral WHERE idOfertaLaboral='$idOfertaIng'";
            mysqli_query($link,$consSQL);
            echo("Oferta Eliminada");
        }

        //Ahora libero el conjunto de resultados
        mysqli_free_result($resultadoCons);

        //Ahora cierro la conexion
        mysqli_close($link);
        ?>
    </body>
   
</html>
