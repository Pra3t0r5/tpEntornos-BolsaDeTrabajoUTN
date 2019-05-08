<html>
    <head>
        <title>Modifica Oferta Laboral</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero capturo los datos desde el form
        $idOfertaLaboralIng = $_POST['idOfertaLaboral'];
        $descOfertaIng = $_POST['descOferta'];
        $modalidadOfertaIng = $_POST['modalidadOferta'];
        $horarioLaboralIng = $_POST['horarioLaboral'];
        $remuneracionIng = $_POST['remuneracion'];
        $idLocalidadIng = $_POST['idLocalidad'];
        $carreraIng = $_POST['carrera'];
        
        //Ahora armo la instruccion SQL y la ejecuto
        $consSQL = "UPDATE ofertalaboral SET descOferta='$descOfertaIng', modalidadOferta='$modalidadOfertaIng', horarioLaboral='$horarioLaboralIng', remuneracion='$remuneracionIng', idLocalidad='$idLocalidadIng', carrera='$carreraIng'
        WHERE idOfertaLaboral='$idOfertaLaboralIng'";
        mysqli_query($link,$consSQL);
        
        //Ahora cierro la conexion
        mysqli_close($link);
        ?>
    </body>
</html>