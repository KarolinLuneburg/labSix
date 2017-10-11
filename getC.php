<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($_GET['location'])) {
    /**
     * Here we build the url we'll be using to access the google maps api
     */
    $maps_url = 'https://' .
        'maps.googleapis.com/' .
        'maps/api/geocode/json' .
        '?address=' . urlencode($_GET['location']);
    
    $maps_json = file_get_contents($maps_url);
    $maps_array = json_decode($maps_json, true);
    $lat = $maps_array['results'][0]['geometry']['location']['lat'];
    $lng = $maps_array['results'][0]['geometry']['location']['lng'];
    
    
    


    if(isset($_GET['location'])){
    echo "Your latitude is: ".$lat;
    echo "</br>";
    echo "Your longtitude is: ".$lng;
    }


//    /**
//    Instagram API is restricted and does not work in this applicaiton. Optimally this is how you would pull out media from Instagram
//     * Time to make our Instagram api request. We'll build the url using the
//     * coordinate values returned by the google maps api
//     */
//    $url = 'https://' .
//        'api.instagram.com/v1/media/search' .
//        '?lat=' . $lat .
//        '&lng=' . $lng .
//        '&client_id=CLIENT-ID'; //replace "CLIENT-ID"
//    $json = file_get_contents($url);
//    $array = json_decode($json, true);
}
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>What are my coordinates?</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="get">
    <input type="text" name="location"/>
    <button type="submit">Show</button>
</form>
<br/>

</body>
</html>
