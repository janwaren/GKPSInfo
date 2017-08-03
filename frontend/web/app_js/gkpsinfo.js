    $(document).ready(function (){

        $(".truncate").dotdotdot({
            watch: 'window',
            ellipsis: '...'
        });       
    });

  function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 3, lng: 99},
      scrollwheel: false,
      zoom: 8
    });
  }