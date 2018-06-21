(function waitForMarkers(){
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
            setTimeout(waitForMarkers,5000);
        }
    })
})()
