<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	
	<link rel="stylesheet" type="text/css" href="estilo.css" title="estilo"/>
	<title></title>
</head>

<body>

<div id="container" >
	<div id="header">
		
<h3>Informacion para la factura</h3>



	</div>



	<div id="content">
		
	

			<?php

$host="localhost";

$usuario="elecgala_factura";

$pass= "acdc@1976#";


$codigoErr = "";

$codigo = $_GET['cod'];


//comprobacion en caso de que el codigo contenga caracteres
// no numericos
 if (!preg_match("/^[0-9]*$/", $codigo) || $codigo=='')
       {
       $codigoErr = "Error, el cliente no existe"; 
       echo $codigoErr;

 } 

else {

			
	$link = mysql_connect($host, $usuario, $pass)
    or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('elecgala_factura') or die('No se pudo seleccionar la base de datos');


	



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



while($row = mysql_fetch_array($result)){


echo 'Nombre: '.$row['per_nombre'];
echo '<br>';


echo 'Cedula/RUC: '.$row['per_cedula'];
echo '<br>';

echo 'Medidor: '.$row['med_numero'];
echo '<br>';


echo 'Direccion: '.$row['per_direccion'];
echo '<br>';
echo '</tr>';


echo 'Tarifa: ';
echo '<br>';

echo 'Grupo Emision: ';
echo '<br>';

echo 'Codigo: '.$row['med_codigo_cliente'];
echo '<br>';

echo 'Periodo/consumo: '.$row['med_mes_anio'];
echo '<br>';

echo 'Ruta: ';
echo '<br>';

echo 'Consumo kwh: '.$row['med_consumo'];
echo '<br>';

echo 'Valor a pagar: '.$row['fdet_total'];
echo '<br>';

}




// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);









		
}

	





?>
	




		
	

	</div>

	<div id="footer">
		
	</div>

	</div>
</body>
</html>