function openNav(obj) {
  var side = document.getElementById("mySidenav");
  side.style.width = "450px";

  //clear values
  var main = document.getElementById("carouselExampleIndicators");
  main.childNodes[1].innerHTML = "";
  main.childNodes[3].innerHTML = "";
  //slider
  for (var i = 0; i < obj.slike.length; i++) {
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
   // image.src = 
    carouselItem.appendChild(image);
    main.childNodes[3].appendChild(carouselItem);
  }

  console.log(obj.slike[0].naziv.toString());
  
  var cena = (document.getElementById("cena").innerHTML =
    "<label >Cena:</label>" + "<label >" + obj.stan.cena + "</label>");
  var kvadratura = (document.getElementById("kvadratura").innerHTML =
    "<label >Kvadratura:</label>" + "<label >" + obj.stan.kvadratura + "</label>");
  var brojSoba = (document.getElementById("brojsoba").innerHTML =
    "<label >Beoj soba:</label>" + "<label >" + obj.stan.broj_soba + "</label>");
  var lokacija = (document.getElementById("lokacija").innerHTML =
    "<label >Lokacija:</label>" + "<label >" + obj.stan.lokacija + "</label>");
  var sprat = (document.getElementById("sprat").innerHTML =
    "<label >Sprat:</label>" + "<label >" + obj.stan.sprat + "</label>");
  var uknjizenost = (document.getElementById("uknjizenost").innerHTML =
    "<label >Ukljizenost:</label>" + "<label >" + obj.stan.uknjizenost + "</label>");
  var namestenost = (document.getElementById("namestenost").innerHTML =
    "<label >Namestenost:</label>" + "<label >" + obj.stan.namestenost + "</label>");
  var tipObjekat = (document.getElementById("tipobjekta").innerHTML =
    "<label >Tip objekta:</label>" + "<label >" + obj.stan.tip_objekta + "</label>");
  var grejanje = (document.getElementById("grejanje").innerHTML =
    "<label >Grejanje:</label>" + "<label >" + obj.stan.grejanje + "</label>");
  var pomocneStrukutre = (document.getElementById(
    "pomocnestrukture"
  ).innerHTML =
    "<label >Pomocne strukture:</label>" +
    "<label >" +
    obj.stan.pomocne_strukture +
    "</label>");
  var dodatno = (document.getElementById("dodatno").innerHTML =
    "<label >Dodatne napomene:</label>" +
    "<label >" +
    obj.stan.dodatno +
    "</label>");
  var telefon = (document.getElementById("telefon").innerHTML =
    "<label >Telefon:</label>" + "<label >" + obj.stan.telefon + "</label>");

  if (obj.stan.tip_oglasa == "cimer") {
    var rasponGodina = (document.getElementById("raspongodina").innerHTML =
      "<label >Godine:</label>" + "<label >" + obj.stan.raspon_godina + "</label>");
    var osobine = (document.getElementById("osobine").innerHTML =
      "<label >Osobine:</label>" + "<label >" + obj.stan.osobine + "</label>");
    var hobi = (document.getElementById("hobi").innerHTML =
      "<label >Hobi:</label>" + "<label >" + obj.stan.hobi + "</label>");
    var radniOdnos = (document.getElementById("radniodnos").innerHTML =
      "<label >Radni odsnos:</label>" +
      "<label >" +
      obj.stan.radni_odnos +
      "</label>");
    var pol = (document.getElementById("pol").innerHTML =
      "<label >Pol:</label>" + "<label >" + obj.stan.pol + "</label>");
  }
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
