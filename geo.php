
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Multiple Markers Google Maps</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=keyanda" type="text/javascript"></script>
        <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>

        <script type="text/javascript">
        // check DOM Ready
        $(document).ready(function() {
            // execute
            (function() {
                // map options
                var options = {
                    zoom: 5,
                    center: new google.maps.LatLng(-7.24917, 112.75083), // centered US
                    mapTypeId: google.maps.MapTypeId.TERRAIN,
                    mapTypeControl: false
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);

                // NY and CA sample Lat / Lng
                var southWest = new google.maps.LatLng(4.695135, 96.749397);
                var northEast = new google.maps.LatLng(-10.466667, 135.199997);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();

                // set multiple marker
                for (var i = 0; i < 250; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()),
                        map: map,
                        title: 'Click Me ' + i
                    });

                    // process multiple info windows
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: 'Hello, World!!'
                            });
                            infowindow.open(map, marker);
                        });

                    })(marker, i);
                }
            })();
        });
        </script>
        <script type="text/javascript">


        </script>
    </head>
    <body>
        <div id="map_canvas" style="width: 800px; height:500px;"></div>
    </body>
</html>
