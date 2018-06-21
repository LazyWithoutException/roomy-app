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