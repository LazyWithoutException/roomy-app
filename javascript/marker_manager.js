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
    getMarkers("vratiPodatke.php?id=" + id + "&tip=" + tip).then(data => {
      console.log(data);
      openNav();
    });
  });
  obj = { id: id, marker: marker };
  markeri.push(obj);
}

/////////////////////////// crta markere na ma
function populateMap() {
  markeri.forEach(element => {
    element.marker.setMap(map);
  });
}
////////////////////////////
function getMarkers() {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "vratimarkere.php?marker=true");
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
  });
}


function sayHi() {
  console.log('Hello');
}


getMarkers()
.then(data => {
  console.log(data)
  if(data!=null){
    var x = JSON.parse(data);
    console.log(x)
    x.forEach(data => {
      createMarker(data.id, data.tip_oglasa, {
        lat: parseFloat(data.latituda),
        lng: parseFloat(data.longituda)
      });
    });
    populateMap();
  }
  else{
    console.log("greska")
  }

})
console.log("test");
