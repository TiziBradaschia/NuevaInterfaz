 <html lang="es" dir="ltr">
	<head>
	    <meta charset="utf-8">
		<title>Registro Usuario</title>
		<link href="style.css" rel="stylesheet"  type="text/css"  />
	</head>	
	<body>
	    <section class="general">
	<?php
	    require ("Utiles/ConexionLDQ.php");
	    $idCone=Conectar();
        $D=$_REQUEST['Dni'];
        $C1=$_REQUEST['Clave'];
        $C2=$_REQUEST['Clave1'];
		$T=$_REQUEST['radio1'];
		if($T==1)
		{
	     $Tipo="Cliente";
		 $consulta1="Select * from clienteexterno where Dni_Cliente='$D'";
		}	
		else {
			$Tipo="Empleado";
			$consulta1="Select * from personalreclamo where Dni_Personal='$D'";
		}
		$resultado1=mysqli_num_rows(mysqli_query($idCone,$consulta1));
		$consulta="Select * from password where Dni='$D'";
		$resultado=mysqli_num_rows(mysqli_query($idCone,$consulta));
		
		
		if ($resultado!=0)
			{ 
			 echo"<h1><center>Un usuario con el mismo DNI ya existe</h1><br>";
			 echo "<center><a Href='RegistroUsuario.html'>Intentar nuevamente</a>";
			
			}
		    elseif($resultado1==0)
		      {
	          echo"<h1><center>Usted no fue dado de alta por el administrador...</h1><br><br>
			  <center><b>Por favor </b><a Href='contactoAdministrador.html'>Contáctelo</a><br><br><br>
			  <center><a Href='RegistroUsuario.html'>Inténtelo nuevamente</a>";			
			  }
		       elseif($_REQUEST['Clave']!=$_REQUEST['Clave1'])
		       { 
		        echo"<h1><center>Las claves no coinciden</h1><br>";
		        echo "<center><a Href='RegistroUsuario.html'>Intentar nuevamente</a>";
		        }else
		    
		       {
			$Sql="Insert into password(Dni,Password,Tipo) values ('$D','$C1','$Tipo')";
			
			mysqli_query($idCone,$Sql) or die ("Error en base de datos");
			
			echo"<h1><center>Los datos se grabaron correctamente</h1><br><br>";
			echo "<center><a Href='MenuInicio.html'>Retornar al ingreso</a>";
			}
		
		
		mysqli_close($idCone);
?>
	
	
	    </section>
		
	</body>
</html>
      