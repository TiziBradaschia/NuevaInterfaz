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
 </head>
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
	$CR=$_REQUEST['Cx'];
	$Nombre=$_SESSION['Nombre'];
	$Dni=$_SESSION['Dni'];
	
?>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> 
	Actualizar Reclamo N&deg<?php echo"$CR"?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>

	<form name="Actualizar" method="post" action="ActualizarReclamoBase.php?Cx=<?php echo"$CR"?>">
<?php
	$registro=ConsultaVistaReclamosC($CR);
		if($Fila=mysqli_fetch_array($registro)){
			$C=$Fila['Codigo'];
			$A=$Fila['Area'];
			$F=$Fila['Fecha_Alta'];	
			$D=$Fila['Observaciones'];
			$E=$Fila['Estado'];
			$DP=$Fila['Problema'];
			$Se=$Fila['Seguimiento'];
			//$EAnt=$Fila['Estado'];  
			$DAnt=$Fila['Observaciones'];
			$DetReclamo=$Fila['Detalle'];}
?>
	
        <!-- <input type="Hidden"name="CEstadoAnt" value='<?php //echo"$EAnt"?>'>-->
	   
		 <!-- <input type="Hidden"name="Codigo" value='<?php //echo"$C"?>'>-->
		 <!--<input type="Hidden"name="DetReclamo" value='<?php //echo"$DetReclamo"?>'>-->
	
		  <font color="magenta" size="5px"><?php echo"$Nombre"?> Dni n&deg <?php echo"$Dni"?><br>
	 
		  
		<br>
			<h2 align="left">Detalle del Reclamo</h2>
			<table >
			<tr><td><font color='#FAE5D3' size='4.5px'><b>Area:</b></td>
				<td><font color="white" size='4'><?php echo"$A"?></td></tr>
			<tr><td><font color="#FAE5D3" size="4.5px"><b>Fecha:</b> </td>
				<td><font color="white" size="4"><?php echo"$F"?></td></tr>
			<tr><td align='left'><font color='#FAE5D3' size='4'><b>Problema:</td>
				<td align='left'><font color="white" size='4'><?php echo"$DP"?></td></tr>
			<tr><td align='left'><font color='#FAE5D3' size='4'><b>Estado del Reclamo :</td>
				<td align='left'><Select name='EstadoReclamo'>
<?php
			$SqlE=consultaEstadoReclamo();
			while($FilaE=mysqli_fetch_array($SqlE))
			       {
			         $CE=$FilaE['Cod_Estado'];
			         $NE=$FilaE['Nombre_Estado'];
					  if($CE==$E){
				        echo "<option value='$CE' selected='true'>".$NE."</option>";
				          }
						  elseif($CE=='C'){
				             echo "<option value='$CE'>$NE</option>";
				             }
				   }
?>
				</Select></td></tr>	
			<tr><td align='left'><font color='#FAE5D3' size='4'><b>Descripci&oacuten: </td>
	            <td><textarea class="form-control" name="Descripcion" rows="4"><?php echo"$D"?></textarea></td>
		    </tr></table>
<?php
        
		mysqli_close($idCone);
?>
    
	<table><tr>
	 <td><form name="contact" method="post" action="MisReclamos.php"><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Actualizar</button></form></td>
	<td><Form Action="MisReclamos.php" Method="Post">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cancelar </button></form></td>
	</tr></table>
	<input type="Hidden"name="CDescripcionAnt" value='<?php //echo"$DAnt"?>'>
</body></section></html></main>