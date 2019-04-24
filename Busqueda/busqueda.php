<!DOCTYPE html>
<html> 
<body> 
  
<?php

//cadena de conexion
include 'conexion.php';
$con = OpenCon();
$busqueda='sistemas';
//DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
   //CUENTA EL NUMERO DE PALABRAS
   $trozos=explode(" ",$busqueda);
   $numero=count($trozos);
  if ($numero==1) {
   //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
   $cadbusca=("SELECT descOferta, modalidadOferta, horarioLaboral, remuneracion, descLocalidad, descProvincia 
   FROM OfertaLaboral of INNER JOIN Localidad l ON of.id_localidad=l.idLocalidad INNER JOIN Provincia p
   ON l.idProv=p.idProvincia WHERE VISIBLE =1 AND carrera LIKE '%$busqueda%' LIMIT 50", );
  } elseif ($numero>1) {
  //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
  //busqueda de frases con mas de una palabra y un algoritmo especializado
  $cadbusca="SELECT descOferta, modalidadOferta, horarioLaboral, remuneracion, descLocalidad, descProvincia, MATCH (carrera) AGAINST ( '$busqueda' ) AS Score 
  FROM OfertaLaboral of INNER JOIN Localidad l ON of.id_localidad=l.idLocalidad INNER JOIN Provincia p
   ON l.idProv=p.idProvincia WHERE MATCH (carrera) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50";
}
$result=mysql("bolsadetrabajoutn", $cadbusca);
if ($row = mysql_fetch_array($result)){ 
    echo "<table border = '1'> \n"; 
While($row=mysql_fetch_object($result))
{
    echo "<td>$field->name</td> \n"; }
    echo "</tr> \n"; 
do {
   //Mostramos los titulos de los articulos o lo que deseemos...
   echo "<tr> \n"; 
   echo "<td>".$row["descOferta"]."</td> \n"; 
   echo "<td>".$row["modalidadOferta"]."</td> \n"; 
   echo "<td>".$row["horarioLaboral"]."</td> \n"; 
   echo "<td>".$row["remuneracion"]."</td> \n"; 
   echo "<td>".$row["descLocalidad"]."</td> \n";
   echo "<td>".$row["descProvincia"]."</td> \n";  
   echo "</tr> \n"; 
} while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
    }
} else { 
    echo "¡ No se ha encontrado ningún registro !"; 
    } 
CloseCon($con);
?> 
  
</body> 
</html> 