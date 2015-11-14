var pinStringContainer = $(".geo-location-current-pin-string");

function getLocationFromUser() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else {
        pinStringContainer.append("Geolocation is not supported by this browser.");
    }
}

function decodeLocationArray(results){
  city = "";
  country = "";
  for (var i=0; i<results.results[0].address_components.length; i++) {
    for (var b=0;b<results.results[0].address_components[i].types.length;b++) {
      if (results.results[0].address_components[i].types[b] == "locality") {
        if (city == "")
          city= results.results[0].address_components[i].long_name;
      }
      if (results.results[0].address_components[i].types[b] == "country") {
        if (country == "")
          country = results.results[0].address_components[i].long_name;

      }
      if (city != "" && country != ""){
        return city+", "+country;
        break;
      }
    }
  }
  return city+", "+country;
}

function reverseLookUpByCoords(results){
  console.log(decodeLocationArray(results));
}

function showPosition(position) {
    pinStringContainer.append("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
    var reverseLookUp = "http://maps.googleapis.com/maps/api/geocode/json?latlng=";
    reverseLookUp += position.coords.latitude+","+position.coords.longitude;
    _R.sendGET(reverseLookUp, reverseLookUpByCoords, _R.log);
}
