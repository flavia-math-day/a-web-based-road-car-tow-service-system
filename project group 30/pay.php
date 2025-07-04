  <?php
session_start(); // Important for using $_SESSION
$host = 'localhost';       // or your DB host
$dbname = 'vehassitancemsdb'; // replace with your DB name
$username = 'root';   // your DB username
$password = '';   // your DB password

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Sanitize and validate inputs
	$name = $_POST['name'];
    $paymentMethod = $_POST['payment_method'];
    $pickuploc = trim($_POST['pickuploc']);
    $destination = trim($_POST['destination']);
    $phone = trim($_POST['phone']);
    $servicetype = trim($_POST['servicetype']);
    $pickuptime = trim($_POST['pickuptime']);
	$pay = trim($_POST['amount']);

    // Basic validations
    if (empty($name) ||  empty($phone)  || empty($destination) || empty($servicetype) || empty($pickuptime)) {
        echo '<script>alert("Please fill in all required fields.");</script>';
        exit;
    }

     

    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        echo '<script>alert("Invalid phone number.");</script>';
        exit;
    }

    try {
        // Generate booking number
        $bookingnumber = mt_rand(100000000, 999999999);

        // SQL insertion using PDO
        $sql = "INSERT INTO tblbook (BookingNumber, Name, PhoneNumber, Destination, ServiceType, PickupTime,PickupLoc,pay)
                VALUES (:bookingnumber, :name, :phone, :destination, :servicetype, :pickuptime,:pickuploc,:pay)";
        
        $query = $dbh->prepare($sql);
         
		
		
		
		
		$query->bindParam(':bookingnumber', $bookingnumber, PDO::PARAM_STR);
$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':destination', $destination, PDO::PARAM_STR);
$query->bindParam(':servicetype', $servicetype, PDO::PARAM_STR);
$query->bindParam(':pickuptime', $pickuptime, PDO::PARAM_STR);
$query->bindParam(':pickuploc', $pickuploc, PDO::PARAM_STR);
$query->bindParam(':pay', $pay, PDO::PARAM_STR);  // Corrected this line
$query->execute();

        $_SESSION['bookingnumber'] = $bookingnumber;

        if ($dbh->lastInsertId()) {
            echo '<script>alert("Your request has been submitted successfully. Booking Number: ' . $bookingnumber . '");</script>';
               // header("Location: index.php"); 
            
        } else {
            echo '<script>alert("Something went wrong. Please try again.");</script>';
        }
    } catch (PDOException $e) {
        echo '<script>alert("Database error: ' . $e->getMessage() . '");</script>';
    }
}
?>
 