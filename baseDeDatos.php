<?php

// Consultas //

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


function consultaReclamo($Dni)
{ 
 $consultaReclamo="Select Cod_Reclamo from reclamo where Cliente='$Dni' ORDER BY Cod_Reclamo ASC";
 $CRecla=mysqli_query(conectar(),$consultaReclamo);
 return $CRecla;
}



function ConsultaVistaReclamosD($Dni)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' ORDER BY Codigo DESC";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDAER($Dni,$Area,$Estado,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' Area='$Area' AND Estado='$Estado' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDA($Dni,$Area)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Area='$Area'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDAE($Dni,$Area,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Area='$Area' AND Estado='$Estado'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}

function ConsultaVistaReclamosDAR($Dni,$Area,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni'AND Area='$Area' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDR($Dni,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}

function ConsultaVistaReclamosDRE($Dni,$Reclamo,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Estado='$Estado' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDE($Dni,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Estado='$Estado'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosC($Codigo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Codigo='$Codigo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
//Consultas Combos //

function consultaEstadoReclamo(){
	$consultaEstado="Select * from estadoreclamo ORDER BY Nombre_Estado ASC";
	$Estado=mysqli_query(conectar(),$consultaEstado);
	return $Estado;
}
function consultaEstado()
{
	$consultaEst="Select * from estadoreclamo ORDER BY Nombre_Estado ASC";
	$CEst=mysqli_query(conectar(),$consultaEst);
	return $CEst;
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



// Insert //

function InsertPasword($Dni,$C1,$Tipo)
{  $Sql="Insert into password(Dni,Password,Tipo) values ('$Dni','$C1','$Tipo')";
   $SqlInsert=mysqli_query(conectar(),$Sql);
    return $SqlInsert;
}

// Update  //
function UpdatePasword($codigo,$Dni){
   $cambio="Update password set Password='$codigo' where Dni='$Dni'";
   $SqlCambio=mysqli_query(conectar(),$cambio);
}


function updateDatosEmpleado($Dni,$Nombre,$Mail,$Area)
{
$SqlEmpleado="UPDATE personalreclamo 
			 SET Nombre_Personal='$Nombre',Mail_Personal='$Mail',Area='$Area'
			 WHERE Dni_Personal ='$Dni'";
$updateEmpleado=mysqli_query(conectar(),$SqlEmpleado);	
return $updateEmpleado;
}
function updateDatosCliente($Dni,$Nombre,$Mail,$Tel,$Dir,$Barrio)
{
$SqlCliente="UPDATE clienteexterno
			 SET Nombre_Cliente='$Nombre',Mail_Cliente='$Mail',Tel_Cliente='$Tel',Dir_Cliente='$Dir' , Barrio_Cliente='Barrio'
			 WHERE Dni_Cliente ='$Dni'";
$updateCliente=mysqli_query(conectar(),$SqlCliente);	
return $updateCliente;
}

function updateClave($Dni,$Clave)
{
$SqlClave="UPDATE password
			SET Password='$Clave'
			WHERE Dni ='$Dni'";
$updateClave=mysqli_query(conectar(),$SqlClave);	
return $updateClave;
}
function updateSeguimiento($Seguimiento)
{
$date= getdate();
$hoy=$date['year']."/".$date['mon']."/".$date['mday'];
$SqlSegui="UPDATE seguimiento 
		    SET Estado_Seguimiento='C', Estado='1', Fecha_Cambio_Estado='$hoy', Estado='1'
			WHERE Cod_Seguimiento ='$Seguimiento'";
$updateSegui= mysqli_query(conectar(),$SqlSegui)or die ("Error en Update Seguimiento");
return $updateSegui;
}

function updateDetalle($DescripcionActual,$CodigoDetalle,$Estado){
$date= getdate();
$hoy=$date['year']."/".$date['mon']."/".$date['mday'];
$SqlDetalle="UPDATE detallereclamo
              SET Descripcion_Reclamo='$DescripcionActual',Estado_Reclamo='$Estado',Fecha_Cambio_Estado='$hoy', Estado='1'
			 WHERE Cod_Detalle ='$CodigoDetalle' ";
$updateDetalle=mysqli_query(conectar(),$SqlDetalle)or die ("Error en SqlUpdate Detalle Reclamo");
return 	$updateDetalle;		 

}

function updateReclamo($CodigoDetalle){
$SqlReclamo="UPDATE reclamo
               SET Estado='1'
			WHERE Detalle_Reclamo='$CodigoDetalle'";
$updateReclamo=mysqli_query(conectar(),$SqlReclamo)or die ("Error en SqlUpdate  Reclamo");
return $updateReclamo;
}










	


?>
