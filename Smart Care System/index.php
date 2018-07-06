<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Care System</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>
<body onload="initMap2()">
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
        xmlhttp.open("GET","load.php",true);
        xmlhttp.send(); 
    
}
</script>

    <script>
      
    outdata();
    
    setInterval(function(){
        outdata();
      
                          var a = parseFloat (document.getElementById("xp").innerHTML);
                           var b = parseFloat(document.getElementById("yp").innerHTML);
                           var c = parseFloat (document.getElementById("xh").innerHTML);
                           var d = parseFloat(document.getElementById("yh").innerHTML);
                           
                           set1(a,b);
                           set2(c,d);
                          
                          
                          }, 15000);
   
    </script>
    <div style="height:100px;background:#000000;"></div>
     <div id="tabl1" style="margin-top: 20px;margin:8px;" >
<table style="">
    <thead>
    <tr>
    <th >Information</th>
    <th colspan="2">Home Location</th>
<th colspan="2">User Location</th>
<th colspan="6">Readings</th>
  </tr>
  <tr>
    <th>Time</th>
    <th>X-Coordinates</th>
    <th>Y-Coordinates</th>
    <th>X-Coordinates</th>
    <th>Y-Coordinates</th>
    <th>Heart Rate</th>
    <th>Fall Detect</th>
    <th>Geo-Fencing</th>
    <th>status</th>
    <th>Speed</th>
    <th>Battery Life</th>
  </tr></thead>
  <tbody id = "output">
    
  </tbody>
</table>
</div> 
    
<div>
    <div id="map"></div>
                        <div ><button id ="btn1" type="button" onclick="initMap1()">User Location</button>
                        <button id ="btn2" type="button" onclick="initMap2()">Home Location</button></div>
                         
    </div>
  
       
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC70axVCw_1PTKkbmWgsUWN8FuMMcYhdAg&callback=initMap">
    </script>
  
  
</body>
</html>


 