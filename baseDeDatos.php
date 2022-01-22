<?php

///////////////////////////////CONSULTAS////////////////////////// //

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
function consultaAreaEmpleado($Dni){
	$consultaEmpleado="Select Nombre_Area from empleado where Dni_Personal='$Dni'";
    $SqlEmpleado=mysqli_query(conectar(),$consultaEmpleado);
	$Area=mysqli_fetch_array($SqlEmpleado);
    $A=$Area['Nombre_Area'];
	return $A;
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
 function consultaCierreReclamoR($Cod_Reclamo){
 $consultaReclamo="Select * from cierrereclamo where Cod_Reclamo='$Cod_Reclamo'";
 $CRecla=mysqli_query(conectar(),$consultaReclamo);
 return $CRecla;
 }


////////////////////////////////////CONSULTAS VISTAS//////////////////////////////////////
function ConsultaVistaReclamos()
{
	$consultaReclamo="SELECT *from  vistareclamos ORDER BY Codigo DESC";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}

function ConsultaVistaReclamosD($Dni)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' ORDER BY Codigo DESC";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}

function ConsultaVistaReclamosA($Area)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Area='$Area' ORDER BY Codigo ASC";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosAER($Area,$Estado,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Area='$Area' AND Estado='$Estado' AND Codigo='$Reclamo'";
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
function ConsultaVistaReclamosAE($Area,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE  Area='$Area' AND Estado='$Estado'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDAE($Dni,$Area,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Area='$Area' AND Estado='$Estado'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosAR($Area,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Area='$Area' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosDAR($Dni,$Area,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni'AND Area='$Area' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
//function ConsultaVistaReclamosR($Reclamo)
//{
	//$consultaReclamo="SELECT *from  vistareclamos WHERE Codigo='$Reclamo'";
	//$CRecla=mysqli_query(conectar(),$consultaReclamo);
   // return $CRecla;
	
//}
function ConsultaVistaReclamosDR($Dni,$Reclamo)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosRE($Reclamo,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Estado='$Estado' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}

function ConsultaVistaReclamosDRE($Dni,$Reclamo,$Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Dni='$Dni' AND Estado='$Estado' AND Codigo='$Reclamo'";
	$CRecla=mysqli_query(conectar(),$consultaReclamo);
    return $CRecla;
	
}
function ConsultaVistaReclamosE($Estado)
{
	$consultaReclamo="SELECT *from  vistareclamos WHERE Estado='$Estado'";
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
function ConsultaVistaSeguimientoT(){
	$SqlSegui ="SELECT * FROM segui ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoAET($Area,$Estado,$Tipo){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Area='$Area' AND Nombre_Estado='$Estado' AND Nombre_Tipo='$Tipo'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoAE($Area,$Estado){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Area='$Area' AND Nombre_Estado='$Estado'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoAT($Area,$Tipo){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Area='$Area' AND Nombre_Tipo='$Tipo'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoTi($Tipo){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Tipo='$Tipo'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoET($Estado,$Tipo){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Estado='$Estado' AND Nombre_Tipo='$Tipo'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoE($Estado){
	$SqlSegui ="SELECT * FROM segui 
						WHERE Nombre_Estado='$Estado'
						ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimiento($Area){
	$SqlSegui ="SELECT * FROM segui WHERE Nombre_Area='$Area' ORDER BY Nombre_Estado DESC ,Cod_Seguimiento ";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoR($Reclamo){
	$SqlSegui ="SELECT * FROM segui WHERE Reclamo='$Reclamo'";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}
function ConsultaVistaSeguimientoC($Codigo){
	$SqlSegui ="SELECT * FROM segui WHERE Cod_Seguimiento='$Codigo'";
	$Segui=mysqli_query(conectar(),$SqlSegui) or die ("Error en el select SqlSegui");
    return $Segui;
}

 function ConsultaVistaReclamoConCliente($Codigo){
 	$SqlRecla ="SELECT * FROM vistareclamoconcliente WHERE Cod_Reclamo='$Codigo'";
	$Recla=mysqli_query(conectar(),$SqlRecla) or die ("Error en el select SqlRecla");
    return $Recla;
 }
 

// //////////////////////////CONSULTAS MAXIMOS "AltaReclamoBase.php"///////////////////////////////
function ConsultaMaxDetalle(){
$SqlDetalle="SELECT MAX(Cod_Detalle) FROM detallereclamo";
$Det=mysqli_query(conectar(),$SqlDetalle);
Return $Det;
}
function ConsultaMaxSeguimiento(){
$SqlSeguimiento="SELECT MAX(Cod_Seguimiento) FROM seguimiento";
$Segui=mysqli_query(conectar(),$SqlSeguimiento);
Return $Segui;
}
function ConsultaMaxReclamo(){ 
         $SqlRecla="SELECT MAX(Cod_Reclamo) FROM reclamo";
		 $Re=mysqli_query(conectar(),$SqlRecla);
		 return $Re;
}

/////////////////////////////////CONSULTAS COMBOS////////////////// /////////////////////////////

function consultaEstadoReclamo(){
	$consultaEstado="Select * from estadoreclamo ORDER BY Nombre_Estado ASC";
	$Estado=mysqli_query(conectar(),$consultaEstado);
	return $Estado;
}
function consultaEstadoSeguimiento(){
	$consultaEstado="Select * from estadoseguimiento ORDER BY Nombre_Estado ASC";
	$Estado=mysqli_query(conectar(),$consultaEstado);
	return $Estado;
}
function consultaCodigoEstadoSeguimiento($NombreEstado){
	$consultaEstado="Select Cod_Estado from estadoseguimiento WHERE Nombre_Estado='$NombreEstado'";
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
function consultaCodArea($Nombre_Area){
	$consultaArea="Select Cod_Area from area WHERE Nombre_Area='$Nombre_Area'";
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
function consultaServicio(){
	$consultaServ="Select * from servicio ORDER BY Descripcion_Servicio ASC";
	$Cservicio=mysqli_query(conectar(),$consultaServ)or die ("Error base Servicio");
	return $Cservicio;
}
function consultaProblema(){
	$consultaProblema="Select * from problema ORDER BY Descripcion_Problema ASC";
	$Cproblema=mysqli_query(conectar(),$consultaProblema)or die ("Error base Problema");
	return $Cproblema;
	
}
function consultaTipoSeguimiento(){
	$consultaTipo="Select * from tiposeguimiento ORDER BY Nombre_Tipo ASC";
	$CTipo=mysqli_query(conectar(),$consultaTipo)or die ("Error base Tipo");
	return $CTipo;
	
}
function consultaCodigoTipoSeguimiento($NombreTipo){
	$consultaTipo="Select Cod_Tipo from tiposeguimiento WHERE Nombre_Tipo='$NombreTipo'";
	$CTipo=mysqli_query(conectar(),$consultaTipo)or die ("Error base Tipo");
	return $CTipo;
	
}
////////////////////////////// INSERT//////////////////////////////////

function InsertPasword($Dni,$C1,$Tipo)
{  $Sql="Insert into password(Dni,Password,Tipo) values ('$Dni','$C1','$Tipo')";
   $SqlInsert=mysqli_query(conectar(),$Sql);
   return $SqlInsert;
}
function InsertDetalleReclamo($Descripcion,$Problema,$Fecha){
	$SqlDetalleReclamo="INSERT INTO detallereclamo         	    		        (Descripcion_Reclamo,Estado_Reclamo,Problema,Fecha_Cambio_Estado)
	VALUES('$Descripcion','A','$Problema','$Fecha')";
	$Detalle=mysqli_query(conectar(),$SqlDetalleReclamo)or die("Error en insert Detalle reclamo");
	return $Detalle;	
}
function InsertSeguimientoReclamo($Area,$Fecha){
	$SqlSeguimiento="Insert into seguimiento(Area_Seguimiento,Fecha_Alta,Estado_Seguimiento,Tipo_Seguimiento,Cod_Anterior)values('$Area','$Fecha','P','4','0')";
	$Segui=mysqli_query(conectar(),$SqlSeguimiento)or die("Error en insert Seguimiento");
	return $Segui;
}
function InsertSeguimientoNuevo($Area,$Estado,$Tipo,$Reclamo,$Descripcion,$Codigo,$ES)
{
	$date= getdate();
    $hoy=$date['year']."/".$date['mon']."/".$date['mday'];
	$SqlSegui="Insert INTO seguimiento (Area_Seguimiento,Estado_Seguimiento,Fecha_Alta,Tipo_Seguimiento,Reclamo,Descripcion,Cod_Anterior,Estado)values('$Area','$Estado','$hoy','$Tipo','$Reclamo','$Descripcion','$Codigo',$ES)";
	$Segui=mysqli_query(conectar(),$SqlSegui)or die ("Error en SqlSegui");
	return $Segui;
}			
			
function InsertReclamo($Dni,$Area,$Fecha,$Detalle,$Seguimiento){
	$SqlReclamo="Insert into reclamo (Cliente,Area_Reclamo,Fecha_Alta,Detalle_Reclamo,Seguimiento_Actual)values('$Dni','$Area','$Fecha','$Detalle','$Seguimiento')";
	$Reclamo=mysqli_query(conectar(),$SqlReclamo)or die("Error en insert reclamo");
	return $Reclamo;
}
function InsertCierreReclamo($CodReclamo,$Dni_Personal,$DescripcionCierre){
$SqlM="Insert INTO cierrereclamo (Cod_Reclamo,Dni_Personal,Descripcion)values('$CodReclamo','$Dni_Personal','$DescripcionCierre')";
$registro=mysqli_query(conectar(),$SqlM)or die ("Error en SqlM");
return $registro;

}



//////////////////////////////////////// UPDATE /////////////////////////

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
		    SET Estado_Seguimiento='C', Estado='1', Fecha_Cambio_Estado='$hoy'
			WHERE Cod_Seguimiento ='$Seguimiento'";
$updateSegui= mysqli_query(conectar(),$SqlSegui)or die ("Error en Update Seguimiento");
return $updateSegui;
}
function updateSeguimientoReclamo($Seguimiento,$Recla)
{
 $SqlSeguimiento="UPDATE seguimiento 
			            SET Reclamo='$Recla' 
						WHERE Cod_Seguimiento='$Seguimiento'";
		 
$Segui=mysqli_query(conectar(),$SqlSeguimiento)or die("Error en UPDATE Seguimiento2");
return $Segui;
}
function updateSeguimientoDescripcion($Descripcion,$Codigo){
	$SqlDescripcion="UPDATE seguimiento
     SET Descripcion='$Descripcion'
	WHERE Cod_Seguimiento ='$Codigo' ";
	$Descripcion=mysqli_query($idCone,$SqlDescripcion)or die ("Error en SqlDescripcion");
	return $Descripcion;
	
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
function updateDetalleReclamo($ES,$Estado,$DetalleRe){
$SqlDetReclamo="UPDATE detallereclamo
              	SET Estado='$ES',Estado_Reclamo='$Estado'
				WHERE Cod_Detalle='$DetalleRe' ";
						   
$Detalle=mysqli_query(conectar(),$SqlDetReclamo)or die ("Error en SqlDetReclamo");
return $Detalle;
}


function updateReclamo($CodigoDetalle){
$SqlReclamo="UPDATE reclamo
               SET Estado='1'
			WHERE Detalle_Reclamo='$CodigoDetalle'";
$updateReclamo=mysqli_query(conectar(),$SqlReclamo)or die ("Error en SqlUpdate  Reclamo");
return $updateReclamo;
}
function updateReclamoSegui($Segui,$ES,$Area,$Reclamo)
{
$SqlReclamo="UPDATE reclamo
               SET Seguimiento_Actual='$Segui',Estado='$ES',Area_Reclamo='$Area'
				WHERE Cod_Reclamo ='$Reclamo'";
$Reclamo=mysqli_query(conectar(),$SqlReclamo)or die ("Error en SqlReclamo");
return $Reclamo;
}










	


?>
