<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insurance Rating system</title>
    <style>
       #map {
        height: 600px;
        width: 80%;
        margin: auto;
       }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>
<body>
  <script>
function outdata() {
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("output").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","data.php",true);
        xmlhttp.send(); 
    
}
</script>

    <script>
      
    outdata();
      
    setInterval(function(){
        outdata();
          var xa = "x" + id ;
        var ya = "y"+ id ;
        var a = parseFloat (document.getElementById(xa).innerHTML);
                           var b = parseFloat(document.getElementById(ya).innerHTML);
                           
                           initMap(a,b);
    }, 10000);
   
    </script>
<div id="map"></div>
    <script>
        function initMap(x,y) {
        
        var uluru = {lat: x , lng: y};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
            disableDefaultUI: true,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC70axVCw_1PTKkbmWgsUWN8FuMMcYhdAg&callback=initMap">
    </script>
   <div id="tabl1" style="margin-top: 10px;" >
<table style="">
    <thead>
  <tr>
    <th>Time</th>
    <th>longitude</th>
    <th>Latitude</th>
    <th>Altitude</th>
    <th>Speed</th>
    <th>Distance</th>
    <th>S.O.S</th>
    <th>Emergency</th>
    <th>Mechanic</th>
    <th>Impact</th>
    <th>Credit</th>
  </tr></thead>
  <tbody id = "output">
    
  </tbody>
</table>
</div> 
</body>
</html>