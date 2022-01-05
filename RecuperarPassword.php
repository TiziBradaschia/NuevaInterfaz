<?php
 require("/includes/ConexionLDQ.php");
 require("/includes/baseDeDatos.php");
 require("/includes/e_mail.php");
 $idCone=conectar();
 $Mail=$_POST['mail'];
 $Dni=$_REQUEST['dni'];
 $U=$_REQUEST['radio1'];
 $codigo=rand(1000,9999);
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
	<?Php
		if($U==1)
		    {
			 $resultado=mysqli_num_rows(selectClienteMail($Dni,$Mail));
			if ($resultado==0){
				?><center><br><h1><font color='#FF0000'>&iexcl&iexclUPS!! Ingres&oacute un dato incorrecto...</font><h1>
					<a href="Recuperar.html"><hr>Intentar nuevamente<hr></a>
					<?php	
				}
				else
					{	
                     clave_mail($Mail,$codigo);	
                     UpdatePasword($codigo,$Dni);					 
					 echo"<font color='pink'><center><br>Verifique su e-mail para restablecer su cuenta<br><br>
					 <a href='IngresoUsuario.html'>Intentar nuevamente</a>";	
					}
			}else
			   { 
		       $resultado=mysqli_num_rows(selectEmpleadoMail($Dni,$Mail));
			   if ($resultado==0)
				{
					?><center><br><h1><font color='#FF0000'>&iexcl&iexclUPS!! Ingres&oacute un dato incorrecto...</font><h1>
					<a href="Recuperar.html"><hr>Intentar nuevamente<hr></a>
					<?php	
				}
			     else
					{ 	
				     clave_mail($Mail,$codigo);
					 UpdatePasword($codigo,$Dni);
					 echo"<font color='white'><center><br>Verifique su e-mail para restablecer su cuenta<br><br><a href='IngresoUsuario.html'>Intentar nuevamente</a>";
					}
			    }
			mysqli_close($idCone);
 ?>
</section>
</body></main></html>