<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lat = $_POST["latitude"] ?? '';
    $lon = $_POST["longitude"] ?? '';
    $address = $_POST["address"] ?? '';

    if ($lat && $lon) {
        $entry = "Lat: $lat, Lon: $lon, Address: $address\n";
        file_put_contents("locations.log", $entry, FILE_APPEND);
    }
}
?>