
var v = false;
var l = false;
var vid = document.getElementById("video");
var z = 10;
function closelogin()
{
	document.getElementById("log").classList.toggle('hide');
    document.getElementById("tables").classList.toggle('show');
}

function Location()
{
	document.getElementById("loc").classList.toggle('show');


	


	
	
}

  function initMap(x,y) {
        
        var uluru = {lat: x , lng: y};
      
          var map = new google.maps.Map(document.getElementById('map'), {
          zoom: z,
            disableDefaultUI: true,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      gx = x ; gy = y;
      }
function incz()
{z = z + 1 ;
 initMap(gx,gy);
}
function decz()
{z = z - 1 ;
initMap(gx,gy);}
