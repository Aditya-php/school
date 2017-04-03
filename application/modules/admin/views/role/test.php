
      <div id="output"></div>

  
    <script>
      function initMap_location() {
      
        var origin1 = {lat: 28.5355, lng: 77.3910};
        var destinationA = 'Ghaziabad, India';
       

    
        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1], //, origin2
          destinations: [destinationA], //, destinationB
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
            console.log(response);
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
           

            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              for (var j = 0; j < results.length; j++) {
                outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                    ': ' + results[j].distance.text + ' in ' +
                    results[j].duration.text + '<br>';
              }
            }
          }
        });
      }

   
    </script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaTHVp3qCjbztUnybRv3fW_xql-qPgPRA&callback=initMap_location">
    </script>
