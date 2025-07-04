<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB-BASED ROAD CAR TOW SERVICES</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
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
 <!--<script>
        function togglePaymentFields() {
            const method = document.querySelector('input[name="payment_method"]:checked').value;
            document.getElementById('card_section').style.display = method === 'card' ? 'block' : 'none';
            document.getElementById('upi_section').style.display = method === 'upi' ? 'block' : 'none';
            document.getElementById('netbanking_section').style.display = method === 'netbanking' ? 'block' : 'none';
            document.getElementById('paypal_note').style.display = method === 'paypal' ? 'block' : 'none';-->
			
			
		
        }
    </script>
	
	
	<script>
  function togglePaymentFields() {
    // Show/hide sections based on selected payment method
    const selectedPayment = document.querySelector('input[name="payment_method"]:checked').value;

    document.getElementById('card_section').style.display = (selectedPayment === 'card') ? 'block' : 'none';
    document.getElementById('paypal_note').style.display = (selectedPayment === 'paypal') ? 'block' : 'none';
    document.getElementById('upi_section').style.display = (selectedPayment === 'upi') ? 'block' : 'none';
    document.getElementById('netbanking_section').style.display = (selectedPayment === 'netbanking') ? 'block' : 'none';
	
  }

  
</script>
	<style>
  .payment-option {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
  }

  .payment-option input[type="radio"] {
    margin-right: 8px;
  }
</style>
</head>

<body onLoad="togglePaymentFields()">
    <header class="sticky">
        <nav>
            <a href="#home" id="logo"></a>
            <ul id="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#request">Request a Service</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="drop">
                <button type="button" class="drop-btn btn">Admin/Mechanic <i class="fa fa-angle-down"></i></button>
                <div class="drop-content">
                    <a href="driver/login.php">Mechanic </a> <br>
                    <a href="admin/login.php">Admin </a> <br>
                </div>
            </div>
        </nav>
    </header>


    <section class="hero" id="home">
        <div class="hero-container">
            <h1>WEB-BASED ROAD CAR TOW SERVICES</h1>
            <p>Dont wait anymore. available Anytime anywhere in Uganda.
            </p>
            <a href="#request"><button class="primary-btn btn">Make Your Request Now</button></a>
            <a href="track.php"><button id="trackbtn">Track Your Request</button></a>
        </div>
    </section>

    <section class="about" id="about">
        <h2>Who We Are ?</h2>
        <p class="section-desc">This is a Web Application which is definitely a
            good solution for the people who seek help on the road in the middle of a journey or in the remote locations
            with major or minor mechanical issues of their vehicle. In order to avail our service, users can jus make a request by filling a simple request form <br> <br> The users need not login or register into the system. The users can specify the service centre as they prefer. Once the request is made they will be assigned to a trustworthy and
            experienced service provider from Autodoc. The Driver will be assigned by the administrator shortly. Once the request is assigned the driver from Autodoc will reach your given destination with the customised towing trucks within 30-40 minutes. Ousr service Provider will now assiat you to transport your vehicle to the specified location. </p>
    </section>

    <section class="features" id="features">
        <h2>Why Choose Us</h2>
        <div class="row">
            <div class="column">
                <i class="fas fa-history"></i>
                <h3>On-Time Service</h3>
                <p>Autodoc ensures you fast and on time service afer you make a request to us. You will connected with a
                    service provider who wil reach yor location and assist you, Team AUTODOC is able to reach you within 30-40
                    minutes.</p>
            </div>
            <div class="column">
                <i class="fas fa-tools"></i>
                <h3>Well-Trained Proffesionals</h3>
                <p>We will assign your request with a well-trained, trustworthy abd approved Service Providers. With 60+ customised tow trucks, Our drivers are able to your location as fast as possible.</p>
            </div>
            <div class="column">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Availability</h3>
                <p> We provide a network of service providers who are available 24/7  for
                    your assistance. We provide you trusted and reliable service anytime anywhere in Uganda when you
                    need it the most.</p>
            </div>
        </div>

    </section>

    <section class="services" id="services">
        <h2>What Do We Offer</h2>
        <div class="serv-row">
            <div class="serv-column">
                <div class="card" style="margin-left: 21rem;">
                    <div class="serv-icon"><i class="fas fa-motorcycle"></i></div>
                    <h3>Two Wheeler Tow</h3>
                    <p>Your bike has broken down and you need a two-wheeler towing vehicle at your location and a reliable bike towing service who can help you. You are frantically looking up the best bike towing . Dont worry!  assitance is always nearby and available 24 hours a day.</p>
                    <a href="#request"><button class="serv-btn btn" style="padding: 1rem 5rem; margin-top: 30px;">Starts 25,000/= per 10Km</button></a>
                </div>

            </div>
            <div class="serv-column">
                <div class="card" style="margin-left: 21rem;">
                    <div class="serv-icon"><i class="fas fa-car"></i></div>
                    <h3>Four Wheeler Tow</h3>
                    <p>Your car has broken down and you need a four-wheeler towing vehicle at your location and a reliable car towing service who can help you. You’re frantically looking up the best car towing . Don’t worry!breakdown assistance is always nearby and available 24 hours a day.</p>
                    <a href="#request"><button class="serv-btn btn" style="padding: 1rem 5rem; margin-top: 30px;">Starts 50,000/= per 10Km</button></a>
                </div>

            </div>

        </div>
    </section>

    <section class="request" id="request">
        <h2>Customer Details</h2>
        <div class="form-body">
            <div class="form-container">
                <form action="pay.php" class="decor" method="post">
                    <div class="form-inner">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" placeholder="Enter your name" name="name" required="true"> <br>
                        <label class="form-label">Phone</label>
                        <input class="form-control" type="tel" placeholder="Enter your phone number" name="phone" required="true" maxlength="10" minlength="10" pattern="[0-9]+"> <br>
                         <label class="form-label">Destination</label>
                         <input class="form-control" type="text" placeholder="Enter a Destination" name="destination" required><br>
                        <label class="form-label">Service Type</label>
                         <select class="form-select" name="servicetype" required>
                          <option selected disabled>Select your Service Type</option>
                         <option value="Two Wheeler Towing">Two Wheeler Towing</option>
                          <option value="Four Wheeler Towing">Four Wheeler Towing</option>
                         </select><br>
                       <label class="form-label">Pickup Time</label>
                     <input class="form-control" type="time" name="pickuptime" required><br>
                   <label class="form-label">GPS Tracking:</label><label class="form-label" id="location"></label> <br>
                       <textarea class="form-control" id="address" name="pickuploc" rows="5" cols="100%" placeholder="Your address will appear here..." style="background:#66CCFF" ></textarea> <br>
