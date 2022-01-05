<?php
session_start();
 if(!isset($_SESSION['Nombre'])){
    echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
	die ("<Br><Br><Center><Font Color='#EF280F'><H2>ยก Usted debe logearse para entrar al sitio !");
	}
require("includes/ConexionLDQ.php");
require("includes/baseDeDatos.php");
$idCone=conectar();
$Nombre=$_SESSION['Nombre'];
$Dni=$_SESSION['Dni'];
$Tipo=$_SESSION['Tipo'];		  

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
 </head>
 <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>
   <section class="login"><center><br>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> Datos Personales <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1>
    <form name="Actualizar" method="post" action="ModificarDatosPersonalesBase.php">
	<?php
		if($Tipo=="E")
			{
				$registros=mysqli_fetch_array(consultaEmpleado($Dni)) or die ("Error en consulta de Empleado");
				$Mail=$registros['Mail_Personal'];
				$Area=$registros['Nombre_Area'];
				$Jerarquia=$registros['Nombre_Jerarquia'];
				?><table>
				<tr>
				<td><font color="#808080" size="4">Apellido y Nombre :</td> 
				<td><input class="controles" size= "50" type="text" name="nombre" value=<?php echo"$_SESSION['Nombre']"?> required="required" ></td>
				</tr>
				<tr></tr>
				<input type="Hidden"name="CNombreAnt" value=<?php echo"$Nombre";?>>
		     	<tr>
				<td><font color="#808080" size="5">Dni :</td> 
				<td><input class="controles" size= "50" type="text" name="Dni" value="<?php echo"$Dni"?>" disabled></td>
				</tr><tr></tr>
				<tr>
				<td><font color="#808080" size="5">E-mail : </td>
				<td><input class="controles" size= "50" type="text" name="Mail" value=<?php echo"$Mail";?> required="required"></td>
				<input type="Hidden"name="CMailAnt" value=<?php echo"$Mail";?>>
				</tr><tr></tr>
		        <tr><td><font color='#808080' size='5'>Area :</td>
			    <td><Select name='Area'>
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
			    </Select></td></tr>
		        <input type="Hidden"name="AreaAnt" value=<?php echo"$Area";?>>
				<tr></tr>
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
		        <table>
				 <tr>
				   <td><font color="#808080" size="5">Apellido y Nombre :</td> 
				   <td><input class="controles" size= "50" type="text" name="nombre" value=<?php echo"$Nombre"?> required="required" ></td>
				 </tr>
				 <tr></tr>
				 <input type="Hidden"name="CNombreAnt" value='.$Nombre.'>
		     	<tr>
				  <td><font color="#808080" size="5">Dni :</td> 
				  <td><input class="controles" size= "50" type="text" name="Dni" value=<?php echo"$Dni"?> disabled></td>
				</tr>
				<tr></tr>
				<tr>
				 <td><font color="#808080" size="5">E-mail : </td>
				 <td><input class="controles" size= "50" type="text" name="Mail" value=<?php echo"$Mail"?> required="required">
				 </td>
				 <input type="Hidden"name="CMailAnt" value=<?php echo"$Mail"?>>
				</tr>
				<tr></tr>
				<tr>
				  <td><font color='#808080' size='5'>Barrio :</td>
			      <td><Select name='Barrio'>
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
			   </Select></td></tr>
				<input type="Hidden"name="BarrioAnt" value=<?php echo"$Barrio"?>>
				<tr><td><font color='#808080' size='5'>Ciudad :</td>
			    <td><Select name='Ciudad'>
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
			    </Select></td></tr>
				<input type="Hidden"name="CiudadAnt" value=<?php echo"$Ciudad"?>>
				<tr><td><font color='#808080' size='5'>Provincia:</td>
			    <td><Select name='Provincia'>
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
			    </Select></td></tr>
				<input type="Hidden"name="ProvinciaAnt" value=<?php echo"$Provincia"?>>
				<tr>
				<td><font color="#808080" size="5">Categor&iacutea :</td> 
				<td><input class="controles" size= "50" type="text" name="Categoria" value=<?php echo"$Categoria"?> disabled></td>
				</tr>
				<tr></tr>
			    </table>
<?php       }
mysqli_close($idCone);
?>
<br><table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr align="center" valign="top">
	  <td>
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="edit-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Actualizar</button>
	   </form></td>
	  <td>
	   <Form Action="#" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="key" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cambio de clave</button>
	   </form></td>
	  <td>
	   <Form Action="SoyUsuario.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar</button>
	    </form></td>
	</tr></table>
