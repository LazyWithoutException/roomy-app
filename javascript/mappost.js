var markers = [];
function initMap() {
  var url = { lat: 43.318749, lng: 21.893399 };
  mappost = new google.maps.Map(document.getElementById("mappost"), {
    zoom: 15,
    center: url,
    gestureHandling: "greedy",
    styles: styles
  });

<<<<<<< HEAD
  mappost.addListener("click", function(event) {
=======
  mappost.addListener("click", function (event) {
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
    addMarker(event.latLng);
  });

  addMarker(url);
}

function addMarker(url) {
  var m = markers.pop();
  if (m != undefined || m != null) {
    m.setMap(null);
  }
  var marker = new google.maps.Marker({
    position: url,
    map: mappost
  });
  markers.push(marker);
}
