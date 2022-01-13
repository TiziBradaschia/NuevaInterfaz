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
		<title>Mis Reclamos</title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head><br>
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

	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> Mis reclamos <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
<?php
    $date= getdate();
    $hoy=$date['mday']."/".$date['mon']."/".$date['year'];
	echo "$hoy";
    $idCone=conectar();
    $Dni=$_SESSION['Dni'];
	$Reclamo=$_REQUEST['Reclamo'];
	$Estado=$_REQUEST['Estado'];
	$Area=$_REQUEST['Area'];
	if ($Area==""&& $Estado=="" && $Reclamo==""){
		$SqlTotal = ConsultaVistaReclamosD($Dni);
		}
		elseif ($Area!=""&& $Estado!="" && $Reclamo!=""){
					$SqlTotal = ConsultaVistaReclamosDAER($Dni,$Area,$Estado,$Reclamo);
					}
		 elseif ($Area!=""&& $Estado=="" && $Reclamo==""){
					$SqlTotal = ConsultaVistaReclamosDA($Dni,$Area);
					}
        elseif ($Area!=""&& $Estado!="" && $Reclamo==""){
					 $SqlTotal = ConsultaVistaReclamosDAE($Dni,$Area,$Estado);
					}	
		elseif ($Area!=""&& $Estado=="" && $Reclamo!=""){
					 $SqlTotal = ConsultaVistaReclamosDAR($Dni,$Area,$Reclamo);
					}
        elseif ($Area==""&& $Estado=="" && $Reclamo!=""){
					 $SqlTotal = ConsultaVistaReclamosDR($Dni,$Reclamo);	
					}
		elseif ($Area==""&& $Estado!="" && $Reclamo!=""){ 
				     $SqlTotal = ConsultaVistaReclamosDRE($Dni,$Reclamo,$Estado);
					}else{
						  $SqlTotal = ConsultaVistaReclamosDE($Dni,$Estado);
						 }
 if (mysqli_num_rows($SqlTotal)==0){
?>
						<h1>No existen coincidencias con la b&uacutesqueda</h1>
<?php       }
            else{ 
?>              
                <div class="table-responsive-sm">
                <table class="table  table-striped table-hover">
				<thead>
				<tr >
				<th scope="col"><center><font color="white" >C&OacuteDIGO
				<th scope="col"><center><font color="white">&AacuteREA
				<th scope="col"><center><font color="white">FECHA
				<th scope="col"><center><font color="white">OBSERVACIONES
				<th scope="col"><center><font color="white">ESTADO
				<th scope="col"><center><font color="white">PROBLEMA
				<th ><center><font color="white">SEGUIMIENTO
				<th scope="col"><center><font color="white">EDICI&OacuteN
				</tr>
				</thead>
				<tbody>
				
<?php 
				while($Fila=mysqli_fetch_array($SqlTotal))
		  			 {
						$C=$Fila['Codigo'];
						$A=$Fila['Area'];
						$F=$Fila['Fecha_Alta'];	
						$D=$Fila['Observaciones'];
						$E=$Fila['Estado'];
						$DP=$Fila['Problema'];
						$Se=$Fila['Seguimiento'];
						$Estado=$Fila['EstadoUno'];
						
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$C;
						echo"<td class='table-danger' align='center'>".$A;
						echo"<td class='table-danger' align='center'>".$F;
						echo"<td class='table-danger' align='center'>".$D;
						echo"<td class='table-danger' align='center'>".$E."*";
						echo"<td class='table-danger' align='center'>".$DP;
						echo"<td class='table-danger' align='center'>".$Se;
                       	if($Estado!='1'){
							echo'<td  align="center"><a href="ActualizarReclamo.php?Cx='.$C.'"><box-icon class="border border-secondary border-2 rounded-circle" name="edit-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon></a>'; 
							}else{
								 echo"<td></td>";
								}
						}		
						echo"</tbody>";		
			}
			mysqli_close($idCone);
					?>
</tr></table></div>
<br><table><tr>
	<td>
	 <form name="contact" method="post" action="MisReclamos.php">
	  <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Otra consulta</button>
	   </form></td>
	<td>
	  <Form Action="SoyUsuario.php" Method="Post">
	   <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Volver al men&uacute </button>
	   </form></td>
	</tr></table>
	<p small><font color="white">* A (Activo) --  S (Solucionado) --  C (Cancelado)</p>
</body></section></html></main>