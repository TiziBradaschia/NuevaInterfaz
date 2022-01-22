 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Consultas Generales</title>
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
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Men&uacute de consulta Empleados<img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>

<center>
<table class="table2" align="center" valign="center" height="80%" width="100%">
	<tr>
		<td>
		     <Form action="ConsultaReclamoEmpleado.php" Method="Post">           
			 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="library" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Reclamos</button></form>
			
		</td>
		<td>	
			<Form action="ConsultasGenerales.php" Method="Post">
			 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="face" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Clientes</button></form>
			</Form>
		</td>
	</tr>
	<tr>
		<td>
			<Form action="ReporteProblemas.php" Method="Post">
			 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="line-chart" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> Medici&oacuten de  Problemas</button></form>
		</td>
		
		<td>
			<Form action="ConsultaSeguimiento.php" Method="Post">
			<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="list-ol" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Seguimientos</button></form>
		</td>
		
	</tr>
</table>

<?Php
  echo "<center><H2> Bienvenido/a $_SESSION[Nombre]</h2>";
?>

<Form action="SoyUsuario.php" Method="Post">
 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> Retornar al men&uacute </button></form>
</section></body></main></html>	
		