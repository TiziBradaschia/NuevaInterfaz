<?php
session_start();
?>
<html lang="es">
 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<link href="css/EstiloIndex.css" rel="stylesheet"  type="text/css"  />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
		<title>Mis Seguimientos</title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
		
 </head><br>
  <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>   
  <section class="inicio"><center>
<?php 
	if(!isset($_SESSION['Nombre']))
		{
		 echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		 die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexclUsted debe logearse para entrar al sitio !");
	    }
	require("includes/ConexionLDQ.php");
    require("includes/baseDeDatos.php");
	$idCone=conectar();
	$Codigo=$_REQUEST['Cx'];
	
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> Actualizar Seguimiento N&deg <?php echo "$Codigo ";?><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
<?php
			$registro=ConsultaVistaSeguimientoC($Codigo);
		    $Fila=mysqli_fetch_array($registro);
		    
			$EstadoAnterior=$Fila['Nombre_Estado'];
			
			$Reclamo=$Fila['Reclamo'];
			$registro1=ConsultaVistaReclamosC($Reclamo);
			$Fila1=mysqli_fetch_array($registro1);
			$DetalleRe=$Fila1['Detalle'];
			$AreaAnterior=$Fila['Nombre_Area'];	
			$Area=$_REQUEST['Area'];
			$CAreaAnt=consultaCodArea($AreaAnterior);
			$EstadoAnterior=$Fila['Nombre_Estado'];
			$CEstadoAnt=consultaCodigoEstadoSeguimiento($EstadoAnterior);
			$Estado=$_REQUEST['Estado'];
		    $TipoAnterior=$Fila['Nombre_Tipo'];
			$CTipoAnt=consultaCodigoTipoSeguimiento($TipoAnterior);
			$Tipo=$_REQUEST['Tipo'];
			$DescripcionAnt=$Fila['Descripcion'];
			$Descripcion=$_REQUEST['Descripcion'];
			if($Estado=='F'||$Estado=='S'||$Estado=='C'){
			$ES='1';
			}		 
			else{
				 $ES='0';
				}	
		if ($Area!=$CAreaAnt||$Estado!=$CEstadoAnt||$Tipo!=$CTipoAnt)
		   {
			InsertSeguimientoNuevo($Area,$Estado,$Tipo,$Reclamo,$Descripcion,$Codigo,$ES);
			
			updateSeguimiento($Codigo);
				$Segui=ConsultaMaxSeguimiento();
		    
		     if ($row = mysqli_fetch_row($Segui)) {
					$Segui = trim($row[0]);
				}	
			updateReclamoSegui($Segui,$ES,$Area,$Reclamo);
			updateDetalleReclamo($ES,$Estado,$DetalleRe);
			echo"<h1>Se modific&oacute exitosamente</h1>";
			}
			else{
		        if($Descripcion!=$DescripcionAnt)
					{ 
				     updateSeguimientoDescripcion($Descripcion,$Codigo);
				    }
				  else
					  echo"<h1>Ninguna modificaci&oacuten se ha producido</h1>";
				}
		if($ES='1'){
			 header("Location:RegistrarCierreReclamo.php?Cx=$Reclamo&Cm=$Segui");
			 exit();
			}			
			mysqli_close(conectar());
?>
<table><center>
<tr>
   <td><Form Action="SeguimientosPorArea.php" Method="Post">
	   <button type="submit" class="botoncito1"> <box-icon class=" border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon>Retornar </button>
	   </form></td>
	<td><Form Action="SoyUsuario.php" Method="Post">
	 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Menu Principal</button>
	 </form></td>
</tr></table>
</body></section></main></html>