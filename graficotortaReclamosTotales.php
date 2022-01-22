<?php
	require("/includes/ConexionLDQ.php");
		    $idCone=conectar();
			$sql="SELECT Nombre_Area,Total from gruporeclamos";
	
    $registros=mysqli_query($idCone,$sql) or die ("Error en el select SqlArea");
	while($Fila=mysqli_fetch_array($registros))
		  			 {  $Area[]=$Fila['Nombre_Area'];
						$To[]=$Fila['Total'];
					}


	$datosArea=json_encode($Area);
	$datosTo=json_encode($To);
	
 ?>
<div id="graficaTorta"></div>

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
	datosTo=crearCadenaBarras('<?php echo $datosTo ?>');
	
    //configuramos los datos del grafico// 
	var A= 
		{  
			labels: datosArea,
			values:datosTo,
			
		    name: "Abiertos",	
			type: 'pie',//lines,histogram,
			//orientation: 'h',..si quisieramos hacer barras horizontales
			marker: {
                color: 'blue',
				line: { //color relleno
                       width: 0.5,//ancho linea
					   dash:'solid',
					   color:'black',//color borde line
                       },
					},
            automargin: true,
			 textinfo: "percent",//"label+percent" si queremos que ademas muestre la etiqueta
            // insidetextorientation: "radial", si queremeos que siga con la orientacion del grafico
		}
		
		;
	


	var data = [A];
	
	//configuramos el título//
	var layout = { 
	             bargap: 0.05, 
				bargroupgap: 0.2, 
				title: 'RECLAMOS TOTALES POR ÁREA',
				font: {size: 14, color:'#5b1889'},
				};
    //lo hacemos responsivo// 
	var config = {responsive: true,
	              
				  toImageButtonOptions: {
    format: 'svg', // one of png, svg, jpeg, webp
    filename: 'Casos_por_area',
    height: 500,
    width: 700,
    scale: 1, // Multiply title/legend/axis/canvas sizes by this factor
  },};
    
	Plotly.newPlot('graficaTorta',data,layout,config);
	

</script>
