
var v = false;
var l = false;
var id= 0;
var z = 15;
var gx = 15; // temp x coordinates for zoom
var gy = 15; // temp y coordinates for zoom
var vid = document.getElementById("video");
var myobj;
function intit(){
    var x = v;
}
function Video()
{
	
	document.getElementById("vid").classList.toggle('show');
        if (video.paused) 
        video.play(); 
    else 
        video.pause(); 



	if(!v){
		document.getElementById("tabl1").classList.add('table-wrapper');
		v = true;
	}else{
		if(v && !l){
		document.getElementById("tabl1").classList.remove('table-wrapper');
		v = false;
	}
	if(l && v){
		v = false;
	}
	}
}
function Location(i)
{
    
	document.getElementById("loc").classList.toggle('show');
    

	

	if(!l){
		document.getElementById("tabl1").classList.add('table-wrapper');
		l = true;
	}else{
		if(l && !v){
		document.getElementById("tabl1").classList.remove('table-wrapper');
		l = false;
	}
	if(l && v){
		l = false;
	}
	}
    
    id = i;
	
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

function notification()
{
document.getElementById("alert").classList.toggle('hide');
 audio.pause();
}
function alarmoff()
{

 
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              
               document.getElementById("mute").innerHTML = this.responseText;;
                
            }
        };
        xmlhttp.open("GET","alarmoff.php",true);
        xmlhttp.send(); 
}