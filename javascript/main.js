var map;
function initMap() {
  var url = { lat: 43.318749, lng: 21.893399 };
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: url,
    gestureHandling: "greedy",
    styles: styles
  });

  /* if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
    */
  console.log("test !!!");
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  alert("Browser doesn't support Geolocation");
}
