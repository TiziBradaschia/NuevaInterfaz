<?php
	session_start();
	?>
	

<html lang="es" dir="ltr">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
  <title>Mis Datos</title>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head><br>
 <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>
   <section class="login"><center>
   <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> Datos Personales <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1>
   <form name="Actualizar" method="post" action="ActualizarDatos.php">
<?php
	
	if(!isset($_SESSION['Nombre'])){
		die ("<Center><Font Color='#EF280F'><H1>&iexcl Usted debe loguearse para entrar al sitio !<br><Br><center><a Href='IngresoUsuario.html'> Retornar al Ingreso </a>");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$idCone=conectar();
	$Nombre=$_SESSION['Nombre'];
	$Dni=$_SESSION['Dni'];
	$Tipo=$_SESSION['Tipo'];
	if($Tipo=="E"||$Tipo=="A")
		{
		$registros=mysqli_fetch_array(consultaEmpleado($Dni)) or die ("Error en consulta de Empleado");
		$Mail=$registros['Mail_Personal'];
		$Area=$registros['Nombre_Area'];
		$Jerarquia=$registros['Nombre_Jerarquia'];
?>
	    
		<div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon> Nombre y Apellido: </span>
		    <input class="form-control" type="text" name="Nombre" value=<?php echo"$Nombre"?> required="requerido"></div>
			<input type="Hidden"name="CNombreAnt" value=<?php echo"$Nombre";?>>
		
		<div class="input-group mb-1">
             <span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon> Dni: </span>
		     <input class="form-control" type="text" name="Dni" value="<?php echo"$Dni"?>" required="requerido" disabled></div>
		<div class="input-group mb-1">
           <span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon> E-mail :</span>
		    <input class="form-control" type="mail" name="Mail" value="<?php echo"$Mail"?>" required="requerido"></div>	
			<input type="Hidden"name="CMailAnt" value=<?php echo"$Mail";?>>
		<div class="input-group mb-1">
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Area de trabajo: </span><Select name='Area'>
<?php
				$CArea=consultaArea();			
			    while($Fila=mysqli_fetch_array($CArea)){
				  $Area=$Fila['Nombre_Area'];
			      $CA=$Fila['Cod_Area'];
			      $NA=$Fila['Nombre_Area'];
				  $EA=$Fila['Estado'];
				  if($Area==$NA)
					{
				     echo "<option value='$CA'selected='true'>$NA</option>";
				    }
				    elseif($EA==0){
									echo "<option value='$CA'>$NA</option>";
									}
				}
?>
			    </select></div>	
		        <input type="Hidden"name="AreaAnt" value=<?php echo"$Area";?>>
				
<?php
			}
		     else
				{
				 $registros=mysqli_fetch_array(consultaCliente($Dni)) or die ("Error en el select SqlCliente");	
				 $Mail=$registros['Mail_Cliente'];
				 $Tel=$registros['Tel_Cliente'];
				 $Dir=$registros['Dir_Cliente'];
				 $Barrio=$registros['Nombre_Barrio'];
				 $Ciudad=$registros['Nombre_Ciudad'];
				 $Provincia=$registros['Nombre_Provincia'];
				 $Categoria=$registros['Nombre_Categoria'];
?>
		        <div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon> Nombre y Apellido: </span>
					<input class="form-control" type="text" name="Nombre" value=<?php echo"$Nombre"?> required="requerido"></div>
					<input type="Hidden"name="CNombreAnt" value=<?php echo"$Nombre"?>>
		     	<div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon> Dni: </span>
					<input class="form-control" type="text" name="Dni" value="<?php echo"$Dni"?>" required="requerido" disabled></div>
				<div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="phone" type="solid" size="md" color="#FAE5D3"></box-icon> Telefono: </span>
					<input class="form-control" type="text" name="Telefono" value="<?php echo"$Tel"?>" required="requerido"></div>
				
				<div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon> E-mail :</span>
					<input class="form-control" type="mail" name="Mail" value="<?php echo"$Mail"?>" required="requerido"></div>	
					<input type="Hidden"name="CMailAnt" value=<?php echo"$Mail"?>>
				<div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="medal" type="solid" size="md" color="#FAE5D3"></box-icon> Categoria :</span>
					<input class="form-control" type="mail" name="Categoria" value="<?php echo"$Categoria"?>" disabled>	</div>
				<div class="input-group input-group-sm mb-1" >
					<span class="input-group-text"><box-icon class="rounded-circle" name="home-heart" type="solid" size="md" color="#FAE5D3"></box-icon> Direccion: </span>
					<input class="form-control" type="text" name="Direccion" value="<?php echo"$Dir"?>" required="requerido"></div>
				<div class="input-group input-group-sm mb-1">
					<span class="input-group-text"><box-icon class="rounded-circle" name="home" type="solid" size="md" color="#FAE5D3"></box-icon>  Barrio: </span><Select name='Barrio'>
				<?php
				$CBarrio=consultaBarrio();
			    while($Fila=mysqli_fetch_array($CBarrio))
			    {
			      $CB=$Fila['Cod_Barrio'];
			      $NB=$Fila['Nombre_Barrio'];
				  $EB=$Fila['Estado'];
				  if($Barrio==$NB)
				   {
				    echo "<option value='$CB'selected='true'>$NB</option>";
				   }
				   elseif($EB==0){
					         echo "<option value='$CB'>$NB</option>";
				            }
				       else{
					       echo "<option value='$CB' disabled>$NB</option>";
				           }
				}
?>
			   </Select>
				<input type="Hidden"name="BarrioAnt" value=<?php echo"$Barrio"?>>
					<span class="input-group-text"><box-icon class="rounded-circle" name="buildings" type="solid" size="md" color="#FAE5D3"></box-icon>  Ciudad: </span><Select name='Ciudad'>
<?php
				$CCiudad=consultaCiudad();
			    while($Fila=mysqli_fetch_array($CCiudad))
			    {
			      $CC=$Fila['Cod_Ciudad'];
			      $NoC=$Fila['Nombre_Ciudad'];
				  $EC=$Fila['Estado'];
				  if($Ciudad==$NoC)
				    {
				     echo "<option value='$CC' selected='true'>$NoC</option>";
				    }
				    elseif($EC==0){ 
					       echo "<option value='$CC'>$NoC</option>";
						   }
							else{
								 echo "<option value='$CC' disabled>$NoC</option>";
								}
				}
?>
			    </Select>
				<input type="Hidden"name="BarrioAnt" value=<?php echo"$Barrio"?>>
					<span class="input-group-text"><box-icon class="rounded-circle" name="city" type="solid" size="md" color="#FAE5D3"></box-icon>  Provincia: </span><Select name='Provincia'>
			   
<?php
				$CProvincia=consultaProvincia();
			    while($Fila=mysqli_fetch_array($CProvincia))
			    {
			      $CC=$Fila['Cod_Provincia'];
			      $NoC=$Fila['Nombre_Provincia'];
				  $EC=$Fila['Estado'];
				 if($Provincia==$NoC)
				  {
				    echo "<option value='$CC' selected='true'>$NoC</option>";
				   }
				 elseif($EC==0){
						echo "<option value='$CC'>$NoC</option>";
						}
						else{
						echo "<option value='$CC' disabled>$NoC</option>";
						}
				}
?>
			    </Select>
				<input type="Hidden"name="ProvinciaAnt" value=<?php echo"$Provincia"?>></div>
				
<?php       }
mysqli_close($idCone);
?>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
	  <td>
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="edit-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Actualizar</button>
	   </form></td>
	  <td>
	   <Form Action="ActualizarClave.html" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="key" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cambio de clave</button>
	   </form></td>
	  <td>
	   <Form Action="SoyUsuario.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar</button>
	    </form></td>
	</tr></table>
</section></body></html></main>