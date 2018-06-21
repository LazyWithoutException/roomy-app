function waitForMarkers(){
    console.log("ajax")
    $.ajax({
        type:"GET",
        url:"vratimarkere.php?marker=true",
        async:true,
        cache:false,
        timeout:5000,
        success:function(data){
            var x=JSON.stringify(data);
            console.log(x);
            setTimeout(waitForMarkers,50000);
        }
    })
}

function getData(url){
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.onload = () => resolve(xhr.responseText);
        xhr.onerror = () => reject(xhr.statusText);
        xhr.send();
      });
}
