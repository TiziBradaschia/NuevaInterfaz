<?php
	require("/includes/ConexionLDQ.php");
		    $idCone=conectar();
			$sql="SELECT * from gruporeclamos";
	
    $registros=mysqli_query($idCone,$sql) or die ("Error en el select SqlArea");
	while($Fila=mysqli_fetch_array($registros))
		  			 {  $Area[]=$Fila['Nombre_Area'];
						$Ab[]=$Fila['Abiertos'];
						$So[]=$Fila['Solucionados'];
						$Ca[]=$Fila['Cancelados'];
					 }


	$datosArea=json_encode($Area);
	$datosAb=json_encode($Ab);
	$datosSo=json_encode($So);
    $datosCa=json_encode($Ca);
 ?>
<div id="graficaBarra"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosArea=crearCadenaBarras('<?php echo $datosArea ?>');
	datosAb=crearCadenaBarras('<?php echo $datosAb ?>');
	datosSo=crearCadenaBarras('<?php echo $datosSo ?>');
	datosCa=crearCadenaBarras('<?php echo $datosCa ?>');
    //configuramos los datos del grafico// 
	var A=
		{
			x: datosArea,
			y: datosAb,
		    name: "Abiertos",	
			type: 'bar',//lines,histogram,
			//orientation: 'h',..si quisieramos hacer barras horizontales
			marker: {
                color: 'blue',line: { //color relleno
                       width: 1.5,//ancho linea
					   dash:'solid',
					   color:'blue',//color borde line
                       },
					 },
		};
		var S=	
		{
			x: datosArea,
			y: datosSo,
			name: "Solucionados",	
			type: 'bar',//lines,bar,
			  
			marker: {
                color: '#5b1889',line: { //color relleno
                       width: 1.5,//ancho linea
					   dash:'solid',
					   color:'#5b1889',//color borde line
                       },
		            },
		};
			var C=	
		{
			x: datosArea,
			y: datosCa,
			name: "Cancelados",	
			type: 'bar',//lines,bar,
			
			marker: {
                color: 'grey',line: { //color relleno
                       width: 1.5,//ancho linea
					   dash:'solid',
					   color:'grey',//color borde line
                       },
		            },
		};
	
	var data = [A,S,C];
	
	//configuramos el título//
	var layout = { 
	             bargap: 0.05, 
                 bargroupgap: 0.2, 
                title: 'RECLAMOS POR ÁREA',
				font: {size: 14, color:'#5b1889'},
				
				xaxis: {title: "Area",size:10}, 
				yaxis: {title: "Cantidad de casos",font:10},
				//barmode: 'stack', acumulado para arriba
				};
    //lo hacemos responsivo// 
	var config = {responsive: true,
	              //displayModeBar: false,fija la barra de navegacion de plotly
				  toImageButtonOptions: {
    format: 'svg', // one of png, svg, jpeg, webp
    filename: 'Casos_por_area',
    height: 500,
    width: 700,
    scale: 1, // Multiply title/legend/axis/canvas sizes by this factor
  },};
    
	Plotly.newPlot('graficaBarra',data,layout,config);


</script>


