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
		<title>Seguimientos por &aacuterea</title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
</head>
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
	
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> Mis seguimientos Activos <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
<?php
    $Dni=$_SESSION['Dni'];
    $Area=consultaAreaEmpleado($Dni);
    $registros=ConsultaVistaSeguimiento($Area);
 if (mysqli_num_rows($registros)==0){
?>
	<h1>No existen coincidencias con la b&uacutesqueda </h1>
<?php       }
            else{ 
?>              
                <div class="table-responsive-sm">
                <table class="table  table-striped table-hover table-sm">
				<thead>
				<tr>
				<th scope="col"><center><font color="white" >SEGUIMIENTO
				<th scope="col"><center><font color="white">SEGUIMIENTO
				<th scope="col"><center><font color="white">ALTA
				<th scope="col"><center><font color="white">ESTADO
				<th scope="col"><center><font color="white">F.CAMBIO
				<th scope="col"><center><font color="white">RECLAMO
				<th scope="col"><center><font color="white">DESCRIPCI&OacuteN
				<th scope="col"><center><font color="white">EDICI&OacuteN
				</tr>
				</thead>
				<tbody>
<?php 
				while($Fila=mysqli_fetch_array($registros))
		  			{  
						$Seguimiento=$Fila['Cod_Seguimiento'];
						$FechaAlta=$Fila['Fecha_Alta'];	
						$Nombre_Estado=$Fila['Nombre_Estado'];
						$FechaCambio=$Fila['Fecha_Cambio_Estado'];
						$TipoSegui=$Fila['Nombre_Tipo'];
						$Reclamo=$Fila['Reclamo'];
						$Descripcion=$Fila['Descripcion'];
						$Estado=$Fila['Estado'];
						if($Estado!='1'){
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$Seguimiento;
						echo"<td class='table-danger' align='center'>".$TipoSegui;
						echo"<td class='table-danger' align='center'>".$FechaAlta;
						echo"<td class='table-danger' align='center'>".$Nombre_Estado;
						echo"<td class='table-danger' align='center'>".$FechaCambio;
						echo"<td class='table-danger' align='center'>".$Reclamo;
						echo"<td class='table-danger' align='center'>".$Descripcion;
						
						//if($Estado!='1'){
						echo'<td align="center"><a href="ActualizarSeguimiento.php?Cx='.$Seguimiento.'"><box-icon class="border border-secondary border-2 rounded-circle" name="edit-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon></a>'; 
							//}else{
								// echo"<td></td>";
						}
					}	
						echo"</tbody>";		
			}
			mysqli_close(conectar()	);
?>
</tr></table></div>
<br><table><tr>
	<td>
	 <form name="contact" method="post" action="MisGestiones.php">
	  <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>Retornar</button>
	   </form></td>
	<td>
	  
	   <button type="submit" class="botoncito1" onClick="window.print()"> <box-icon class=" border border-secondary border-3 rounded-circle" name="printer" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Imprimir </button>
	  </td>
	</tr></table>
</body></section></main></html>