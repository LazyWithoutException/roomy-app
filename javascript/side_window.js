function openNav(obj) {
  var side = document.getElementById("mySidenav");
  side.style.width = "450px";

  //clear values
  var main = document.getElementById("carouselExampleIndicators");
  main.childNodes[1].innerHTML = "";
  main.childNodes[3].innerHTML = "";
  //slider
  for (var i = 0; i < 3; i++) {
    var li = document.createElement("li");
    li.setAttribute("data-target", "#carouselExampleIndicators");
    li.setAttribute("data-slide-to", i.toString());
    if (i == 0) li.setAttribute("class", "active");
    main.childNodes[1].appendChild(li);
    var carouselItem = document.createElement("div");
    if (i == 0) carouselItem.setAttribute("class", "carousel-item active");
    else carouselItem.setAttribute("class", "carousel-item");
    var image = document.createElement("IMG");
    image.setAttribute("alt", "First slide");
    image.setAttribute("class", "d-block w-100");
    image.src = "img/stan.jpg";
    carouselItem.appendChild(image);
    main.childNodes[3].appendChild(carouselItem);
  }

  console.log(obj);
  var cena = (document.getElementById("cena").innerHTML =
    "<label >Cena:</label>" + "<label >" + obj.cena + "</label>");
  var kvadratura = (document.getElementById("kvadratura").innerHTML =
    "<label >Kvadratura:</label>" + "<label >" + obj.kvadratura + "</label>");
  var brojSoba = (document.getElementById("brojsoba").innerHTML =
    "<label >Beoj soba:</label>" + "<label >" + obj.broj_soba + "</label>");
  var lokacija = (document.getElementById("lokacija").innerHTML =
    "<label >Lokacija:</label>" + "<label >" + obj.lokacija + "</label>");
  var sprat = (document.getElementById("sprat").innerHTML =
    "<label >Sprat:</label>" + "<label >" + obj.sprat + "</label>");
  var uknjizenost = (document.getElementById("uknjizenost").innerHTML =
    "<label >Ukljizenost:</label>" + "<label >" + obj.uknjizenost + "</label>");
  var namestenost = (document.getElementById("namestenost").innerHTML =
    "<label >Namestenost:</label>" + "<label >" + obj.namestenost + "</label>");
  var tipObjekat = (document.getElementById("tipobjekta").innerHTML =
    "<label >Tip objekta:</label>" + "<label >" + obj.tip_objekta + "</label>");
  var grejanje = (document.getElementById("grejanje").innerHTML =
    "<label >Grejanje:</label>" + "<label >" + obj.grejanje + "</label>");
  var pomocneStrukutre = (document.getElementById(
    "pomocnestrukture"
  ).innerHTML =
    "<label >Pomocne strukture:</label>" +
    "<label >" +
    obj.pomocne_strukture +
    "</label>");
  var dodatno = (document.getElementById("dodatno").innerHTML =
    "<label >Dodatne napomene:</label>" +
    "<label >" +
    obj.dodatno +
    "</label>");
  var telefon = (document.getElementById("telefon").innerHTML =
    "<label >Telefon:</label>" + "<label >" + obj.telefon + "</label>");

  if (obj.tip_oglasa == "cimer") {
    var rasponGodina = (document.getElementById("raspongodina").innerHTML =
      "<label >Godine:</label>" + "<label >" + obj.raspon_godina + "</label>");
    var osobine = (document.getElementById("osobine").innerHTML =
      "<label >Osobine:</label>" + "<label >" + obj.osobine + "</label>");
    var hobi = (document.getElementById("hobi").innerHTML =
      "<label >Hobi:</label>" + "<label >" + obj.hobi + "</label>");
    var radniOdnos = (document.getElementById("radniodnos").innerHTML =
      "<label >Radni odsnos:</label>" +
      "<label >" +
      obj.radni_odnos +
      "</label>");
    var pol = (document.getElementById("pol").innerHTML =
      "<label >Pol:</label>" + "<label >" + obj.pol + "</label>");
  }
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
