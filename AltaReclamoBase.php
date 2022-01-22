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
		<title>Nuevo Reclamo</title>
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
    $Dni=$_SESSION['Dni'];
    $Area=$_REQUEST['Area'];
	$Servicio=$_REQUEST['Servicio'];
	$Problema=$_REQUEST['Problema'];
	$Descripcion=$_REQUEST['Descripcion'];
		 /*$Foto=$_FILES['Archivo']['name'];
		 copy($_FILES['Foto']['tmp_name'],$Foto);*/
	$Hoy=getdate();
	$Fecha=$Hoy['year']."/".$Hoy['mon']."/".$Hoy['mday'];
	InsertDetalleReclamo($Descripcion,$Problema,$Fecha);
    $Det=ConsultaMaxDetalle();
		if ($row = mysqli_fetch_row($Det)) 
			 {
					$Detalle = trim($row[0]);
			 }	
	InsertSeguimientoReclamo($Area,$Fecha); 
	$Segui=ConsultaMaxSeguimiento();
        if ($row = mysqli_fetch_row($Segui)) 
			 {
					$Seguimiento = trim($row[0]);
			 }	
	InsertReclamo($Dni,$Area,$Fecha,$Detalle,$Seguimiento); 
	$Re=ConsultaMaxReclamo();
		 if ($row = mysqli_fetch_row($Re)) 
			 {
					$Recla = trim($row[0]);
			 }
	updateSeguimientoReclamo($Seguimiento,$Recla);
		$registros=ConsultaVistaReclamosC($Recla);
	
?>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> Nuevo reclamo <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
	<div class="table-responsive-sm">
      <table class="table  table-striped table-hover">
		<thead><tr >
			<th scope="col"><center><font color="white">RECLAMO
			<th scope="col"><center><font color="white">&AacuteREA
			<th scope="col"><center><font color="white">FECHA
			<th scope="col"><center><font color="white">OBSERVACIONES
			<th scope="col"><center><font color="white">ESTADO
			<th scope="col"><center><font color="white">PROBLEMA
			<th ><center><font color="white">SEGUIMIENTO
			<th scope="col"><center><font color="white">DETALLE
			</tr></thead>
		<tbody>
<?php 
			while($Fila=mysqli_fetch_array($registros))
					{
						$C=$Fila['Codigo'];
						$A=$Fila['Area'];
						$F=$Fila['Fecha_Alta'];	
						$D=$Fila['Observaciones'];
						$E=$Fila['Estado'];
						$DP=$Fila['Problema'];
						$Se=$Fila['Seguimiento'];
						$Detalle=$Fila['Detalle'];
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$C;
						echo"<td class='table-danger' align='center'>".$A;
						echo"<td class='table-danger' align='center'>".$F;
						echo"<td class='table-danger' align='center'>".$D;
						echo"<td class='table-danger' align='center'>".$E."*";
						echo"<td class='table-danger' align='center'>".$DP;
						echo"<td class='table-danger' align='center'>".$Se;
                       	echo"<td class='table-danger' align='center'>".$Detalle;
						echo"</tbody>";	
					}
			mysqli_close(conectar());
?>
</tr></table></div>
<br><br><center>
  <table><tr>
	<td><form name="contact" method="post" action="AltaReclamo.php">
	  <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="duplicate" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Cargar Otro</button>
	   </form></td>
	<td><Form Action="SoyUsuario.php" Method="Post">
	   <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Volver al men&uacute </button></form></td>
  </tr></table>
  <p small><font color="white">* A (Activo) --  S (Solucionado) --  C (Cancelado)</p>
</body></section></html></main>