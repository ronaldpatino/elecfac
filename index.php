<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row">
	    <div class="col-xs-12">
	    <img src="assets/img/consulta-tu-planilla.jpg">		
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-2">&nbsp;</div>
	    <div class="col-xs-8">
			<br/>
		    <form class="form-inline" role="form" method="post" action="consulta.php">
		        <label class="control-label" for="codigoruc">INGRESE SU CODIGO</label>
		        <div class="form-group">
		            <input type="text" class="form-control" id="codigoruc" name="codigo" value="">
		        </div>
		        <div class="form-group">
		        
		            <label>
		                &nbsp;&nbsp;<input type="radio" name="criterio" value="Cliente" checked> Cliente
		            </label>
		            
		            <label>
		                &nbsp;&nbsp;<input type="radio" name="criterio" value="RUC"> RUC
		            </label>
		        </div>
		
		        &nbsp;&nbsp;<button type="submit" class="btn btn-primary">Consultar</button>
		    </form>
		</div>    
	    <div class="col-xs-2">&nbsp;</div>    
		</div>	
	</div>    
</div>
</body>
</html>