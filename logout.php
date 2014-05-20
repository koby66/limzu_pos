<?php
require('blog/wp-blog-header.php');
include ('includes/form_process.php');
?>
<?php # Script 16.9 - logout.php
// This is the logout page for the site.

require_once ('includes/config.inc.php'); 
$page_title = 'Logout';
include ('includes/header2.php');

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['first_name'])) {

	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-300); // Destroy the cookie.

}

// Print a customized message:
echo '<h3>You are now logged out.</h3>';

?>
<a href="/index.php">Go To Limzu Homepage...</a>
	</div>

</body>
</html>
<?php // Flush the buffered output.
ob_end_flush();
?>