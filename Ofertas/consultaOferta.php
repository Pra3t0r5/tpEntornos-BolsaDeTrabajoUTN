<html>
    <head>
        <title>Consulta Ofertas Laborales</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero armo la consulta
        $consSQL = "SELECT * FROM ofertalaboral";
        $resultadoCons = mysqli_query($link,$consSQL);
        //Luego me fijo cuantos registros encontre
        $registrosEnc = mysqli_num_rows($resultadoCons);
        //Ahora armo una tabla para mostrar los registros
        
        $tabla = "<table border='2px'>";
            
                $tabla .= "<td>ID</td>";
                $tabla .= "<td>DESCRIPCION</td>";
                $tabla .= "<td>MODALIDAD</td>";
                $tabla .= "<td>HORARIO LABORAL</td>";
                $tabla .= "<td>REMUNERACION</td>";
                $tabla .= "<td>ID LOCALIDAD</td>";
                $tabla .= "<td>CARRERA</td>";
            
        $tabla .= "</table>";

        while ($fila = mysqli_fetch_array($resultadoCons)) {
            
             
            $tabla .= "<td>".$fila['idOfertaLaboral']."</td>";
            $tabla .= "<td>".$fila['descOferta']."</td>";
            $tabla .= "<td>".$fila['modalidadOferta']."</td>";
            $tabla .= "<td>".$fila['horarioLaboral']."</td>";
            $tabla .= "<td>".$fila['remuneracion']."</td>";
            $tabla .= "<td>".$fila['idLocalidad']."</td>";
            $tabla .= "<td>".$fila['carrera']."</td>";
   
        }
        echo ($tabla);
        //Ahora libero el conjunto de resultados
        mysqli_free_result($resultadoCons);
        //Ahorra cierro la conexion
        mysqli_close($link);
        ?>
        
    </body>
</html>