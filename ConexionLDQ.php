<?php
function conectar()
{
$host="localhost";
$usuario="root";
$clave="";
$BaseDeDato="ldq_bradaschia";

$idCone=mysqli_connect($host,$usuario,$clave,$BaseDeDato);


//Si tengo una base de datos anterior, hago esto	
//$idCone=mysql_connect($host,$usuario,$clave);	
//mysql_select_db($BaseDeDato,$idCone)or die("Error seleccionando en base de datos);
	
return $idCone;	
}
?>