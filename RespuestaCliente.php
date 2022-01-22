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
	require("includes/e_mail.php");
	$idCone=conectar();
	$CodReclamo=$_REQUEST['CR'];
	$Dni_Personal=$_SESSION['Dni'];
	$Nombre_Personal=$_SESSION['Nombre'];
	$Nombre_Cliente=$_REQUEST['NC'];
	$Mail=$_REQUEST['Mail'];
	$DescripcionCierre=$_REQUEST['DescripcionCierre'];
	$Area=$_REQUEST['AR'];
	$CMail=$_REQUEST['Radio1'];
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Cierre Reclamo N&deg <?php echo"$CodReclamo"?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>

<?php		
	if($CMail=='1'){
        cliente_mail($Mail,$DescripcionCierre,$Nombre_Personal,$Nombre_Cliente,$CodReclamo);
		}
		$Recla=consultaCierreReclamoR($CodReclamo);
	if(mysqli_num_rows($Recla)!=0){
        header("Location:SoyUsuario.php");
		exit();
		}
		else
			{			
		     InsertCierreReclamo($CodReclamo,$Dni_Personal,$DescripcionCierre);  
			}
		mysqli_close(conectar());
 ?>
	<h1>Se ha cerrado correctamente el reclamo</h1><br>
		
<Form Action="MisGestiones.php" Method="Post">		
<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Aceptar</button>
	</form>
</section></body></main></html>	