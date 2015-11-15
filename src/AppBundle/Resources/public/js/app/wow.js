var markers = [];
var map;

function initialize() {

  var pyrmont = new google.maps.LatLng(LatituteLast, LongituteLast);
  map = new google.maps.Map(document.getElementById('mapOfWow'), {
    center: pyrmont,
    zoom: 13,
    scrollwheel: true
  });


  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });
  markers[i] = marker;



}
