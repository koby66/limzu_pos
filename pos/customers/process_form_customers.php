<?php
# Script 16.6 - register.php
// This is the registration page for the site.

require_once ('../includes/config.inc.php');
$page_title = 'Limzu - Point of Sale';
include ('../includes/header.php');
?>
	&nbsp;<br />
	<a href="/pos/index.php">Point of Sale Home</a><br />
	<a href="index.php">Customer Home</a><br />
	<a href="form_customers.php">Create A New Customer</a><br />
	<a href="manage_customers.php">Manage Customers</a><br />
	<a href="customers_barcode.php">Customers Barcode Sheet</a><br />
	<p><center><a href="/advertise/index.php"><img src="/images/advertisebanner.jpg"></a></center><p>
    &nbsp;<br />
		</div>	
				<div id="content">
<?php

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

if (isset($_POST['submitted'])) {
	require_once (MYSQL);
	
	// Trim all the incoming data:
//	$trimmed = array_map('trim', $_POST);
	
	//Retrieve company code from users table
//	$useremail = isset($_SESSION['email'])
//	$query  = "SELECT companycode FROM users WHERE email = '$useremail'";
//	$result = mysql_query($query);
	
	//gets variables entered by user.
	$fn = $_POST['first_name'];
	$ln = $_POST['last_name'];
	$bn = $_POST['business_name'];
	$ps = $_POST['position'];
	$e = $_POST['email'];
	$dobm = $_POST['dobMonth'];
	$dobd = $_POST['dobDay'];
	$doby = $_POST['dobYear'];
	$sadd = $_POST['street_address'];
	$cty = $_POST['city'];
	$ste = $_POST['state'];
	$zip = $_POST['zip'];
	$pn = $_POST['phone_number'];
	$an = $_POST['account_number'];
	$comments = $_POST['comments'];
	$compc = $_SESSION['companycode'];

	//Create random id for picture file
	$c = uniqid (rand (),true);

	//This is the directory where images will be saved 
	$target = "../images/user/customer/"; 
	$target = $target . basename( $_FILES['photo']['name']); 

	// Assume invalid values:
//	$fn = $ln = $e = $an = FALSE;
	
	// Check for a first name:
//	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
//		$fn = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
//	} else {
//		echo '<p class="error">Please enter your first name!</p>';
//	}
	
	// Check for a last name:
//	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
//		$ln = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
//	} else {
//		echo '<p class="error">Please enter your last name!</p>';
//	}
	
	// Check for an account number:
//	if (preg_match ('/^[A-Z 0-9 \'.-]{2,40}$/i', $trimmed['account_number'])) {
//		$an = mysqli_real_escape_string ($dbc, $trimmed['account_number']);
//	} else {
//		echo '<p class="error">Please enter an account number!</p>';
//	}
	
//	if ($fn && $ln && $an) { // If everything's OK...

		// Make sure the email address is available:
//		$q = "SELECT id FROM customers WHERE email='$e'";
//		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
//		if (mysqli_num_rows($r) == 0) { // Available.
		
			// Add the customer to the database:
			$q = "INSERT INTO customers (email, first_name, last_name, business_name, position, dobMonth, dobDay, dobYear, street_address, city, state, zip, phone_number, account_number, comments, date_added, companycode) VALUES ('$e', '$fn', '$ln', '$bn', '$ps', '$dobm', '$dobd', '$doby','$sadd','$cty','$ste','$zip', '$pn', '$an','$comments', NOW(), '$compc' )";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
				if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				
				// Finish the page:
				echo '
					<center><h3>The customer has been added!</h3><br>
					<h4>What would you like to do?</h4><br>
					<a href="index.php">Customer Account Home</a>
					<br>
					<a href="manage_customers.php">Manage Customers</a>
					<br>
					<a href="form_customers.php?action=insert">Add New Customer</a></h3>';
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<p class="error">We could not add the customer due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} 
//else { // The email address is not available.
//			echo '<p class="error">That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
//		}
		
//	} else { // If one of the data tests failed.
//		echo '<p class="error">Please re-enter your passwords and try again.</p>';
//	}

	mysqli_close($dbc);
 // End of the main Submit conditional.
?>