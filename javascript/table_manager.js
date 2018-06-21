<<<<<<< HEAD
getData("vratiPodatke.php?atribut=stan")
.then(data => {
  var tabela = document.getElementById("stanTabela");
  var array=JSON.parse(data);
  console.log(array)
  var tmp=[];
  
  array.forEach(element => {
    for (var j = 0; j < 10; j++) {
      tmp.push(element.cena);
     
    }
    var i=0;
    var row=tabela.insertRow(i+1);
    i++;
    for (var j = 0; j < 10; j++) {
    var cell=row.insertCell(j)
    cell.innerHTML=tmp[j];
}
    
  });
})

getData("vratiPodatke.php?atribut=cimer")
.then(data => {
  var array=JSON.parse(data);
  array.forEach(element => {
   // cimeri.push(element);
  });
});

console.log("test tabela");
//  var tabela = document.getElementById("stanTabela");
//    var row=tabela.insertRow(i+1);

// var row=tabela.insertRow(i+1);
=======
function tabela() {
  var tablaCimer = document.getElementById("cimerTabela");
  var tableStan = document.getElementById("stanTabela");

  for (var i = 0; i < 5; i++) {
    var rowC = tablaCimer.insertRow(i + 1);
    var rowS = tableStan.insertRow(i + 1);
    for (var j = 0; j < 14; j++) {
      var cell1 = rowC.insertCell(j);
      var cell2 = rowS.insertCell(i);
      cell1.innerHTML = "Cimer";
      cell2.innerHTML = "Stan";
    }
  }
}

function stanTabela() {
  var table = document.getElementById("stanTabela");
  for (var i = 0; i < 5; i++) {
    var row = table.insertRow(i + 1);
    for (var j = 0; j < 14; j++) {
      var cell1 = row.insertCell(j);
      //  var cell2 = row.insertCell(1);
      cell1.innerHTML = "Tip oglasa";
    }
  }
}

//tabela();

function vratiSveStanove(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
  });
}
vratiSveStanove("vratiPodatke.php?atribut=stan").then(data => {
  console.log("stan");
  console.log(data);
});

function vratiSveCimere(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onload = () => resolve(xhr.responseText);
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
  });
}
vratiSveCimere("vratiPodatke.php?atribut=cimer").then(data => {
  console.log("cimer");
  console.log(data);
});
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
