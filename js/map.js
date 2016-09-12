window.addEventListener("load", initialize, false);

function initialize() {

    var bounds = new google.maps.LatLngBounds();
    var map = new google.maps.Map(document.getElementById("map"), {
		mapTypeControl:false,
		center: (46.790686,-71.270957)
	});

        
    var markers = [
        ['Café de La Baratte', 46.790686,-71.270957],
        ['Comptoir Croissance', 46.815338,-71.230787],
        ['Comptoir Claude-Allard', 46.774926,-71.318850],
        ['Comptoir Basse Ville', 46.811537,-71.237155],
        ['Comptoir Montcalm', 46.802738,-71.229084],
        ["Comptoir L'Accorderie", 46.813060,-71.229349]
    ];
                        
    var infoWindowContent = [
        ['<div class="marqueur">'+
      	'<h3>Café de La Baratte</h3>'+
      	'<p>2120, rue Boivin, Québec, Qc, G1V 1N7' + '<br>' +
      	'Tél: (418) 527-1173' + '<br>' +
		'Téléc.: (418) 527-9492' + '<br>' +
		'Courriel: infos@labaratte.ca</p>'+
      	'</div>'],
      	['<div class="marqueur">'+
      	'<h3>Comptoir Croissance</h3>'+
      	'<p>215, rue Caron, Québec</p>'+
      	'</div>'],
      	['<div class="marqueur">'+
      	'<h3>Comptoir Claude-Allard</h3>'+
      	'<p>3200, avenue d’Amours, Québec</p>'+
      	'</div>'],
      	['<div class="marqueur">'+
      	'<h3>Comptoir Basse Ville</h3>'+
      	'<p>301, rue de Carillon, Québec</p>'+
      	'</div>'],
      	['<div class="marqueur">'+
      	'<h3>Comptoir Montcalm</h3>'+
      	'<p>265, boul. René-Lévesque, Québec</p>'+
      	'</div>'],
      	['<div class="marqueur">'+
      	"<h3>Comptoir L'Accorderie</h3>"+
      	'<p>151A, rue Saint-François Est, Québec</p>'+
      	'</div>']
      ];
        
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);

        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
          
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));


    }

    map.fitBounds(bounds);
}