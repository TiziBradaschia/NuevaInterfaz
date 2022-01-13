 <?php
 require("/includes/ConexionLDQ.php");
 require("/includes/baseDeDatos.php");
 require("/includes/e_mail.php");
 $idCone=conectar();
 $Dni=$_REQUEST['Dni'];
 $C1=$_REQUEST['Clave'];
 $C2=$_REQUEST['Clave1'];
 $T=$_REQUEST['radio1'];
?>
<html lang="es" dir="ltr">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
  <title>Reestablecer Clave</title>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>
 <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>
   <section class="login"><center><br>
   <img href="QuienesSomos.html" src="imagenes/L D Q.png" width="80%" height="80%"align="center"class="border border-secondary border-3 rounded-circle	img-fluid"></img>
<?php
	   if($T==1)
		{
	     $Tipo="Cliente";
		 $consulta1=selectCliente($Dni);
		}	
		else {
			$Tipo="Empleado";
			$consulta1=selectEmpleado($Dni);
			}
		$resultado1=mysqli_num_rows($consulta1);
		$resultado=mysqli_num_rows(selectSoloClave($Dni));
		if ($resultado!=0)
			{ ?>
			<h1><center>Un usuario con el mismo DNI ya existe</h1><br>
			<center><a Href='RegistroUsuario.html'>Intentar nuevamente</a>
			<?php
			}
		    elseif($resultado1==0)
		      {?>
	             <h1><center>Usted no fue dado de alta por el administrador...</h1><br><br>
			     <center><a Href='ContactoAdministrador.html'>Presione Aqu&iacute para contactarlo </a><font color="white">o</font><a Href='RegistroUsuario.html'>Aqu&iacute para intentarlo nuevamente</a>
			  <?php
			  }
		       elseif($_REQUEST['Clave']!=$_REQUEST['Clave1'])
		       { ?>
		        <h1><center>Las claves no coinciden</h1><br>
		        <center><a Href='RegistroUsuario.html'>Intentar nuevamente</a>
				<?php
		        }else
		             {
			          InsertPasword($Dni,$C1,$Tipo)or die ("Error en base de datos");
			          echo"<h1><center>Los datos se grabaron correctamente</h1><br><br>
			               <center><a Href='IngresoUsuario.html'>Retornar al ingreso</a>";
			          }
	mysqli_close($idCone);
?>
 </section>
 </body>
</html>
      