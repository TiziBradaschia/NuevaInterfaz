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
		<title>Mis Reclamos</title>
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
	$EstadoActual=$_REQUEST['EstadoReclamo'];
	$ObservacionActual=$_REQUEST['Observaciones'];
	$CR=$_REQUEST['Cx'];
	$registro=ConsultaVistaReclamosC($CR);
	if($Fila=mysqli_fetch_array($registro)){
			$Codigo=$Fila['Codigo'];
			$Area=$Fila['Area'];
			$Fecha=$Fila['Fecha_Alta'];	
			$Observaciones=$Fila['Observaciones'];
			$Problema=$Fila['Problema'];
			$Seguimiento=$Fila['Seguimiento'];
			$CodigoDetalle=$Fila['Detalle'];
			}
	$b='0';
?>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> 
	Actualizar Reclamo<img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
<?php
		if ($EstadoActual=='C')
		  {
			updateSeguimiento($Seguimiento);
			updateDetalle($ObservacionActual,$CodigoDetalle,$EstadoActual);
			updateReclamo($CodigoDetalle);
			$b='1';
			}
		if($ObservacionActual!=$Observaciones){ 
		     updateDetalle($ObservacionActual,$CodigoDetalle,$EstadoActual);
		     $b='1';
					 
			}
		if ($b=='1')
	       {
			echo"<h1>El reclamo se actualiz&oacute";
		    }
		    else
			{
				echo"<h1>Ninguna modificaci&oacuten se ha producido";			
			}  
			mysqli_close($idCone);
?>
		<br><table><tr>
	<td>
	 <form name="contact" method="post" action="MisReclamos.php">
	  <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Otra consulta</button>
	   </form></td>
	<td>
	  <Form Action="SoyUsuario.php" Method="Post">
	   <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Volver al men&uacute </button>
	   </form></td>
	</tr></table>
</body></section></html></main>