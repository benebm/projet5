

mapboxgl.accessToken = 'pk.eyJ1IjoiYmVuZWJtIiwiYSI6ImNqbTBpaTlhZjBhNTAzcWs4OHR3ZnhyOTcifQ.rrN8JyistnzI9931hveh4w';

// initialisation 
var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v9',
	center: [5.404463, 43.295502],
 	zoom: 12.0
});

// ajout des boutons de zoom
//map.addControl(new mapboxgl.NavigationControl());

var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-left');


// détecte les dimensions de la map à l'affichage et resizing
$('#map').show();
map.resize();

// ajout des marqueurs à la carte
spot_json.features.forEach(function(marker) {

  //crée un élément html pour chaque
  var el = document.createElement('div');
  el.className = 'marker';
  el.id = 'marker' + marker.properties.category ;

  //crée le marqueur et l'ajoute à la map
  var marker = new mapboxgl.Marker(el)
    .setLngLat(marker.geometry.coordinates)
    .setPopup(new mapboxgl.Popup({ 
  		  offset: 25,
  		  anchor: 'right', 
  		  }) 
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
	  '</div>')						
    ) 
    .addTo(map);

    getCategory();

    function getCategory() {
    var buttons = document.querySelectorAll('.cat');
          for (var i = 0; i < buttons.length; i++) {
            buttons[i].onclick = function getcatid () {
              var catid = this.getAttribute('data-index');
              console.log(catid); 
            };        
          }  
    }

    //function hideAllMarkers() {
      //          marker.remove();
        //      }
    
    


//document.getElementById('map_filter').addEventListener('click', function(e) {
    
  //  getCategory();
    
    //hideAllMarkers();
    
//    animateMarker();
//});

});

//centre la carte sur le clic
map.on('click', function (e) {
        var clicked = e.lngLat;
        map.flyTo({center: clicked});
});