<label class="form-label">Select Payment Method</label><br>
<label><input type="radio" name="payment_method" value="card" checked onChange="togglePaymentFields()"> Credit/Debit Card</label><br>
<!--<label><input type="radio" name="payment_method" value="paypal" onChange="togglePaymentFields()"> PayPal</label><br>-->
<!--<label><input type="radio" name="payment_method" value="upi" onChange="togglePaymentFields()"> UPI</label><br>-->
<label><input type="radio" name="payment_method" value="netbanking" onChange="togglePaymentFields()"> Net Banking</label><br><br>

        <div id="card_section">
            <h3>Card Details</h3>
            <label>Cardholder Name:</label><br>
            <input type="text" name="card_name"><br><br>

            <label>Card Number:</label><br>
            <input type="text" name="card_number"><br><br>

            <label>Expiry Date (MM/YY):</label><br>
            <input type="text" name="expiry"><br><br>

            <label>CVV:</label><br>
            <input type="text" name="cvv"><br><br>
        </div>

        <div id="paypal_note" style="display:none;">
            <p>You will be redirected to PayPal to complete the payment.Please input your paypal Email Address:</p>
			  <input type="text" name="paypal" ><br>
        </div>

        <div id="upi_section" style="display:none;">
            <h3>UPI Payment</h3>
            <label>Enter UPI ID:</label><br>
            <input type="text" name="upi_id"><br><br>
        </div>

        <div id="netbanking_section" style="display:none;">
            <h3>Net Banking</h3>
            <label>Select Bank:</label><br>
              <label><select name="bank_name">
                <option value="sbi">Housing Finance Bank</option>
                <option value="hdfc">DFCU Bank</option>
                <option value="icici">Stanbic Bank</option>
                <option value="axis">Equity Bank</option>
            </select></label><br>
			 <label>Account Name:</label>
			 <input type="text" name="bank"><br>
        </div>

        <label>Amount ($):</label><br>
        <input type="number" name="amount" step="0.01" required><br><b	 
                        </div>
                    </div>
                        <div class="form-btn">
                        <button class="form-btn btn" type="submit" name="submit">Proceed To Payment</button>
						
                </form>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="footer-content">
            <div class="foot-row">
                <div class="foot-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">What Do we Offer</a></li>
                        <li><a href="#request">Make a Request</a></li>
                        <li><a href="track.php">Track your Request</a></li>
                    </ul>
                </div>
                <div class="foot-column">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#services">Two Wheeler Towing</a></li>
                        <li><a href="#services">Four Wheeler Towing</a></li>
                    </ul>
                </div>
                <div class="foot-column">
                    <h4>Contact Address</h4>
                    <p><b> </b>24/7 Assistance</p>
                    <br>
                    <p>Plot 5/12, 5th Street<br>
                        Industrial Area<br>
                        Kampala, Uganda </p>


                </div>
                <div class="foot-column">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    </div> <br> <br>
                    <p> <b>PHONE:</b>0778431456<br>
                        <b>EMAIL:</b>support@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>