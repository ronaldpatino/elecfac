<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	
	<link rel="stylesheet" type="text/css" href="estilo.css" title="estilo"/>
	<title></title>
</head>

<body>

<div id="container" >
	<div id="header">
		
<h3>Consulta</h3>

<form method="post" action="consulta.php"> 
   Ingrese su codigo: <input type="text" name="codigo" size="20" value="">
 
  <input type="radio" name="criterio" value="Cliente">Cliente
  
 <input type="radio" name="criterio" value="RUC">RUC
   <input type="submit" name="submit" value="Consultar"> 

</form>

	</div>



	<div id="content">
		<h2>Factura</h2>

	
	

			<?php
$host="localhost";

$usuario="root";

$pass= "acdc1976";

$codigoErr = "";

if(isset($_POST['codigo'])){
$codigo = $_POST['codigo'];
}else {
$codigo=1;
}



//comprobacion en caso de que el codigo contenga caracteres
// no numericos
 if (!preg_match("/^[0-9]*$/", $codigo) || $codigo=='')
       {
       $codigoErr = "Por favor ingrese correctamente su codigo o RUC"; 
       echo $codigoErr;

 } 

else {

	if(isset($_POST['criterio'])){
		
		$criterio= $_POST['criterio'];

		$link = mysql_connect($host, $usuario, $pass)
    or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('elecgala_factura') or die('No se pudo seleccionar la base de datos');


		if($criterio=='Cliente'){


// Realizar una consulta MySQL
$query = 'Select *
from medidor m,
persona p, 
factura_cabecera fc,
factura_detalle fd
where m.med_codigo_cliente = '.$codigo.' and
m.med_per_id= p.per_id and
m.med_per_id= fc.fcab_per_id and
fd.fdet_fcab_id = fc.fcab_id';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

 
// Imprimir los resultados en HTML

$row = mysql_fetch_array($result);
  
  echo 'RUC:'. $row['per_cedula'];



  echo "</br> </br>";
 
echo '<h2>Detalle</h2>';

echo '<table>';
	echo '<tr> <td>Codigo     </td> <td>Nombre</td> <td>Fecha emision</td>  <td> Tipo Factura</td> <td> Num Factura</td> <td> Total facturado</td> <td>Deuda Pendiente</td> <td>Factura</td>    ';
echo '<tr><td>'.$row['med_codigo_cliente'].'</td>';
echo '<td>'.$row['per_nombre'].'</td>';
echo '<td>'.$row['fdet_emision'].'</td>';
echo '<td>'.$row['fdet_tipo_factura'].'</td>';
echo '<td>'.$row['fdet_num_documento'].'</td>';
echo '<td>'.$row['fdet_total'].'</td>';
echo '<td>'.$row['fedt_deuda'].'</td>';
echo '<td><a href="./factura.php?cod='.$row['med_codigo_cliente'].'">Factura</a></td>';

echo '</tr>';

while($row = mysql_fetch_array($result)){

echo '<tr><td>'.$row['med_codigo_cliente'].'</td>';
echo '<td>'.$row['per_nombre'].'</td>';
echo '<td>'.$row['fdet_emision'].'</td>';
echo '<td>'.$row['fdet_tipo_factura'].'</td>';
echo '<td>'.$row['fdet_num_documento'].'</td>';
echo '<td>'.$row['fdet_total'].'</td>';
echo '<td>'.$row['fedt_deuda'].'</td>';
echo '<td><a href="./factura.php?cod='.$row['med_codigo_cliente'].'">Factura</a></td>';
echo '</tr>';


}


echo '</table>';


// Liberar resultados
mysql_free_result($result);

// Cerrar la conexi�n
mysql_close($link);





		


		}

if($criterio=='RUC'){

////////////////////////////////////////////////////

// Realizar una consulta MySQL
$query = 'SELECT * FROM persona p,  medidor m, factura_cabecera fc, factura_detalle fd
where per_cedula= '.$codigo.'
and m.med_per_id= p.per_id
and fc.fcab_per_id= p.per_id
and fd.fdet_fcab_id= fc.fcab_id';


$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$row = mysql_fetch_array($result);
  
  echo 'RUC:'. $row['per_cedula'];



  echo "</br> </br>";
 
echo '<h2>Detalle</h2>';

echo '<table>';
	echo '<tr> <td>Codigo     </td> <td>Nombre</td> <td>Fecha emision</td>  <td> Tipo Factura</td> <td> Num Factura</td> <td> Total facturado</td> <td>Deuda Pendiente</td> <td>Factura</td>    ';
$cod=$row['med_codigo_cliente'];
echo '<tr><td>'.$cod.'</td>';
echo '<td>'.$row['per_nombre'].'</td>';
echo '<td>'.$row['fdet_emision'].'</td>';
echo '<td>'.$row['fdet_tipo_factura'].'</td>';
echo '<td>'.$row['fdet_num_documento'].'</td>';
echo '<td>'.$row['fdet_total'].'</td>';
echo '<td>'.$row['fedt_deuda'].'</td>';
echo '<td><a href="./factura.php?cod='.$row['med_codigo_cliente'].'">Factura</a></td>';


echo '</tr>';

while($row = mysql_fetch_array($result)){

echo '<tr><td>'.$row['med_codigo_cliente'].'</td>';
echo '<td>'.$row['per_nombre'].'</td>';
echo '<td>'.$row['fdet_emision'].'</td>';
echo '<td>'.$row['fdet_tipo_factura'].'</td>';
echo '<td>'.$row['fdet_num_documento'].'</td>';
echo '<td>'.$row['fdet_total'].'</td>';
echo '<td>'.$row['fedt_deuda'].'</td>';
echo '<td><a href="./factura.php?cod='.$row['med_codigo_cliente'].'">Factura</a></td>';
echo '</tr>';


}


echo '</table>';

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexi�n
mysql_close($link);







		}

			
		
	}else{
		echo 'Por favor seleccione un criterio de busqueda.';
	}

}

?>
	




		
	

	</div>

	<div id="footer">
		
	</div>

	</div>
</body>
</html>