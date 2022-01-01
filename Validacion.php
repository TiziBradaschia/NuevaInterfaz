<?php
session_start();
?>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<title>Validaci&oacuten de usuarios</title>
		<link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
	</head>	
    <main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
	<body>  
	 <section class="login"><center>
    <h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> VALIDACI&OacuteN DE USUARIOS <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1>
		 <section class="inicio">
		 
		 <br><br>
		 <?Php
		require("includes/ConexionLDQ.php");
		require("includes/baseDeDatos.php");
        $idCone=conectar();
		$Dni=$_REQUEST["Dni"];
        $Contra=$_REQUEST["Contra"];
		$U=$_REQUEST['radio1'];
		
		$SqlClave=selectClave($Dni,$Contra);
		if(mysqli_num_rows($SqlClave)==00){
		    ?>
			<center><h1><font color='#FF0000'>EL USUARIO O CONTRASE&NtildeA NO COINCIDEN</font><h1><br><br>
			<a href="IngresoUsuario.html">Intentar nuevamente</a>
			<?Php
		    }elseif($U==1)
		    	{
				   $SqlCliente=selectCliente($Dni);
				   if (mysqli_num_rows($SqlCliente)==0)
					{?>
					<center><br><br><h1><font color='#FF0000'>CLIENTE NO ENCONTRADO</font><h1>
					<br><br><a href="IngresoUsuario.html">Intentar nuevamente</a>
					 <?Php
					}
					else{ 
					      $Fila=mysqli_fetch_array($SqlCliente);
					      $_SESSION['Nombre']=$Fila['Nombre_Cliente'];
						  $_SESSION['Dni']=$Fila['Dni_Cliente'];
						  $_SESSION['Tipo']="C";
						  header("Location:SoyUsuario.php");
						  exit();
						}
			    }else{ 
				      $SqlEmpleado=selectEmpleado($Dni);
		              if (mysqli_num_rows($SqlEmpleado)==0)
						{?>
						<center><br><br><h1><font color='#FF0000'>EMPLEADO NO ENCONTRADO</font><h1>
						<br><br><a href="IngresoUsuario.html">Intentar nuevamente</a>
						 <?Php
						}
						 else
						   {
							$Fila=mysqli_fetch_array($SqlEmpleado);
							$_SESSION['Nombre']=$Fila['Nombre_Personal'];
							$_SESSION['Dni']=$Fila['Dni_Personal'];
							if($Fila['Jerarquia']==1)
								{
								$_SESSION['Tipo']="A";
								}
								else
									{
									 $_SESSION['Tipo']="E";
									}
								header("Location:SoyUsuario.php");
								exit();
								}
					 }
					
mysqli_close($idCone);
 ?>
</section>
</body></html></main>