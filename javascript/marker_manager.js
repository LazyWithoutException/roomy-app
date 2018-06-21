var markeri = [];
var marker;
function createMarker(id, tip, url) {
  if (tip == "stan") {
    var image = "img/stan64.png";
  } else {
    var image = "img/stan64.png";
  }
  var marker = new google.maps.Marker({
    position: url,
    icon: image,
    id: id,
    tip: tip
  });
  marker.addListener("click", data => {
    var id = marker["id"];
    var tip = marker["tip"];
    console.log(id, tip);
    getMarkers("vratiPodatke.php?id=" + id + "&tip=" + tip)
      .then(data => {
        console.log(data);
        var obj = JSON.parse(data);
        console.log(obj);
        openNav(obj);
      });
  });
  obj = {
    id: id,
    marker: marker
  };
  markeri.push(obj);
}

/////////////////////////// crta markere na ma
function populateMap() {
  markeri.forEach(element => {
    element.marker.setMap(map);
  });
}
////////////////////////////
function getMarkers(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
  });
}



getMarkers("vratimarkere.php?marker=true")
  .then(data => {
    var x = JSON.parse(data);
    console.log(x)
    x.forEach(data => {
      createMarker(data.id, data.tip_oglasa, {
        lat: parseFloat(data.latituda),
        lng: parseFloat(data.longituda)
      });
    });
    populateMap();
  })

function waitForMarkers() {
  console.log("ajax")
  $.ajax({
    type: "GET",
    url: "vratimarkere.php?marker=true",
    async: true,
    cache: false,
    timeout: 5000,
    success: function (data) {
      var x = JSON.parse(data);
      console.log(x)
      x.forEach(data => {
        console.log(data.id, data.tip_oglasa)
        createMarker(data.id, data.tip_oglasa, {
          lat: parseFloat(data.latituda),
          lng: parseFloat(data.longituda)
        });
      });
      populateMap();
      // setTimeout(waitForMarkers, 5000);
    }
  })
}
