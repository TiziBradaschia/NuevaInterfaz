 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Mis Gestiones</title>
   <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
   <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>	<br>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
	<body>  
	 <section class="login"><center>
<?php
if(!isset($_SESSION['Nombre']))
   {
	echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
	die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
	}
require("includes/ConexionLDQ.php");
require("includes/baseDeDatos.php");
$Dni=$_SESSION['Dni'];
$Tipo=$_SESSION['Tipo'];
$A=consultaAreaEmpleado($Dni);
?>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Gestiones de <?php echo"$A"; ?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br><br><center>
         <table class="table2" height="100%" width="100%" >
	     <tr align="center" valign="center" >
		
		<td align="center" valign="center" ><Form Action="SeguimientosPorArea.php" Method="Post">
		    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="face" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> <?Php if ($Tipo=='A'){
							echo'Seguimientos' ;
							} else{
								   echo'Mis Seguimientos'; }?></button></form></td>
		<td align="center" valign="center" ><Form Action="ReclamosPorArea.php" Method="Post">
		     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon><?Php if ($Tipo=='A'){
							echo'Reclamos' ;
							} else{
								   echo'Reclamos del &aacuterea'; }?>  </button></form></td>	
		<?Php if ($Tipo=='A'){?></tr><tr align="center" valign="center" ><?php }?>						   
		<td align="center" valign="center" ><Form Action="CierreReclamo.php" Method="Post">
			 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="power-off" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cierre de gestiones </button></form></td>
			<?Php if ($Tipo=='A'){?><td align="center" valign="center" ><Form Action="#" Method="Post">
			<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="power-off" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Alta usuarios </button></form></td><?php }?>
		</tr>
        </table>

<br><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover" href="SoyUsuario.php"></box-icon><a href="SoyUsuario.php">RETORNAR</a>
<center><br><p class="fst-italic fs-4" align="center"><font color="#FAE5D3"> Usted se identific&oacute como <?Php echo "$_SESSION[Nombre]"?><p>
</body></section>
</html></main>