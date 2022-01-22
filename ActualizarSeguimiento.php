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
		<title>Mis Seguimiento</title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
		<Script color="red" >
		function actualizar(direccion)
			{
				if(confirm("SEGURO DESEA ACTUALIZAR?"))
				{
				location=direccion;
				}
				else
				{
				alert("ACTUALIZACION Cancelada")	;
				}/*javascript:actualizar*/
			}
	    </Script>
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
<form name="Actualizar" method="post" action="ActualizarSeguimientoBase.php?Cx=<?php echo"$Codigo"?>">
<?php
		$registro=ConsultaVistaSeguimientoC($Codigo);
		if($Fila=mysqli_fetch_array($registro));
		   {
	        $NombreArea=$Fila['Nombre_Area'];	
			$NombreEstado=$Fila['Nombre_Estado'];
			$NombreTipo=$Fila['Nombre_Tipo'];
			$Reclamo=$Fila['Reclamo'];
			$Descripcion=$Fila['Descripcion'];
			$AreaAnterior=$Fila['Nombre_Area'];
?>
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
		  if($NA==$NombreArea){
			 	echo "<option value='$CA' selected='true'>$NA</option>";
			   }
			    elseif($EA==0)
			   		 echo "<option value='$CA'>$NA</option>";
				else
					echo "<option value='$CA' disabled='disabled'>$NA</option>";
		}
?>	
	</Select>
	<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Estado: </span>
	<Select name='Estado'>
<?php			
			$SqlE=consultaEstadoSeguimiento();
			while($FilaA=mysqli_fetch_array($SqlE))
			  {
			   $EC=$FilaA['Cod_Estado'];
			   $EN=$FilaA['Nombre_Estado'];
			   if($EN==$NombreEstado){
			   		echo "<option value='$EC' selected='true'>$EN</option>";
				    }
				 elseif($EC!='C'&&$EC!='F'&&$EC!='CC'){
					 echo "<option value='$EC'>$EN</option>";
					}
			   }
?>
	</Select></td></tr>	
	<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Tipo de Seguimiento: </span>
	<Select name='Tipo'>
<?php		
			$SqlT=consultaTipoSeguimiento();
			while($FilaA=mysqli_fetch_array($SqlT))
			  {
			   $TC=$FilaA['Cod_Tipo'];
			   $TN=$FilaA['Nombre_Tipo'];
			   
			   if($TN==$NombreTipo){
			   		echo "<option value='$TC' selected='true'><font color='red'>$TN</option>";
					}
				elseif($TC!='8'){
					echo "<option value='$TC'>$TN</option>";
					}
			   }
?>
</Select></td></tr>	
			</div>
<div class="form-floating bg-light" font="red">
			DESCRIPCI&OacuteN 
			<textarea class="form-control" id="Descripcion" name="Descripcion" style="height: 100px"><?php echo "$Descripcion";?></textarea>
            </div>
<?php	   }
mysqli_close(conectar());
?>
<table><center><tr>
	<td>
	 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Actualizar</button>
	   </form></td>
	<td>
	    <Form Action="SeguimientosPorArea.php" Method="Post">
	   <button type="submit" class="botoncito1"> <box-icon class=" border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon>Retornar </button>
	   </form></td>
	</tr></table>
</body></section></main></html>