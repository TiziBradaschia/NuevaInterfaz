
<html lang="es" dir="ltr">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
  <title>Contacto con el administrador</title>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>
 <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>	 
 <section class="login"><center><br>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"> Mensaje enviado <img src="imagenes/L D Q.png" width="150px" height="150px"class="border border-secondary border-1 rounded-circle"></h1> 
<?Php
		 require("includes/ConexionLDQ.php");
		 $idCone=conectar();
		 
		 $Mail=$_POST['mail'];
		 $Dni=$_REQUEST['dni'];
		 $T=$_REQUEST['radio1'];
		 $mensaje=$_REQUEST['Comentario'];
		 if($T==1)
		{
	     $Tipo="Cliente";
		}		
		else {
			 $Tipo="Empleado";
		}
$para = 'tizibradaschia@gmail.com';
$título = 'Solicitud de Alta';
$mensaje = '
<html>
<body>
  <div style="text-alingn:center;background-color:#CCC">
  <h2><center>MAIL DESDE LA WEB</h2>
  <center>
  <h3>El '.$Tipo.' con Dni: '.$Dni.' solicita la apertura de su cuenta.
  <br><p>  Mensaje: '.$mensaje.'.<p>
  <br> Su e-mail de contacto es: '.$Mail.'.</h3>
  </div>
</body>
</html>
';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
echo"<h1>A la brevedad se contactar&aacute el administrador.. &iexclGracias!..</h1>
<br><br><a Href='Index.html'>Retornar</a>";
$enviado=false;
if(mail($para, $título, $mensaje, $cabeceras))
   {
	$enviado=true;
   }
 ?>
	
	</body>
	</html></main>