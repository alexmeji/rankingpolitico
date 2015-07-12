var $filtro = 0;
function actualizarTablaMonitoreo()
{
	setTimeout(function(){ $('#actualizar-tabla-monitoreo').load("layouts/tablamonitoreo?filtro="+$filtro); }, 10000);
}

function actualizarTablaAsistencias()
{
	setTimeout(function(){ $('#actualizar-tabla-asistencias').load("layouts/tablaasistencias?filtro="+$filtro); }, 10000);
}


//*** MAPA **/
function limpiarMapa(mapa)
{
	mapa.removeMarkers();
	mapa.refresh();
}

function mostrarSucursales(idpais, mapa)
{
	$.getJSON("ws/mapa/sucursales",{idpais: idpais}, function(data)
	{
		if(data.resultado)
		{
			var icono = "public/images/iconos/sucursales.png";
			$.each(data.registros, function(key, value){
				mapa.addMarker({
					lat: value.latitud,
					lng: value.longitud,
					icon: icono,
					title: value.descripcion,
					animation: google.maps.Animation.DROP,
					infoWindow: {
						content: '<p>'+
								 '<strong>Cliente </strong>'+value.cliente+'<br>'+
								 '<strong>Sucursal </strong>'+value.descripcion+'<br>'+
					  			 '<strong>Direccion </strong>'+value.direccion+'<br>'+
					  			 '</p>',
					  	maxWidth: 300
					}
				});
			});
		}
		else
		{
			$.gritter.add({title:'Espera',text:data.mensaje,class_name:'growl-info'});
		}
	})
	.fail(function()
	{
		console.log( "Error al acceder al Servicio" );
        $.gritter.add({title:'Error',text:"Ocurrio un problema con tu conexión",class_name:'growl-danger'});
	});
}

function mostrarPuestos(idpais, mapa, fecha)
{
	$.getJSON("ws/mapa/puestos",{idpais: idpais, fecha: fecha}, function(data)
	{
		if(data.resultado)
		{
			var icono = "public/images/iconos/puestos-amarillo.png";
			$.each(data.registros, function(key, value){
				mapa.addMarker({
					lat: value.latitud,
					lng: value.longitud,
					icon: icono,
					title: value.puesto,
					animation: google.maps.Animation.DROP,
					infoWindow: {
						content: '<p>'+
								 '<strong>Sucursal </strong>'+value.sucursal+'<br>'+
								 '<strong>Puesto </strong>'+value.puesto+'<br>'+
								 '</p>',
						maxWidth: 300
					}
				});
			});
		}
		else
		{
			$.gritter.add({title:'Espera',text:data.mensaje,class_name:'growl-info'});
		}
	})
	.fail(function()
	{
		console.log("Error al acceder al Servicio");
		$.gritter.add({title:'Error',text:'Ocurrio un problema con tu conexión',class_name:'growl-danger'});
	});
}
function mostrarAsignaciones(idpais, mapa, fecha)
{
	$.getJSON("ws/mapa/asignaciones",{idpais: idpais, fecha: fecha}, function(data)
	{
		if(data.resultado)
		{
			var icono = "public/images/iconos/asignaciones-anaranjado.png";
			$.each(data.registros, function(key, value){
			if(value.latitudinicio == null)
			{
				mapa.addMarker({
					lat: value.latitud,
					lng: value.longitud,
					icon: icono,
					title: value.puesto,
					animation: google.maps.Animation.DROP,
					infoWindow: {
						content: '<div class="table-responsive">'+
								 '<table class="table mb30">'+
							 	 '<thead>'+
							 	 	'<tr>'+
							 	 		'<th>Puesto</th>'+
							 	 		'<th>Agente</th>'+
							 	 		'<th>F. Inicio</th>'+
							 	 		'<th>M. Inicio</th>'+
							 	 		'<th>Estado Inicio</th>'+
							 	 		'<th>F. Fin</th>'+
							 	 		'<th>M. Fin</th>'+
							 	 		'<th>Estado Fin</th>'+
							 	 	'</tr>'+
							 	 '</thead>'+
							 	 '<tbody>'+
							 	 	'<tr>'+
							 	 		'<td>'+value.puesto+'</td>'+
							 	 		'<td>'+value.agente+'</td>'+
							 	 		'<td>'+value.fechahorainicio+'</td>'+
							 	 		'<td>'+value.marcajeinicio+'</td>'+
							 	 		'<td>'+value.estadoinicio+'</td>'+
							 	 		'<td>'+value.fechahorafin+'</td>'+
							 	 		'<td>'+value.marcajefin+'</td>'+
							 	 		'<td>'+value.estadofin+'</td>'+
							 	 	'</tr>'+
							 	 '</tbody>'+
								 '</table>'+
								 '</div>'
					}
				});
			}
			else
			{
				mapa.addMarker({
					lat: value.latitudinicio,
					lng: value.longitudinicio,
					icon: icono,
					title: value.puesto,
					animation: google.maps.Animation.DROP,
					infoWindow: {
						content: '<div class="table-responsive">'+
								 '<table class="table mb30">'+
							 	 '<thead>'+
							 	 	'<tr>'+
							 	 		'<th>Puesto</th>'+
							 	 		'<th>Agente</th>'+
							 	 		'<th>F. Inicio</th>'+
							 	 		'<th>M. Inicio</th>'+
							 	 		'<th>Estado Inicio</th>'+
							 	 		'<th>F. Fin</th>'+
							 	 		'<th>M. Fin</th>'+
							 	 		'<th>Estado Fin</th>'+
							 	 	'</tr>'+
							 	 '</thead>'+
							 	 '<tbody>'+
							 	 	'<tr>'+
							 	 		'<td>'+value.puesto+'</td>'+
							 	 		'<td>'+value.agente+'</td>'+
							 	 		'<td>'+value.fechahorainicio+'</td>'+
							 	 		'<td>'+value.marcajeinicio+'</td>'+
							 	 		'<td>'+value.estadoinicio+'</td>'+
							 	 		'<td>'+value.fechahorafin+'</td>'+
							 	 		'<td>'+value.marcajefin+'</td>'+
							 	 		'<td>'+value.estadofin+'</td>'+
							 	 	'</tr>'+
							 	 '</tbody>'+
								 '</table>'+
								 '</div>'
					}
				});
			}
			});
		}
		else
		{
			$.gritter.add({title:'Espera',text:data.mensaje,class_name:'growl-info'});
		}
	})
	.fail(function()
	{
		console.log("Error al acceder al Servicio");
		$.gritter.add({title:'Error',text:'Ocurrio un problema con tu conexión',class_name:'growl-danger'});
	});
}