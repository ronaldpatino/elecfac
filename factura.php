<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">

    <title></title>
</head>

<body>
    <div id="container">
    	<div class="row">
		    <div class="col-xs-12">
		    	<a href="http://www.elecgalapagos.com.ec/m" >
		    	<img src="assets/img/otra-consulta.jpg" border="0">
		    	</a>
		    </div>
		</div>
        <div class="row">
	    	<div class="col-xs-12" align="center">

<?php
      //Set the Content Type
      // Create Image From Existing File
      $jpg_image = imagecreatefromjpeg('assets/img/planilla.jpg');

      $txt_color = ImageColorAllocate ($jpg_image, 0, 0, 0);


	$host="localhost";	
	$usuario="elecgala_factura";	
	$pass= "acdc@1976#";		
	$codigoErr = "";	
	$codigo = $_GET['cod'];
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
	
	
 	  ImageString ($jpg_image, 4, 75, 150, $row['per_nombre'], $txt_color);
   	  ImageString ($jpg_image, 4, 75, 165, $row['per_cedula'], $txt_color);
   	  ImageString ($jpg_image, 4, 75, 180, $row['med_numero'], $txt_color);
      ImageString ($jpg_image, 4, 150, 195, $row['per_direccion'], $txt_color);
   	  ImageString ($jpg_image, 4, 65, 210, "Tarifa", $txt_color);
   	  ImageString ($jpg_image, 4, 115, 225, "Grupo Em", $txt_color);
   	  
  	  ImageString ($jpg_image, 4, 390, 150, $row['med_codigo_cliente'], $txt_color);
  	  ImageString ($jpg_image, 4, 460, 180, $row['med_mes_anio'], $txt_color);
   	  ImageString ($jpg_image, 4, 380, 210, "Ruta", $txt_color);
   	  
   	  
  	  ImageString ($jpg_image, 4, 145, 378, "Actual", $txt_color);
   	  ImageString ($jpg_image, 4, 265, 378, $row['med_consumo'] . ' kwh', $txt_color);
   	  
   	  
   	  ImageString ($jpg_image, 2, 530, 340, "VE", $txt_color);
  	  ImageString ($jpg_image, 2, 530, 350, "SUB", $txt_color);
   	  ImageString ($jpg_image, 2, 530, 360, "CC", $txt_color);
   	  ImageString ($jpg_image, 2, 530, 380, "TSE", $txt_color);   	  
   	  ImageString ($jpg_image, 2, 530, 410, "TSE", $txt_color);   	     	  
   	  ImageString ($jpg_image, 2, 530, 430, "CB", $txt_color);   	     	     	  
   	  ImageString ($jpg_image, 2, 530, 440, "RB", $txt_color);   	     	     	  
   	  ImageString ($jpg_image, 2, 530, 450, "AP", $txt_color);   	     	     	     	  
   	  
   	  
   	  ImageString ($jpg_image, 2, 530, 470, "TP", $txt_color);   	     	     	     	     	  
   	  ImageString ($jpg_image, 2, 530, 485, "VE", $txt_color);   	  
   	  ImageString ($jpg_image, 2, 530, 495, "TO", $txt_color);   	     	  
   	  ImageString ($jpg_image, 2, 530, 510, '$ '.$row['fdet_total'], $txt_color);   
	

	
	}

 }  	  
      // Send Image to Browser
      imagejpeg($jpg_image, 'fi/' . $codigo . '.jpg', 100);

      // Clear Memory
      imagedestroy($jpg_image);
    ?> 
    
	<img src="fi/<?php echo $codigo . '.jpg';?>" border="0"/>
	</div>
</body>    
</html>