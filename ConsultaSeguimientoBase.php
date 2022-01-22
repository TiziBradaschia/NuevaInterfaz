 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Consultas Seguimientos</title>
   <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
   <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>	<br><br><br>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
<body>  
  <section class="login"><center>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border 	border-secondary border-1 rounded-circle">Resultados de la b&uacutesqueda <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>
	
<?php
	if(!isset($_SESSION['Nombre'])){
		echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$Area=$_REQUEST['Area'];
	$Estado=$_REQUEST['Estado'];
	$Tipo=$_REQUEST['Tipo'];
	$Reclamo=$_REQUEST['Reclamo'];
	if($Reclamo==""){ 
	     if ($Area==""&& $Estado=="" && $Tipo==""){
				$SqlTotal=ConsultaVistaSeguimientoT();
			}elseif($Area!=""&& $Estado!="" && $Tipo!=""){
				 $SqlTotal=ConsultaVistaSeguimientoAET($Area,$Estado,$Tipo);
			}elseif($Area!=""&& $Estado=="" && $Tipo==""){
				$SqlTotal=ConsultaVistaSeguimiento($Area);			
			}elseif($Area!=""&& $Estado!="" && $Tipo==""){
				$SqlTotal=ConsultaVistaSeguimientoAE($Area,$Estado)	;	
			}elseif($Area!=""&& $Estado=="" && $Tipo!=""){
				$SqlTotal=ConsultaVistaSeguimientoAT($Area,$Tipo);				
			}elseif($Area==""&& $Estado=="" && $Tipo!=""){
				$SqlTotal=ConsultaVistaSeguimientoTi($Tipo);					
			}elseif($Area==""&& $Estado!="" && $Tipo!=""){	
				$SqlTotal=ConsultaVistaSeguimientoET($Estado,$Tipo);					
			}else{
				$SqlTotal=ConsultaVistaSeguimientoE($Estado);}
		}else{
			$SqlTotal=ConsultaVistaSeguimientoR($Reclamo);
			}
	if (mysqli_num_rows($SqlTotal)==0){
		echo "<h1>No existen coincidencias con la b&uacutesqueda</h1>";
		} 
		else{
?>  
                <div class="table-responsive-sm">
                <table class="table  table-striped table-hover">
				<thead>
				<tr >
				<th scope="col"><center><font color="white" >C&OacuteDIGO
				<th scope="col"><center><font color="white">&AacuteREA
				<th scope="col"><center><font color="white">TIPO
				<th scope="col"><center><font color="white">F.ALTA
				<th scope="col"><center><font color="white">ESTADO
				<th scope="col"><center><font color="white">F.CAMBIO
				<th scope="col"><center><font color="white">RECLAMO
				<th scope="col"><center><font color="white">DESCRIPCION
				</tr>
				</thead>
				<tbody> 
<?php 
				while($Fila=mysqli_fetch_array($SqlTotal))
		  			{
						$Segui=$Fila['Cod_Seguimiento'];
						$Area=$Fila['Nombre_Area'];
						$Tipo=$Fila['Nombre_Tipo'];
						$Alta=$Fila['Fecha_Alta'];	
						$Estado=$Fila['Nombre_Estado'];
						$Cambio=$Fila['Fecha_Cambio_Estado'];
						
						$Reclamo=$Fila['Reclamo'];
						$Descripcion=$Fila['Descripcion'];
						$Estado=$Fila['Estado'];
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$Segui;
						echo"<td class='table-danger' align='center'>".$Area;
						echo"<td class='table-danger' align='center'>".$Tipo;
						echo"<td class='table-danger' align='center'>".$Alta;
						echo"<td class='table-danger' align='center'>".$Estado;
						echo"<td class='table-danger' align='center'>".$Cambio;
						echo"<td class='table-danger' align='center'>".$Reclamo;
                        echo"<td class='table-danger' align='center'>".$Descripcion;
					}		
						echo"</tr></tbody></div>";		
			}
mysqli_close(conectar());
?>
<table>
	<tr><td><form name="submit" method="post" action="ConsultaSeguimiento.php">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search" size="lg" color="#FAE5D3" animation="tada"></box-icon>Otra b&uacutesqueda </button></form></td>
	  <td><Form Action="ConsultasGenerales.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar al men&uacute </button></form></td>
		 
	   <td><button type="submit" class="botoncito1" onClick="window.print()"> <box-icon class=" border border-secondary border-3 rounded-circle" name="printer" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Imprimir </button>
	</tr>
</table>
</section></body></main></html>