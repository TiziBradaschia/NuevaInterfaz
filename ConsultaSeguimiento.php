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
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border 	border-secondary border-1 rounded-circle">B&uacutesqueda de Seguimientos<img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
<?php
	if(!isset($_SESSION['Nombre'])){
		echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$idCone=conectar();	
	$Dni=$_SESSION['Dni'];
?>
<form name="contact" method="post" action="ConsultaSeguimientoBase.php">
		<div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="library" type="solid" size="md" color="#FAE5D3"></box-icon>  Seg&uacuten n&deg  de reclamo</span>
				<input class="form-control" type="text" name="Reclamo">
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Seg&uacuten el &aacuterea </span>
				<Select name='Area'><option value=''>Seleccione un &aacuterea </option>
<?php
				 $CArea=consultaArea();
				 while($Fila=mysqli_fetch_array($CArea))
			    	{
					  $CA=$Fila['Cod_Area'];
					  $NA=$Fila['Nombre_Area'];
					  echo "<option value='$NA'>$NA</option>";
				    }
?>
				</Select></div>
				<br><br>
		<div class="input-group mb-1">
			<span class="input-group-text"><box-icon class="rounded-circle" name="toggle-left" size="md" color="#FAE5D3"></box-icon>  Seg&uacuten estado de seguimiento</span>
				<Select name='Estado'><option value=''>Seleccione un Estado</option>
<?php
				 $CEst=consultaEstadoSeguimiento();
				 while($Fila=mysqli_fetch_array($CEst))
			    	{
					  $CE=$Fila['Cod_Estado'];
					  $NE=$Fila['Nombre_Estado'];
					  echo "<option value='$NE'>$NE</option>";
					}
?>
				</select>
			<span class="input-group-text"><box-icon class="rounded-circle" name="toggle-left" size="md" color="#FAE5D3"></box-icon>  Seg&uacuten Tipo</span>
				<Select name='Tipo'><option value=''>Seleccione un tipo</option>
<?php
				 $CEst=consultaTipoSeguimiento();
				 while($Fila=mysqli_fetch_array($CEst))
			    	{
					  $CE=$Fila['Cod_Tipo'];
					  $NE=$Fila['Nombre_Tipo'];
					  echo "<option value='$NE'>$NE</option>";
					}
					
			mysqli_close($idCone);
?>
				</select></div>
<br><br>
<table>
		<tr>
		<td><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> Buscar </button></form></td>
		<td><Form action="ConsultasGenerales.php" Method="Post">
			<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> Retornar </button></form></td>
		</tr>
</table>
</section></body></main></html>