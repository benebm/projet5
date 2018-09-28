$('#collapseMap').on('shown.bs.collapse', function(e){
      map.resize();
 });

mapboxgl.accessToken = 'pk.eyJ1IjoiYmVuZWJtIiwiYSI6ImNqbTBpaTlhZjBhNTAzcWs4OHR3ZnhyOTcifQ.rrN8JyistnzI9931hveh4w';

var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v9',
	center: [5.404463, 43.295502],
 	zoom: 12.0
});

map.addControl(new mapboxgl.NavigationControl());

// add markers to map
spot_json.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';
  el.id = 'marker' + marker.properties.category ;

  // make a marker for each feature and add to the map
new mapboxgl.Marker(el)
  .setLngLat(marker.geometry.coordinates)
  .setPopup(new mapboxgl.Popup({ 
  		offset: 25,
  		anchor: 'top', 
  		 }) // add popups
  .setHTML(
  	'<div class="marker_info" id="marker_info">' +
  	marker.properties.image + 
  	'<h3>' + marker.properties.title + '</h3>' + 
  	'<span>' + marker.properties.description + '</span>'+
  	'<div class="marker_tools">' +
	'<form action="http://maps.google.com/maps" method="get" target="_blank"><input type="hidden" name="daddr" value="'+ marker.geometry.coordinates[1] +',' +marker.geometry.coordinates[0] +'"><button type="submit" class="btn_infobox_get_directions">Itinéraire</button></form>' +
	'<a href="tel://'+ marker.properties.phone +'" class="btn_infobox_phone">'+ marker.properties.phone +'</a>' +
	'</div>' +
	marker.properties.details + 
	'</div>'
  	)						
  )
  .addTo(map);

} // end foreach
);