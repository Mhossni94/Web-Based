  var ax = 10 ; var ay = 10;
  var bx = 30.123456 ; var by = 31.123456;

function initMap1() {
        
        var uluru = {lat: ax , lng: ay};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
            disableDefaultUI: true,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
    document.getElementById("btn2").style.backgroundColor = "#e7e7e7";
    document.getElementById("btn1").style.backgroundColor = "#008CBA";
      }
function initMap2() {
        
        var uluru = {lat: bx , lng: by};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
            disableDefaultUI: true,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
    document.getElementById("btn1").style.backgroundColor = "#e7e7e7";
    document.getElementById("btn2").style.backgroundColor = "#008CBA";
      }
function set1(a,b)
{
    ax = a;
    ay = b;
}
function set2(a,b)
{
    bx = a;
    by = b;
}


