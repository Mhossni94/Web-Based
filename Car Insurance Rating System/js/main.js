  function initMap() {
        
        var uluru = {lat: 50 , lng: 50};
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
