<?php
function selectReclamo($Dni)

{   echo'<tr><td><font color="#808080" size="5">N&uacutemero de reclamo:</td>';
    echo"<td><Select name='Reclamo'>";
	$consultaReclamo="Select Cod_Reclamo from reclamo where Cliente='$Dni' ORDER BY Cod_Reclamo ASC";
	$CRecla=mysqli_query(conectar(),$consultaReclamo)or die ("Error base TipoSeguimiento");
	echo"<option value=''>Seleccione el Reclamo</option>";
	while($Fila=mysqli_fetch_array($CRecla))
		{
		$CR=$Fila['Cod_Reclamo'];
		echo "<option value='$CR'>$CR</option>";
		}
	echo"</Select></td></tr>";
	echo"<tr></tr>";
}
function selectArea()
{  
     echo"<tr><td><font color='#808080' size='4.5'>Por Area:</td>";
     echo "<td><Select name='Area'>";
	$consultaArea="Select * from area ORDER BY Nombre_Area ASC";
	$CArea=mysqli_query(conectar(),$consultaArea)or die ("Error base Area");
	echo"<option value=''>Seleccione un &aacuterea</option>";
	while($Fila=mysqli_fetch_array($CArea))
		{
		 $CA=$Fila['Cod_Area'];
		 $NA=$Fila['Nombre_Area'];
		 $EA=$Fila['Estado'];
			      if($EA==0)
			   		 echo "<option value='$CA'>$NA</option>";
				else
					echo "<option value='$CA' disabled='disabled'>$NA</option>";
			   
		}
	echo"</Select></td></tr>";
}

function selectServicio()
{
	echo"<tr><td align='left'><font color='#808080' size='5'>Servicio :</td>";
	echo "<td align='left'><Select name='Servicio' id='Servicio'>";
	$consultaServ="Select * from servicio ORDER BY Descripcion_Servicio ASC";
	$Cservicio=mysqli_query(conectar(),$consultaServ)or die ("Error base Servicio");
	while($Fila=mysqli_fetch_array($Cservicio))
		{
		$CS=$Fila['Cod_Servicio'];
		$DS=$Fila['Descripcion_Servicio'];
		 $ES=$Fila['Estado'];
		if($ES==0)
			 echo "<option value='$CS'>$DS</option>";
			else
				echo "<option value='$CS' disabled='disabled'>$DS</option>";
		}
	 echo"</Select></td>";
}

function selectProblema()
{
	echo"<td><font color='#808080' size='5'>Problema :</td>";
	echo "<td align='left'><Select name='Problema'>";
	$consultaProv="Select * from problema ORDER BY Descripcion_Problema ASC";
	$Cproblema=mysqli_query(conectar(),$consultaProv)or die ("Error base Problema");
	while($Fila=mysqli_fetch_array($Cproblema))
		{
		$CP=$Fila['Cod_Problema'];
		$DP=$Fila['Descripcion_Problema'];
		$EP=$Fila['Estado'];
		if($EP==0)
		   echo "<option value='$CP'>$DP</option>";
			else
				echo "<option value='$CP' disabled='disabled'>$DP</option>";
		}
 echo"</Select></td></tr>";
}



function selectEstado()
{
	echo'<tr><td><font color="#808080" size="5">Por Estado de Reclamo:</td>';
	echo"<td><Select name='Estado'>";
	$consultaEst="Select * from estadoreclamo ORDER BY Nombre_Estado ASC";
	$CEst=mysqli_query(conectar(),$consultaEst)or die ("Error base EstadoSeguimiento");
	echo"<option value=''>Seleccione un Estado</option>";
	while($Fila=mysqli_fetch_array($CEst))
		{
		$CE=$Fila['Cod_Estado'];
		 $NE=$Fila['Nombre_Estado'];
		echo "<option value='$CE'>$NE</option>";
		}
	echo"</Select></td></tr>";
	echo"<tr></tr>";
	
}
?>
