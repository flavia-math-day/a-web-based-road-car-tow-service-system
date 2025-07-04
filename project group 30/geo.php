 <?php
//$ip = $_SERVER['REMOTE_ADDR']; // Get user IP address
$ip = '196.43.179.253';
$geoData = file_get_contents("http://ip-api.com/json/{$ip}");
$geoData = json_decode($geoData, true);

//if ($geoData['status'] === 'success') {
    //echo "Country: " . $geoData['country'] . "<br>";
    //echo "Region: " . $geoData['regionName'] . "<br>";
   // echo "City: " . $geoData['city'] . "<br>";
    //echo "Latitude: " . $geoData['lat'] . "<br>";
   // echo "Longitude: " . $geoData['lon'] . "<br>";
	
	if ($geoData['status'] === 'success') {
    $location = "Country: " . $geoData['country'] . "\n" .
                "Region: " . $geoData['regionName'] . "\n" .
                "City: " . $geoData['city'] . "\n" .
                "Latitude: " . $geoData['lat'] . "\n" .
                "Longitude: " . $geoData['lon'];
    echo $location;
	
	
} else {
    echo "Location not found.";
}



?>