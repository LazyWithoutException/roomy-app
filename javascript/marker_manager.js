var markeri = [];
var marker;
<<<<<<< HEAD

=======
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
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
<<<<<<< HEAD
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
=======
    getMarkers("vratiPodatke.php?id=" + id + "&tip=" + tip).then(data => {
      console.log(data);
      openNav();
    });
  });
  obj = { id: id, marker: marker };
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
  markeri.push(obj);
}

/////////////////////////// crta markere na ma
function populateMap() {
  markeri.forEach(element => {
    element.marker.setMap(map);
  });
}
////////////////////////////
<<<<<<< HEAD
function getMarkers(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url);
=======
function getMarkers() {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "vratimarkere.php?marker=true");
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
  });
}


<<<<<<< HEAD

getMarkers("vratimarkere.php?marker=true")
  .then(data => {
=======
function sayHi() {
  console.log('Hello');
}


getMarkers()
.then(data => {
  console.log(data)
  if(data!=null){
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
    var x = JSON.parse(data);
    console.log(x)
    x.forEach(data => {
      createMarker(data.id, data.tip_oglasa, {
        lat: parseFloat(data.latituda),
        lng: parseFloat(data.longituda)
      });
    });
    populateMap();
<<<<<<< HEAD
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
=======
  }
  else{
    console.log("greska")
  }

})
console.log("test");
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
