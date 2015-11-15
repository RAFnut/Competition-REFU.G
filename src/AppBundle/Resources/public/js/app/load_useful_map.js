var markers = [];
var map;

function initialize() {
  var pyrmont = new google.maps.LatLng(43.33191364, 21.891987);
  map = new google.maps.Map(document.getElementById('mapOfHelpfulPlaces'), {
    center: pyrmont,
    zoom: 13,
    scrollwheel: true
  });

  var request = {
    location: pyrmont,
    radius: '5000',
    types: ['bank','atm','hospital','police','post_office','mosque'],
    key: 'AIzaSyAg3sEJRooa7jDthmCDXY9RY0EOGSTSVec'
  };

  var service = new google.maps.places.PlacesService(map);

  var infowindow = null;
  infowindow = new google.maps.InfoWindow({
    content: "//TO-DO: Dodaj pravi info"
  });


  service.nearbySearch(request, function(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        var place = results[i];
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location,
          title: place.name,
          icon: 'https://cdn2.iconfinder.com/data/icons/icojoy/noshadow/standart/gif/24x24/001_30.gif'
        });
        markers[i] = marker;
      }
      for (var i = 0; i<markers.length; i++){
        var marker = markers[i];
        google.maps.event.addListener(marker, 'click', function () {
          infowindow.setContent(this.title);
          infowindow.open(map, this);
        });
      }
    }
  });

}
