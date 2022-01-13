<?Php
			session_start();
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<link href="css/EstiloIndex.css" rel="stylesheet"  type="text/css"  />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
		<title>Soy Usuario</title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
   </head><br>
    <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
	 <body>   
    
		<section class="inicio"><center>
<?Php
		   if(!isset($_SESSION['Nombre']))
			  {
				 echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
				 die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexclUsted debe logearse para entrar al sitio !");
			  }
			   $Tipo=$_SESSION['Tipo'];
?>
	    <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> MEN&Uacute <?Php if ($Tipo=='A'){echo' ADMINISTRADOR ';}elseif($Tipo=='E'){echo' PRINCIPAL DE EMPLEADOS ';}else{echo' PRINCIPAL DE CLIENTES ';} ?><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"><hr></h1><br><br>
		<table>
		 <tr>
		    <td>
             <Form Action="MisDatos.php" Method="Post">
			 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="face" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon> Mis datos</button></form>
		<?Php if ($Tipo=='A'||$Tipo=='E'){
				echo'<Form Action="ConsultasGenerales.php" Method="Post">
		        <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Consultas</button></form>
			    </td>
			    <td></td><td></td>
		        <td><Form Action="MisGestiones.php" Method="Post">
			        <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="library" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Mis Gestiones</button>
		            </form>';}
			    else{
					echo'<Form Action="Reclamo.php" Method="Post">
		                 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="plus" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Nuevo Reclamo</button>
						</form></td>
			            <td></td><td></td>
					<td>
					<Form Action="MisReclamos.php" Method="Post">
					<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="library" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Mis Reclamos</button>
					</form>';} ?>
				
				<Form Action="CerrarSesion.php" Method="Post">
				 <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="power-off" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Cerrar Sesi&oacuten </button>
				</form>
			   </td>
		 </tr>
		</table>
		<center><br><p class="fst-italic fs-4" align="center"><font color="#FAE5D3"> Bienvenido/a <?Php echo "$_SESSION[Nombre]"?><p>
		</section>
</section>
</html></main>