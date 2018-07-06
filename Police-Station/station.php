
<?php
session_start();
if(!($_SESSION['login']==1)){
header("location:index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Police Station Unit</title>
     <link rel="shortcut icon" type="image/x-icon" href="img\Egyptian_Police_Emblem.svg.png">
      <style>
       #map {
        height: 90%;
        width: 100%;
	z-index: 1;
       }
          
      #btn1    {	
          	position: absolute;
    top: 55%;
    right: 4%;
	z-index: 2;
          }
          #btn2 {
    position: absolute;
    top: 45%;
    right: 4%;
	z-index: 2;  
          }
    </style>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>

</head>
<body>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC70axVCw_1PTKkbmWgsUWN8FuMMcYhdAg&callback=initMap">
    </script>
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

     setInterval(function(){outdata();},100);
    setInterval(function(){
        
         
         var xa = "x" + id ;
        var ya = "y"+ id ;
        var a = parseFloat (document.getElementById(xa).innerHTML);
                           var b = parseFloat(document.getElementById(ya).innerHTML);
                           
                           initMap(a,b);
                           
                          }, 50000);
   
    </script>
   


<!-- Police middle logo -->
    <div style="margin-right: auto;margin-left: 45%"><button id = "mute" onclick="alarmoff()">Mute</button> <form action="logout.php"> <input type="submit" name="logout" value="logout" onclick="logout()" > </form><img  style="width: 140px;" src="img/Egyptian_Police_Emblem.svg.png" >  </div>

<div id="tabl1" style="margin-top: 1px;" >
<table style="">
    <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Rank</th>
    <th>Heart Rate</th>
    <th>temperature</th>
    <th>Shouting</th>
    <th>Panic</th>
    <th>Hostile</th>
    <th>Hostile word</th>
    <th>Battery</th>
    <th>Status</th>
    <th>Lang.</th>
    <th>Lat.</th>
    <th>Location</th>
    <th>Video feed</th>
  </tr></thead>
  <tbody id = "output">
   
  </tbody>
</table>
</div>
 <div class="Video" id ="vid" >
					<img src="img/log-close.png" class ="close" onclick="Video()">
                  
                  
    </div>


                     
                         <div class="Location" id="loc">
					<img src="img/log-close.png" class ="close" onclick="Location(); ">
                       <div id="map"></div>
                        <div ><button id ="btn1" type="button" onclick="incz()">+</button>
                        <button id ="btn2" type="button" onclick="decz()">-</button></div>
                         </div>
                        
</body>
</html>
