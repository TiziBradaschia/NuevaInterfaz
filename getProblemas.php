<?php
require("../ConexionLDQ.php");
$CS=$_POST['CS'];

	
	$consultaProv="Select * from problema WHERE Servicio='$CS'ORDER BY Descripcion_Problema ASC";
	$Cproblema=mysqli_query(conectar(),$consultaProv)or die ("Error base Problema");
	
	$html="<option value='0'>Seleccionar Problema</option>";
	while($Fila=mysqli_fetch_array($Cproblema))
		{
		$CP=$Fila['Cod_Problema'];
		$DP=$Fila['Descripcion_Problema'];
		$EP=$Fila['Estado'];
		if($EP==0)
		   $html.="<option value='".$CP."'>".$DP."</option>";
			else
				$html.="<option value='".$CP."'disabled='disabled'>".$DP."</option>";
				
		}
	echo $html;


?>