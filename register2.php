<?php
require_once('includes/recaptchalib.php');
$privatekey = "6Ld-KwkAAAAAALhUG-TLJp1L2vmQ40C3pYKbVvIv";
$resp = recaptcha_check_answer ($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
"(reCAPTCHA said: " . $resp->error . ")");
}
?>
<?php
# Script 16.6 - register.php
// This is the registration page for the site.

require('blog/wp-blog-header.php');
require_once ('includes/config.inc.php');
$page_title = 'Register';
include ('includes/header2.php');
								
if (isset($_POST['submitted'])) { // Handle the form.

	require_once (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	// Assume invalid values:
	$fn = $ln = $e = $b = $cc = $p = FALSE;
	
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
		$fn = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
	} else {
		echo '<p class="error">Please enter your first name!</p>';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
		$ln = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
	} else {
		echo '<p class="error">Please enter your last name!</p>';
	}
	
	// Check for an email address:
	if (preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $trimmed['email'])) {
		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	
	// Check for a business name:
	if (preg_match ('/^[A-Z 0-9 .\'-\s]{2,40}$/i', stripslashes($trimmed['business']))) {
		$b = mysqli_real_escape_string ($dbc, stripslashes($trimmed['business']));
	} elseif (preg_match ('/^[A-Z 0-9 .\'-\s]{2,40}$/i', stripslashes($trimmed['companycode']))) {
		$cc = mysqli_real_escape_string ($dbc, stripslashes($trimmed['companycode']));
	} else {
		echo '<p class="error">Please enter your business name or company code!</p>';
	}

	// Check for a password and match against the confirmed password:
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	//Generate company code
	if ($cc == ""){
		function random_string( )
  		{
	    $character_set_array = array( );
	    $character_set_array[ ] = array( 'count' => 4, 'characters' => 'a-z' );
	    $character_set_array[ ] = array( 'count' => 3, 'characters' => '0-9' );
		$character_set_array[ ] = array( 'count' => 3, 'characters' => 'A-Z' );
	    $temp_array = array( );
	    foreach ( $character_set_array as $character_set )
	    {
	      for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
	      {
	        $temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
	      }
	    }
	    shuffle( $temp_array );
	    return implode( '', $temp_array );
		}
		} else {
			echo '<p class="error">Problem with code generation!</p>';
	}
	
	if ($fn && $ln && $e && $b or $cc && $p) { // If everything's OK...

		// Make sure the email address is available:
		$q = "SELECT id FROM users WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 0) { // Available.
		
			// Create the activation code:
			$a = md5(uniqid(rand(), true));
		
			// Add the user to the database:
			$q = "INSERT INTO users (email, password, first_name, last_name, business, active, registration_date) VALUES ('$e', SHA1('$p'), '$fn', '$ln', '$b', '$a', NOW() )";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
				// Send the email:
				$body = "Thank you for registering at Limzu. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: webmaster@limzu.x10hosting.com');
				
				// Finish the page:
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
		}
		
	} else { // If one of the data tests failed.
		echo '<p class="error">Please re-enter your passwords and try again.</p>';
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
?>

