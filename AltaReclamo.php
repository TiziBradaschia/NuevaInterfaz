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
	$idCone=conectar();
	$N=$_SESSION['Nombre'];
	$D=$_SESSION['Dni'];
	$Hoy=getdate();
			//$D=$Hoy['mday'];
			//$M=$Hoy['mon'];
			//$A=$Hoy['year'];
			//$H=$Hoy['hours'];
			//$Min=$Hoy['minutes'];
			$Fecha=$Hoy['mday']."/".$Hoy['mon']."/".$Hoy['year'];
			$Hora=$Hoy['hours'].":".$Hoy['minutes'];
	
?>
     <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> Nuevo reclamo <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>
		<form name="contact" method="post" action="AltaReclamoBase.php"enctype="multipart/form-data">
		
		 <br>
		 <center>
		<table>
			<tr><td><font color="#FAE5D3" size="4"><b>Cliente:</b><font color="#FFFFFF" size="4"><?php echo"$N";?></td>
			<td><font color="#FAE5D3" size="4"><b>Dni:</b><font color="#FFFFFF" size="4"><?php echo"$D";?></td></tr>
			<tr><td><font color="#FAE5D3" size="4"><b>Fecha:</b><font color="#FFFFFF" size="4"><?php echo"$Fecha";?></td>
				<td><font color="#FAE5D3" size="4"><b>Hora:</b><font color="#FFFFFF" size="4"><?php echo"$Hora";?> </td></tr>
		  </table><br><hr>
		  <div class="input-group mb-4" align="center">
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Area: </span>
			<Select name='Area'>
<?php
			$CArea=consultaArea();
			while($Fila=mysqli_fetch_array($CArea))
			    {
			      $CA=$Fila['Cod_Area'];
			      $NA=$Fila['Nombre_Area'];
				  $EA=$Fila['Estado'];
			      if($EA==0)
			   		 echo "<option value='$CA'>$NA</option>";
				else
					echo "<option value='$CA' disabled='disabled'>$NA</option>";
			   }
?>
			</Select>
			
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Servicio: </span>
			<Select name='Servicio'>
<?php
			$Cservicio=consultaServicio();
			    while($Fila=mysqli_fetch_array($Cservicio))
			    {
			      $CS=$Fila['Cod_Servicio'];
			      $DS=$Fila['Descripcion_Servicio'];
				  $ES=$Fila['Estado'];
			      if($ES==0)
			   		 echo "<option value='$CS'>$DS</option>";
				else
					echo "<option value='$CS' disabled='disabled'>$DS</option>";
			   }
?>
			</Select>
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon> Problema: </span>
			<Select name='Problema'>
<?php
			$Cproblema=consultaProblema();
			    while($Fila=mysqli_fetch_array($Cproblema))
			    {
			      $CP=$Fila['Cod_Problema'];
			      $DP=$Fila['Descripcion_Problema'];
				  $EP=$Fila['Estado'];
			      if($EP==0)
						echo "<option value='$CP'>$DP</option>";
					else
						echo "<option value='$CP' disabled='disabled'>$DP</option>";
			   }
			   mysqli_close($idCone); 
?>
			</Select>
			</div>
		
		<textarea class="form-control" name="Descripcion" rows="4" placeholder="Describa aqu&iacute su problema"></textarea>
<br><br>		
<table><tr>
	<td><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Aceptar</button></form></td>

	<td><Form Action="SoyUsuario.php" Method="Post"><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cancelar </button></form></td>
</tr></table>
</body></section></html></main>		