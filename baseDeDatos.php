<?php
function selectClave($Dni,$Contra){
	$consultaClave="Select * from password where Dni='".$Dni."' and Password= '".$Contra."'";
	$SqlClave=mysqli_query(conectar(),$consultaClave);
	return $SqlClave;
}
function selectSoloClave($Dni){
	$consultaClave="Select * from password where Dni='$Dni'";
	$SqlClave=mysqli_query(conectar(),$consultaClave);
	return $SqlClave;
}
function selectCliente($Dni){
	$consultaCliente="Select * from clienteexterno where Dni_Cliente='$Dni'";
    $SqlCliente=mysqli_query(conectar(),$consultaCliente);
	return $SqlCliente;
}
function consultaCliente($Dni){
	$consultaCliente="Select * from cliente where Dni_Cliente='$Dni'";
    $SqlCliente=mysqli_query(conectar(),$consultaCliente);
	return $SqlCliente;
}
function selectClienteMail($Dni,$Mail){
	$consultaCliente=$consulta="Select * from clienteexterno where Dni_Cliente= '".$Dni."' and Mail_Cliente= '".$Mail."'";
    $SqlCliente=mysqli_query(conectar(),$consultaCliente);
	return $SqlCliente;
}
function selectEmpleado($Dni){
	$consultaEmpleado="Select * from personalreclamo where Dni_Personal='$Dni'";
    $SqlEmpleado=mysqli_query(conectar(),$consultaEmpleado);
	return $SqlEmpleado;
	     
}
function consultaEmpleado($Dni){
	$consultaEmpleado="Select * from empleado where Dni_Personal='$Dni'";
    $SqlEmpleado=mysqli_query(conectar(),$consultaEmpleado);
	return $SqlEmpleado;
	     
}
function selectEmpleadoMail($Dni,$Mail){
	$consultaEmpleado=$consulta="Select * from personalreclamo where Dni_Personal= '".$Dni."' and Mail_Personal= '".$Mail."'";
    $SqlEmpleado=mysqli_query(conectar(),$consultaEmpleado);
	return $SqlEmpleado;
}
function InsertPasword($Dni,$C1,$Tipo)
{  $Sql="Insert into password(Dni,Password,Tipo) values ('$Dni','$C1','$Tipo')";
   $SqlInsert=mysqli_query(conectar(),$Sql);
    return $SqlInsert;
}
function UpdatePasword($codigo,$Dni){
   $cambio="Update password set Password='$codigo' where Dni='$Dni'";
   $SqlCambio=mysqli_query(conectar(),$cambio);
}
function consultaArea(){
	$consultaArea="Select * from area ORDER BY Nombre_Area ASC";
	$Area=mysqli_query(conectar(),$consultaArea);
	return $Area;
}
function consultaBarrio(){
	$consultaBarrio="Select * from barrio ORDER BY Nombre_Barrio ASC";
	$Barrio=mysqli_query(conectar(),$consultaBarrio);
	return $Barrio;
}
function consultaCiudad(){
	$consultaCiudad="Select * from ciudad ORDER BY Nombre_Ciudad ASC";
	$Ciudad=mysqli_query(conectar(),$consultaCiudad);
	return $Ciudad;
}
function consultaProvincia(){
	$consultaProvincia="Select * from provincia ORDER BY Nombre_Provincia ASC";
	$Provincia=mysqli_query(conectar(),$consultaProvincia);
	return $Provincia;
}
function selectArea($Dni)
{
	$SqlArea="SELECT area.Nombre_Area 
			        FROM personalreclamo 
					INNER JOIN area ON personalreclamo.Area=area.Cod_Area
					WHERE Dni_Personal='$Dni'";
	$SArea=mysqli_fetch_array(mysqli_query(conectar(),$SqlArea));	
	$Area=$SArea['Nombre_Area'];
    return $Area;	
}

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
function printArea()
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
