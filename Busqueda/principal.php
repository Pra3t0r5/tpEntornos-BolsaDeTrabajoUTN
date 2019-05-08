<?php
    include 'conexion.php';
    $con = OpenCon();
    echo "Connected Successfully";
    CloseCon($con);
    ?>