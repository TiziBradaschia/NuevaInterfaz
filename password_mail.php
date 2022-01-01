<?php
function clave_mail($Mail,$codigo)
{
// Varios destinatarios
$para=$Mail; // atención a la coma
//$para = 'tizibradaschia@gmail.com';
$codigo=$codigo;
// título
$título = 'Recuperación de contraseña';
//$codigo=rand(1000,9999);
// mensaje
$mensaje = '
<html>

<body>
  <div style="text-alingn:center;background-color:#CCC">
  <h1><center>LIBRO DE QUEJAS</h1>
  <center>
  <img src="http://localhost/Proyectos/LDQ/cambios/imagenes/ldqcompleto.jpg"  width="300" height="300"></img>
 
  
  <h2>Su codigo para restablecer es: '.$codigo.' </h2>
  
  <a href="http://localhost/Proyectos/LDQ_TizianaBradaschia/IngresoUsuario.html">Ingrese aqui para loguearse</a>
  <p><small><text-alingn:right>Si usted no solicito el mensaje, omitalo</small></p>
  </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/* Cabeceras adicionales
$cabeceras .= 'To: Tizi <tizibradaschia@gmail.com>, Martin<martin_garcia_21@hotmail.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
 //Enviarlo
$enviado=false;
if(mail($para, $título, $mensaje, $cabeceras))
   {
	$enviado=true;
   }
}
?>