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
   <section class="login"><center><br>
   <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> Datos Personales <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1>
   
<?php
	if(!isset($_SESSION['Nombre'])){
		die ("<Center><Font Color='#EF280F'><H1>&iexcl Usted debe loguearse para entrar al sitio !<br><Br><center><a Href='IngresoUsuario.html'> Retornar al Ingreso </a>");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$idCone=conectar();
	$Dni=$_SESSION['Dni'];
	$Tipo=$_SESSION['Tipo'];
	$Nombre=$_REQUEST['Nombre'];
	//$NombreAnterior=$_REQUEST['CNombreAnt'];
	$Mail=$_REQUEST['Mail'];
	if($Tipo=="E"){
		$Area=$_REQUEST['Area'];
		//$AreaAnterior=$_REQUEST['AreaAnt'];
		$updateEmpleado=updateDatosEmpleado($Dni,$Nombre,$Mail,$Area);
		$_SESSION['Nombre']=$Nombre;
		?>
		<h1>&iexclSus datos se actualizaron con &eacutexito!<h1><br>
		<?php
		}
		else{
			 $Tel=$_REQUEST['Telefono'];
			 $Dir=$_REQUEST['Direccion'];
			 $Barrio=$_REQUEST['Barrio'];
			 $Ciudad=$_REQUEST['Ciudad'];
			 $Provincia=$_REQUEST['Provincia'];
			 $updateCliente=updateDatosCliente($Dni,$Nombre,$Mail,$Tel,$Dir,$Barrio);
			 $_SESSION['Nombre']=$Nombre;
			?>
			<h1>&iexclSus datos se actualizaron con &eacutexito!<h1><br>
			<?php
			}
			
    mysqli_close($idCone);
?>

<center>
<table><tr>
<td>
<Form Action="MisDatos.php" Method="Post">
<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar</button>
</form></td>
</tr></table>




</section</body></html></main>