
<html lang="es" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<title>MEDICI&OacuteN DE PROBLEMAS</title>
		<link href="css/estilo.css" rel="stylesheet"  type="text/css"  />	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
		<link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
		<link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">
	    <script src="includes/jquery-3.3.1.min.js"></script>
	    <script src="includes/plotly-latest.min.js"></script>
    </head>	
<body>
     <div class="container" >
	 <br><br>
   	<div class="row">
	
		  <div class="col-sm-12">
			<div class="panel panel-info">
			 <div class="panel panel-heading">
			 <h2 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="10%" height="10%"align="center"class="border border-secondary border-3 rounded-circle	img-fluid"></img>  REPORTE DE PROBLEMAS
		     <img src="imagenes/L D Q.png" width="10%" height="10%"align="center"class="border border-secondary border-3 rounded-circle	img-fluid"></img></h2><hr><br>
			    <div class="panel panel-body">
				  <div class="row">
					 <div class="col-sm-6">
					   <div id="cargaLineal"></div></div>
					 <div class="col-sm-6">
					    <div id="cargaTorta"></div></div>
					</div>		
				</div>		
			</div></div></div>
			<div class="col-sm-12"><center>
			<div class="col-sm-6"><Form Action="ConsultasGenerales.php" Method="Post"><button type="submit" class="boton"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Retornar </button></form></div>
			
			 <div class="col-sm-6"><Form>
					<button type="submit" class="boton" onClick="window.print()"><box-icon class="border border-secondary border-2 rounded-circle" name="printer" type="solid" size="30px" color="#FAE5D3" animation="tada-hover"></box-icon>   Imprimir  </button></form></div>
		     
			</div>	
	</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('graficoporarea.php');
		$('#cargaTorta').load('graficotortaReclamosTotales.php');
	});
</script>
</body>

</html>