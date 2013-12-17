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



	

	<div id="footer">
		
	</div>

	</div>
</body>
</html>