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
		<title>Registro de Cierre</title>
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
	$CodSeguimiento=$_REQUEST['Cm'];
	 $CodReclamo=$_REQUEST['Cx'];
	  $Dni_Personal=$_SESSION['Dni'];
	  $Nombre_Personal=$_SESSION['Nombre'];
	  
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Cierre Reclamo N&deg <?php echo"$CodReclamo"?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>
	
	<Form Action="RespuestaCliente.php?CR=<?php echo"$CodReclamo"?>" Method="Post">
	
<?php

		 $registrosCierre=ConsultaVistaReclamoConCliente($CodReclamo);
		// $SqlCierre = "SELECT clienteexterno.Nombre_Cliente, clienteexterno.Tel_Cliente, clienteexterno.Mail_Cliente,detallereclamo.Descripcion_Reclamo,seguimiento.DescripcionFROM reclamo
		 //INNER JOIN clienteexterno ON reclamo.Cliente=clienteexterno.Dni_Cliente
		 //INNER JOIN detallereclamo ON detallereclamo.Cod_Detalle=reclamo.Detalle_Reclamo 
		 //INNER JOIN seguimiento ON reclamo.Seguimiento_Actual=seguimiento.Cod_Seguimiento
		 //WHERE reclamo.Cod_Reclamo='$CodReclamo'";
		// $registrosCierre=mysqli_query($idCone,$SqlCierre) or die ("Error en el select SqlCierre");
		 $FilaCierre=mysqli_fetch_array($registrosCierre);
		//$A=consultaAreaEmpleado($Dni);
		//$SqlEmpleado="SELECT Nombre_Personal,Area FROM personalreclamo WHERE Dni_Personal='$Dni_Personal'";
		//$registrosEmple=mysqli_query($idCone,$SqlEmpleado) or die ("Error en el select SqlEmpleado");
		//$FilaEmpleado=mysqli_fetch_array($registrosEmple);
		
		$ClienteNombre=$FilaCierre['Nombre_Cliente'];
		$ClienteTel=$FilaCierre['Tel_Cliente'];	
		$ClienteMail=$FilaCierre['Mail_Cliente'];
		$DescripcionReclamo=$FilaCierre['Descripcion_Reclamo'];
		$DescripcionSeguimiento=$FilaCierre['Descripcion'];
		
		//$NombrePersonal=$FilaEmple['Nombre_Personal'];
		
		$AreaPersonal=consultaAreaEmpleado($Dni_Personal);
		//$AreaPersonal=$FilaEmple['Area'];
		//echo"<h2>Cierre reclamo N&deg ".$CodReclamo."</h2>";
			
		echo'<input type="Hidden"name="NC" value='.$ClienteNombre.'>';
		//echo'<input type="Hidden"name="NP" value='.$Nombre_Personal.'>';
		echo'<input type="Hidden"name="Mail" value='.$ClienteMail.'>';
		//echo'<input type="Hidden"name="CR" value='.$CodReclamo.'>';
		echo'<input type="Hidden"name="AR" value='.$AreaPersonal.'>';
		
		
		?>
			<table>
			<tr><td><font color="#FAE5D3" size="4.5px"><b>Cliente:</b></td>
			    <td><font color="#FFFFFF" size="4"><?php echo"$ClienteNombre"?></td></tr>
			<tr><td><font color="#FAE5D3" size="4.5px"><b>Telefono:</b></td> 
				<td><font color="#FFFFFF" size="4"><?php echo"$ClienteTel"?></td></tr>
			<tr><td><font color='#FAE5D3' size='4.5px'><b>E-Mail:</b></td>
				<td><font color='#FFFFFF' size='4'><?php echo"$ClienteMail"?></td></tr>
			<tr><td><font color="#FAE5D3" size="4.5px"><b>Encargado:</b> </td>
				<td><font color="#FFFFFF" size="4"><?php echo"$Nombre_Personal" ?></td></tr>
			</table><br>
			<input class="form-check-input"  type="radio" name="Radio1" value="1" checked><form-check-label><font color='#FFFFFF' size='3'>Mail Autom&aacutetico </form-check-label></input>
			<input class="form-check-input"type="radio" name="Radio1" value="2" ><form-check-label><font color='#FFFFFF' size='4'>No envia</form-check-label></input>
			<br><br>
			<font color='#FAE5D3' size='4'>RECLAMO
			<textarea readonly class="form-control" id="DescripcionReclamo" name="DescripcionReclamo
			" style="height: 50px"><?php echo"$DescripcionReclamo"?></textarea><br>
			<font color='#FAE5D3' size='4'>SEGUIMIENTO
			<textarea readonly class="form-control" id="Descripcion" name="Descripcion" style="height: 50px"><?php echo"$DescripcionSeguimiento"?></textarea>
			<br>
			<font color='#FAE5D3' size='4'>CONCLUSI&OacuteN FINAL
			<textarea class="form-control" id="DescripcionCierre" name="DescripcionCierre" style="height: 100px"></textarea>	
<?php mysqli_close(conectar());?>
		<br><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Continuar</button>
	</form>
</section></body></main></html>