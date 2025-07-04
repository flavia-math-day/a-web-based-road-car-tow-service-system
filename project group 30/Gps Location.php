<!DOCTYPE html>
<html>
<head>
  <title>Detect Location with Address</title>
</head>
<body>

<h2>Your Location Info</h2>
<p id="location">Detecting...</p>
<textarea id="address" rows="5" cols="50" placeholder="Your address will appear here..."></textarea>

<script>
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(sendPosition, showError);
} else {
  document.getElementById("location").innerText = "Geolocation is not supported by this browser.";
}

function sendPosition(position) {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;

  document.getElementById("location").innerText = `Latitude: ${lat}, Longitude: ${lon}`;

  // Use OpenStreetMap Nominatim for reverse geocoding
  fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
    .then(response => response.json())
    .then(data => {
      if (data && data.display_name) {
        const address = data.display_name;
        document.getElementById("address").value = address;

        // Optionally send to backend
        fetch("save_location.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: `latitude=${lat}&longitude=${lon}&address=${encodeURIComponent(address)}`
        });
      } else {
        document.getElementById("address").value = "Unable to find address.";
      }
    })
    .catch(() => {
      document.getElementById("address").value = "Failed to fetch address.";
    });
}

function showError(error) {
  const loc = document.getElementById("location");
  switch(error.code) {
    case error.PERMISSION_DENIED:
      loc.innerText = "Permission denied.";
      break;
    case error.POSITION_UNAVAILABLE:
      loc.innerText = "Position unavailable.";
      break;
    case error.TIMEOUT:
      loc.innerText = "Request timed out.";
      break;
    default:
      loc.innerText = "An unknown error occurred.";
  }
}
</script>

</body>
</html>