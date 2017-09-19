﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ทดสอบ geolocation + google map</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    </head>
    <body>
            ตำแหน่งของฉัน:
        <div id="geo_data"></div>
        <div id="map_canvas" style="background: #f5f5f5; height:200px;
             width: 400px;border: #999 1px dotted;">
            
        </div>

        <script type="text/javascript">
        var initialLocation;
            var bangkok = new google.maps.LatLng(16.237413699999998, 103.2721309);
            function initialize() {
                var myOptions = {
                    zoom: 15,
                    //center: latlng,
                    mapTypeControl: false,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);

                // detect geolocation lat/lng
                if ( navigator.geolocation ) {
                    navigator.geolocation.getCurrentPosition(function(location) {
                        var location = location.coords;
                        $("#geo_data").html('lat: '+location.latitude+'<br />long: '+location.longitude);
                        initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
                        map.setCenter(initialLocation);
                        setMarker(initialLocation);
                    }, function() {
                        handleNoGeolocation();
                    });
                } else {
                    handleNoGeolocation();
                }

                // no geolocation
                function handleNoGeolocation() {
                    map.setCenter(bangkok);
                    setMarker(bangkok);
                    $("#geo_data").html('lat: 16.237413699999998<br />long: 103.2721309');
                }

                // set marker
                function setMarker(initialName) {
                    var marker = new google.maps.Marker({
                        draggable: true,
                        position: initialName,
                        map: map,
                        title: "คุณอยู่ที่นี่."
                    });
                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        $("#geo_data").html('lat: '+marker.getPosition().lat()+'<br />long: '+marker.getPosition().lng());
                    });
                }
            }

            $(document).ready(function() {
                initialize();
            });
        </script>
    </body>
</html>