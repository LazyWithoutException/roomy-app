

prosledi=function(){
var tip=document.getElementById("tip-objekta").value;
var kvadratura=document.getElementById("kvadratura").value;
var cena=document.getElementById("cena").value;
var namestenost=document.getElementById("namestenost").value;
var grejanje=document.getElementById("grejanje").value;
var pomocne_zgrade=document.getElementById("pomocne-zgrade").value;
var uknjizenost=document.getElementById("uknjizenost").value;
var telefon=document.getElementById("telefon").value;
var sobe=document.getElementById("broj-soba").value;
var sprat=document.getElementById("sprat").value;
var adresa=document.getElementById("adresa").value;;
var lat=document.getElementById("lat").value;
var lng=document.getElementById("lng").value;
var opis=document.getElementById("opis").value;

console.log(tip,kvadratura,cena,namestenost,grejanje,pomocne_zgrade,uknjizenost,
    telefon,sobe,sprat,adresa,lat,lng,opis);


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert( this.responseText);
        }
    };
    xmlhttp.open("GET", "ajaxcall.php?tip="+tip+"&kvadratura="+kvadratura+"&cena="+cena+"&namestenost="+namestenost+"&grejanje="+grejanje+
    "&pomocne_zgrade="+pomocne_zgrade+"&uknjizenost="+uknjizenost+"&telefon="+telefon+"&sobe="+sobe+"&sprat="+sprat+
    "&adresa="+adresa+"&lat="+lat+"&lng="+lng+"&opis="+opis, true);
    xmlhttp.send();
}
var btn=document.getElementById("btnSubmit");
btn.addEventListener("click",prosledi)

var btnStan=document.getElementById("btnStan");
btnStan.className="page-item active";
btnStan.onclick=function(){
    btnStan.className="page-item active";
    btnCimer.className="";
    var divCimer=document.getElementById("cimer");
    divCimer.style.display="none";
    var divCimerr=document.getElementById("cimerr");
    divCimerr.style.display="none";
}

var btnCimer=document.getElementById("btnCimer");
btnCimer.onclick=function(){
    btnCimer.className="page-item active";
    btnStan.className="";
    document.createElement("input")
    var divCimer=document.getElementById("cimer");
    divCimer.style.display="";
    var divCimerr=document.getElementById("cimerr");
    divCimerr.style.display="";
}

var divCimer=document.getElementById("cimer");
divCimer.style.display="none";
var divCimerr=document.getElementById("cimerr");
divCimerr.style.display="none";
console.log("aa");