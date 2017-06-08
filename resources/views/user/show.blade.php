<html><head></head>



<body>


<h1>{{$user->name}}</h1>


<form action="/user/location" method="get">



<div id ="map-canvas"></div>


    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBdiI_IP97pPiBqKSQ4FGc8LST3FnwhNuY'></script>

        <div id='gmap_canvas' style='height:520px;width:520px;'>

        </div>


        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=AIzaSyA_QAjpGlyffPd4pFv_dlaIdTr6rXzPid8'>

    </script><script type='text/javascript'>
        function init_map(){
            var myOptions = {
                zoom:15,
                center:new google.maps.LatLng('<?php echo $latitude; ?>','<?php echo $longitude; ?>'),
                mapTypeId: google.maps.MapTypeId.ROADMAP};
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng('<?php echo $latitude; ?>','<?php echo $longitude; ?>')});
                infowindow = new google.maps.InfoWindow({
                    content:'<strong></strong><br><?php echo $user->address; ?>
                        <br><?php echo $user->city; ?>'});
                google.maps.event.addListener(marker, 'click', function(){
                    infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>






</form>

</body>



</html>