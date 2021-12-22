
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
	  <section class="login"><center>
		
		<br>
		
	    
		 <?Php
		 require("/Utiles/ConexionLDQ.php");
		 $idCone=conectar();
		 
		 $Mail=$_POST['mail'];
		 $Dni=$_REQUEST['dni'];
		 $U=$_REQUEST['radio1'];
		 $codigo=rand(1000,9999);
		 if($U==1)
		    {
			 $consulta="Select * from clienteexterno where Dni_Cliente= '".$Dni."' and Mail_Cliente= '".$Mail."'";
             $resultado=mysqli_num_rows(mysqli_query($idCone,$consulta));
			 
			 if ($resultado==0)
				{
					echo"<center>";
					echo"<h2><font color='YELLOW'>¡¡UPS!! <BR> Ingresó un dato incorrecto<h2>";
					echo"<br>";
					echo"<Form Action='Recuperar.html' Method='Post'>";
					echo"<input class='buttons' name='Volver' type='submit' value='Intentar nuevamente'>";
					echo"</form>";		
				}
				else
					{	
                     include("password_mail.php"); 				
					 $cambio="Update password set Password='$codigo' where Dni='$Dni'";
					 mysqli_query($idCone,$cambio);
					 
					 echo"<font color='white'><center><br>Verifique su e-mail para restablecer su cuenta<br>"	;
					}
			}
			
		else
			{ 
		      $consulta="Select * from personalreclamo where Dni_Personal= '".$Dni."' and Mail_Personal= '".$Mail."'";
              $resultado=mysqli_num_rows(mysqli_query($idCone,$consulta));
			 
			  if ($resultado==0)
				{
					echo"<center>";
					echo"<h2><font color='YELLOW'>¡¡UPS!! <BR> Ingresó un dato incorrecto<h2>";
					echo"<Form Action='Recuperar.html' Method='Post'>";
					echo"<input class='buttons' name='Volver' type='submit' value='Intentar Nuevamente'>";
					echo"</form>";	
				}
			     else
					{ include("password_mail.php"); 				
					 $cambio="Update password set Password='$codigo' where Dni='$Dni'";
					 mysqli_query($idCone,$cambio);
					 
					  echo"<font color='white'><center><br>Verifique su e-mail para restablecer su cuenta<br><br>"	;	;
					}
					
			}
			mysqli_close($idCone);
 ?>
			
		<br>
		<Form Action="Index.html" Method="Post">
		<input class="buttons" type="submit" name="ACEPTAR" value="Volver al Menu">
		</form>	
        </section>
        
	</body></main>