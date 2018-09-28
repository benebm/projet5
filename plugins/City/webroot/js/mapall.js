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
  .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
  .addTo(map);
});





/*map.on('load', function() {
  var url = 'js/mydata.geojson'; (chemin vers url)
  map.addSource('sourcetransition', { type: 'geojson', data: url});
});
*/




