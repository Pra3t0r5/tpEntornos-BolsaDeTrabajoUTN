<?php 

function OpenCon(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="bolsadetrabajoutn";
    $con=new mysqli($server, $user, $pass, $db) or die("Error al conectar a la base de datos".$con->error);
    return $con;
}

function CloseCon($con)
 {
 $con -> close();
 }
?>