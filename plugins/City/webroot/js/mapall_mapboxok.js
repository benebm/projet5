$('#collapseMap').on('shown.bs.collapse', function(e){
      map.resize();
 });


mapboxgl.accessToken = 'pk.eyJ1IjoiYmVuZWJtIiwiYSI6ImNqbTBpaTlhZjBhNTAzcWs4OHR3ZnhyOTcifQ.rrN8JyistnzI9931hveh4w';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/benebm/cjmiwxkdiois02sqqtaw5xz5e',
  center: [5.404463, 43.295502],
  zoom: 12.0
 
});

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

map.on('click', function(e) {
  var features = map.queryRenderedFeatures(e.point, {
    layers: ['les-acteurs-de-la-transition-m'] // replace this with the name of the layer
  });

  if (!features.length) {
    return;
  }

  var feature = features[0];

  var popup = new mapboxgl.Popup({ offset: [0, -15] })
    .setLngLat(feature.geometry.coordinates)
    .setHTML('<h3>' + feature.properties.name + '</h3><p>' + feature.properties.description + '</p>')
    .setLngLat(feature.geometry.coordinates)
    .addTo(map);
});