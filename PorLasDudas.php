 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Consultas Seguimientos</title>
   <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
   <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>	<br><br><br>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
<body>  
  <section class="login"><center>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border 	border-secondary border-1 rounded-circle">Resultados de la b&uacutesqueda <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>
	
<?php
	if(!isset($_SESSION['Nombre'])){
		echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$idCone=conectar();	

			$Area=$_REQUEST['Area'];
			$Estado=$_REQUEST['Estado'];
			$Tipo=$_REQUEST['Tipo'];
			$Dni=$_SESSION['Dni']; 
			$SqlAE="SELECT Area FROM personalreclamo WHERE Dni_Personal='$Dni'";
			$SArea=mysqli_fetch_array(mysqli_query($idCone,$SqlAE));
			$AreaPersonal=$SArea['Area'];
			
			$Reclamo=$_REQUEST['Reclamo'];
		if ($Reclamo==""){
			if ($Area==""&& $Estado=="" && $Tipo=="")
			 {
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento			 			
				//FROM seguimiento
				//INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				ORDER BY  area.Nombre_Area ASC,seguimiento.Reclamo DESC";
				}
				else
				{
				 if ($Area!=""&& $Estado!="" && $Tipo!="")
				{
				$A=$_REQUEST['Area'];
				$E=$_REQUEST['Estado'];
				$T=$_REQUEST['Tipo'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Area_Seguimiento='$A' 
				AND seguimiento.Estado_Seguimiento='$E'
				AND seguimiento.Tipo_Seguimiento='$T'";
				}
				else
				{
				if ($Area!=""&& $Estado=="" && $Tipo=="")
				{
				$A=$_REQUEST['Area'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Area_Seguimiento='$A'";
				}
				else
				{
				if ($Area!=""&& $Estado!="" && $Tipo=="")
				{
				$A=$_REQUEST['Area'];
				$E=$_REQUEST['Estado'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Area_Seguimiento='$A'
				AND seguimiento.Estado_Seguimiento='$E'";
				}
				else
				{
				if ($Area!=""&& $Estado=="" && $Tipo!="")
				{
				$A=$_REQUEST['Area'];
				$T=$_REQUEST['Tipo'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Area_Seguimiento='$A'
				AND seguimiento.Tipo_Seguimiento='$T'";
				}
				else
				{
				if ($Area==""&& $Estado=="" && $Tipo!="")
				{ 
			    $T=$_REQUEST['Tipo'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo ,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento						
				FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Tipo_Seguimiento='$T'";
				}
				else
				{
				if ($Area==""&& $Estado!="" && $Tipo!="")
				{ 
			     $E=$_REQUEST['Estado'];
				 $T=$_REQUEST['Tipo'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Estado_Seguimiento='$E'
				AND seguimiento.Tipo_Seguimiento='$T'";
				}
				else
				{
				$E=$_REQUEST['Estado'];
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento		FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Estado_Seguimiento='$Estado'";
				}
				}
				}
				}
				}
				}
				}
			 	}
				else
				{
				$SqlTotal = "SELECT seguimiento.Cod_Seguimiento, area.Nombre_Area,seguimiento.Fecha_Alta,estadoseguimiento.Nombre_Estado,seguimiento.Fecha_Cambio_Estado,tiposeguimiento.Nombre_Tipo,seguimiento.Reclamo,seguimiento.Descripcion,seguimiento.Estado,seguimiento.Area_Seguimiento			FROM seguimiento
				INNER JOIN area ON seguimiento.Area_Seguimiento=area.Cod_Area
				INNER JOIN estadoseguimiento ON estadoseguimiento.Cod_Estado=seguimiento.Estado_Seguimiento 
				INNER JOIN tiposeguimiento ON  tiposeguimiento.Cod_Tipo=seguimiento.Tipo_Seguimiento
				WHERE seguimiento.Reclamo='$Reclamo'
				ORDER BY seguimiento.Cod_Seguimiento DESC";
				}
					
		$registros=mysqli_query($idCone,$SqlTotal) or die ("Error en el select SqlTotal");
				if (mysqli_num_rows($registros)==0)
						{
						 echo "No existen coincidencias con la b&uacutesqueda";
						} 
				else{
				echo"<center>";
				echo"<table border='2'>";
				echo"<tr align='center'>";
				echo"<th>"."C&oacutedigo";
				echo"<th>"."&Aacuterea";
				echo"<th>"."Tipo Seguimiento";
				echo"<th>"."Fecha Alta";
				echo"<th>"."Estado";
				echo"<th>"."Fecha cambio";
				echo"<th>"."Reclamo";
				echo"<th>"."Descripcion";
				echo"<th>"."Editar";
				echo"</tr>";
				while($Fila=mysqli_fetch_array($registros))
		  			 {
						$C=$Fila['Cod_Seguimiento'];
						$D=$Fila['Nombre_Area'];
						$CA=$Fila['Area_Seguimiento'];
						$R=$Fila['Fecha_Alta'];	
						$P=$Fila['Nombre_Estado'];
						$S=$Fila['Fecha_Cambio_Estado'];
						$F=$Fila['Nombre_Tipo'];
						$Re=$Fila['Reclamo'];
						$De=$Fila['Descripcion'];
						$Estado=$Fila['Estado'];
						echo"<tr>";
						echo"<td align='center'>".$C;
						echo"<td>".$D;
						echo"<td>".$F;
						echo"<td>".$R;
						echo"<td>".$P;
						echo"<td>".$S;
						echo"<td>".$Re;
                        echo"<td>".$De;
						if($Estado=='0'&& $CA==$AreaPersonal)
							{
						echo"<td >";
						echo"<a href='EditarSeguimiento.php?Cx=$C'>";
						echo"<img src='imagenes/editar.jfif' height=50'>";
						echo"</a></td>";
						}else 
								{
								echo"<td></td>";
								}
							echo"</tr>";	
		   			}
		    	echo"</table>";
				}
		mysqli_close($idCone);
		
		?>
		 
		
<table>
	<tr><td><form name="submit" method="post" action="ConsultaSeguimiento.php">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search" size="lg" color="#FAE5D3" animation="tada"></box-icon>Otra b&uacutesqueda </button></form></td>
	  <td><Form Action="ConsultasGenerales.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar al men&uacute </button></form></td>
		 
	   <td><button type="submit" class="botoncito1" onClick="window.print()"> <box-icon class=" border border-secondary border-3 rounded-circle" name="printer" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Imprimir </button>
	</tr>
</table>
</section></body></main></html>