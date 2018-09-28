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

  // make a marker for each feature and add to the map
new mapboxgl.Marker(el)
  .setLngLat(marker.geometry.coordinates)
  .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
  .setHTML(
  	'<div class="marker_info" id="marker_info">' +
  	'<img src="' + marker.properties.image + '" alt="Image"/>' +
  	'<h3>' + marker.properties.title + '</h3>' + 
  	'<span>' + marker.properties.description + '</span>'+
  	'<div class="marker_tools">' +
  	// formulaire google maps voir si possible adaptation
	/*'<form action="http://maps.google.com/maps" method="get" target="_blank" style="display:inline-block""><input name="saddr" value="'+ item.get_directions_start_address +'" type="hidden"><input type="hidden" name="daddr" value="'+ item.location_latitude +',' +item.location_longitude +'"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Directions</button></form>' +*/
	'<a href="tel://'+ marker.properties.phone +'" class="btn_infobox_phone">'+ marker.properties.phone +'</a>' +
	'</div>' +
	'<a href="'+ marker.properties.details + '" class="btn_infobox">Details</a>' +
	'</div>'
	//paramétrage google maps à adapter notamment l'image de close X
	/*disableAutoPan: false,
	maxWidth: 0,
	pixelOffset: new google.maps.Size(10, 125),
	closeBoxMargin: '5px -20px 2px 2px',
	closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
	isHidden: false,
	alignBottom: true,
	pane: 'floatPane',
	enableEventPropagation: true*/
  	
  	)						
  )
  .addTo(map);
});





/*map.on('load', function() {
  var url = 'js/mydata.geojson'; (chemin vers url)
  map.addSource('sourcetransition', { type: 'geojson', data: url});
});
*/