</section></body></html></main>




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
 </head>
 <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>
   <section class="login"><center><br>
   <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> Datos Personales <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1>
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
	if($Tipo=="E")
		{
		$registros=mysqli_fetch_array(consultaEmpleado($Dni)) or die ("Error en consulta de Empleado");
		$Mail=$registros['Mail_Personal'];
		$Area=$registros['Nombre_Area'];
		$Jerarquia=$registros['Nombre_Jerarquia'];
?>
	    <form name="Actualizar" method="post" action="ModificarDatosPersonalesBase.php">
		<table>
		
		<tr><td><font color="#808080" size="4">Apellido y Nombre :</td> 
		 <td><div class="input-group mb-1">
              <span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon></span>
		      <input class="form-control" type="text" name="nombre" value=<?php echo"$Nombre"?> required="requerido"></div></td>
		<input type="Hidden"name="CNombreAnt" value=<?php echo"$Nombre";?>>
		</tr>
		<tr>
		 <td><font color="#808080" size="4">Dni :</td> 
		 <td><div class="input-group mb-1">
             <span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon></span>
		     <input class="form-control form-control-lg" type="text" name="nombre" value="<?php echo"$Dni"?>" required="requerido" disabled></div></td>
		</tr>
		<tr>
			<td><font color="#808080" size="4">E-mail : </td>
			<td><div class="input-group mb-1">
             <span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon></span>
		     <input class="form-control" type="mail" name="nombre" value="<?php echo"$Mail"?>" required="requerido" disabled></div></td>	
				
				<input type="Hidden"name="CMailAnt" value=<?php echo"$Mail";?>>
				</tr><tr></tr>
		        <tr><td><font color='#808080' size='5'>Area :</td>
			    <td><Select name='Area'>
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
			    </Select></td></tr>
		        <input type="Hidden"name="AreaAnt" value=<?php echo"$Area";?>>
				<tr></tr>
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
		        <table>
				 <tr>
				   <td><font color="#808080" size="5">Apellido y Nombre :</td> 
				   <td><input class="controles" size= "50" type="text" name="nombre" value=<?php echo"$Nombre"?> required="required" ></td>
				 </tr>
				 <tr></tr>
				 <input type="Hidden"name="CNombreAnt" value='.$Nombre.'>
		     	<tr>
				  <td><font color="#808080" size="5">Dni :</td> 
				  <td><input class="controles" size= "50" type="text" name="Dni" value=<?php echo"$Dni"?> disabled></td>
				</tr>
				<tr></tr>
				<tr>
				 <td><font color="#808080" size="5">E-mail : </td>
				 <td><input class="controles" size= "50" type="text" name="Mail" value=<?php echo"$Mail"?> required="required">
				 </td>
				 <input type="Hidden"name="CMailAnt" value=<?php echo"$Mail"?>>
				</tr>
				<tr></tr>
				<tr>
				  <td><font color='#808080' size='5'>Barrio :</td>
			      <td><Select name='Barrio'>
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
			   </Select></td></tr>
				<input type="Hidden"name="BarrioAnt" value=<?php echo"$Barrio"?>>
				<tr><td><font color='#808080' size='5'>Ciudad :</td>
			    <td><Select name='Ciudad'>
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
			    </Select></td></tr>
				<input type="Hidden"name="CiudadAnt" value=<?php echo"$Ciudad"?>>
				<tr><td><font color='#808080' size='5'>Provincia:</td>
			    <td><Select name='Provincia'>
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
			    </Select></td></tr>
				<input type="Hidden"name="ProvinciaAnt" value=<?php echo"$Provincia"?>>
				<tr>
				<td><font color="#808080" size="5">Categor&iacutea :</td> 
				<td><input class="controles" size= "50" type="text" name="Categoria" value=<?php echo"$Categoria"?> disabled></td>
				</tr>
				<tr></tr>
			    </table>
<?php       }
mysqli_close($idCone);
?>
<br><table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr align="center" valign="top">
	  <td>
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="edit-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Actualizar</button>
	   </form></td>
	  <td>
	   <Form Action="#" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="key" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cambio de clave</button>
	   </form></td>
	  <td>
	   <Form Action="SoyUsuario.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar</button>
	    </form></td>
	</tr></table>
</section></body></html></main>