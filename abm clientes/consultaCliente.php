<html>
    <head>
        <title>Consulta Cliente</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        //Primero armo la consulta
        $consSQL = "SELECT * FROM cliente";
        $resultadoCons = mysqli_query($link,$consSQL);
        //Luego me fijo cuantos registros encontre
        $registrosEnc = mysqli_num_rows($resultadoCons);
        //Ahora armo una tabla para mostrar los registros
        
        $tabla = "<table border='2px'>";
            
                $tabla .= "<td>ID</td>";
                $tabla .= "<td>NOMBRE</td>";
                $tabla .= "<td>APELLIDO</td>";
                $tabla .= "<td>EMAIL</td>";
                $tabla .= "<td>TELEFONO</td>";
                $tabla .= "<td>USUARIO</td>";
                $tabla .= "<td>DNI</td>";
                $tabla .= "<td>DOMICILIO</td>";
                $tabla .= "<td>CARRERA</td>";
                $tabla .= "<td>LOCALIDAD</td>";
            
        $tabla .= "</table>";

        while ($fila = mysqli_fetch_array($resultadoCons)) {
            
             
            $tabla .= "<td>".$fila['idCliente']."</td>";
            $tabla .= "<td>".$fila['nombreCliente']."</td>";
            $tabla .= "<td>".$fila['apellidoCliente']."</td>";
            $tabla .= "<td>".$fila['emailCliente']."</td>";
            $tabla .= "<td>".$fila['telefonoCliente']."</td>";
            $tabla .= "<td>".$fila['usuCliente']."</td>";
            $tabla .= "<td>".$fila['dniCliente']."</td>";
            $tabla .= "<td>".$fila['domicilioCliente']."</td>";
            $tabla .= "<td>".$fila['carreraCliente']."</td>";
            $tabla .= "<td>".$fila['idLocalidad']."</td>";   
        }
        echo ($tabla);
        //Ahora libero el conjunto de resultados
        mysqli_free_result($resultadoCons);
        //Ahorra cierro la conexion
        mysqli_close($link);
        ?>
        
    </body>
</html>