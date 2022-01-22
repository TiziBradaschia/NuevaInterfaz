 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Consultas Reclamos</title>
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
	$Dni=$_SESSION['Dni'];
    $Reclamo=$_REQUEST['Reclamo'];
	$Estado=$_REQUEST['Estado'];
	$Area=$_REQUEST['Area'];

if ($Area==""&& $Estado=="" && $Reclamo==""){
		$SqlTotal = ConsultaVistaReclamos();
		}
		elseif ($Area!=""&& $Estado!="" && $Reclamo!=""){
					$SqlTotal = ConsultaVistaReclamosAER($Area,$Estado,$Reclamo);
					}
		 elseif ($Area!=""&& $Estado=="" && $Reclamo==""){
					$SqlTotal =  ConsultaVistaReclamosA($Area);
					}
        elseif ($Area!=""&& $Estado!="" && $Reclamo==""){
					 $SqlTotal = ConsultaVistaReclamosAE($Area,$Estado);
					}	
		elseif ($Area!=""&& $Estado=="" && $Reclamo!=""){
					 $SqlTotal = ConsultaVistaReclamosAR($Area,$Reclamo);
					}
        elseif ($Area==""&& $Estado=="" && $Reclamo!=""){
					 $SqlTotal = ConsultaVistaReclamosC($Reclamo);	
					}
		elseif ($Area==""&& $Estado!="" && $Reclamo!=""){ 
				     $SqlTotal = ConsultaVistaReclamosRE($Reclamo,$Estado);
					}else{
						 $SqlTotal = ConsultaVistaReclamosE($Estado);
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
				<th scope="col"><center><font color="white">SEGUIMIENTO
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
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$C;
						echo"<td class='table-danger' align='center'>".$A;
						echo"<td class='table-danger' align='center'>".$F;
						echo"<td class='table-danger' align='center'>".$D;
						echo"<td class='table-danger' align='center'>".$E."*";
						echo"<td class='table-danger' align='center'>".$DP;
						echo"<td class='table-danger' align='center'>".$Se;
                    }		
						echo"</tbody></div>";		
				}
		mysqli_close(conectar());
?>
		<br><br>
<table>
	<tr><td><form name="submit" method="post" action="ConsultaReclamoEmpleado.php">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search" size="lg" color="#FAE5D3" animation="tada"></box-icon>Otra b&uacutesqueda </button></form></td>
	  <td><Form Action="ConsultasGenerales.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar al men&uacute </button></form></td>
		 
	   <td><button type="submit" class="botoncito1" onClick="window.print()"> <box-icon class=" border border-secondary border-3 rounded-circle" name="printer" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Imprimir </button>
	</tr>
</table>
<p><font color="white"><b>*A</b> Activo  <b>*C</b> Cancelado  <b>*S</b> Solucionado <b>*F</b> Finalizado</p>
</section></body></main></html>