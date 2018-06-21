<<<<<<< HEAD
function waitForMarkers(){
=======
(function waitForMarkers(){
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
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
<<<<<<< HEAD
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
=======
            setTimeout(waitForMarkers,5000);
        }
    })
})()
>>>>>>> fcf203284021a93ba5550ee9a3a8d69853304809
