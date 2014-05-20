<?php # Script 16.1 - header.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'User Registration';
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $page_title; ?></title>
    
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<script type="text/javascript" src="includes/ajaxtabs.js"></script>
    
<script type="text/javascript" src="css/anylinkcssmenu.js"></script>

<script type="text/javascript">

//anylinkcssmenu.init("menu_anchors_class") ////Pass in the CSS class of anchor links (that contain a sub menu)
anylinkcssmenu.init("anchorclass")
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11156935-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("a#panel").click(function(event){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});
</script>

<link rel="stylesheet" type="text/css" href="css/ajaxtabs.css" />
<link rel="stylesheet" type="text/css" href="css/anylinkcssmenu.css" />    
<style type="text/css" media="screen">@import "css/1.css";</style>
</head>
<body>

	<div id="header">
	<ul id="nav">
			
			<li></li>
			<li class="right"><a class="without_u" href="index2.php"><img class="without_u" src="images/limzulogosmall.jpg" border=0 /></a></li>
			
			<li><a href="pos/index.php">Point of Sale</a></li>
			
			<li><a href="sales/index.php">Sales Manager</a></li>
			
			<li><a href="blog/index.php">Blog</a></li>
			
			<li><a href="about.php">About Us</a></li>
            
            <li><a href="more.php" class="anchorclass" rel="submenu1">More</a></p>
                                                 
				<div id="submenu1" class="anylinkcss">
				<ul>
				<li><a href="/advertise/index.php">Advertise</a></li>
                <li><a href="/developer/index.php">Developer</a></li>
                <li><a href="/communicate/index.php">Communicate</a></li>
				<li><a href="/contact.php">Contact Us</a></li>
				</ul>
				</div></li>
	
	</ul>	

	
</div>	
	
	<div class="clear" />
	
	<div id="sidebar">
	&nbsp;<br />
			<a href="index2.php" title="Control Panel Home Page">Control Panel Home</a><br />
            <a href="pos/index.php" title="Point of Sale Home Page">Point of Sale Home</a><br />
<?php # Script 16.2
// Display links based upon the login status:
if (isset($_SESSION['id'])) {

	echo '<a href="logout.php" title="Logout">Logout</a><br />
<a href="change_password.php" title="Change Your Password">Change Password</a><br />
<a href="settings.php" title="Change Account Settings">Settings/Security</a><br />

';

	// Add links if the user is an administrator:
	if ($_SESSION['user_level'] == 0) {

		echo '<br /><h4>Administrator</h4>';
		echo '<a href="view_users.php" title="View Users">View Users</a><br />
        <a href="blog/wp-admin/index.php" title="Edit Blog">Edit Blog</a><br />

';

	}
	
} else { //  Not logged in.

	echo '<a href="register.php" title="Register for the Site">Register</a><br />
<a href="login.php" title="Login">Login</a><br />
<a href="forgot_password.php" title="Password Retrieval">Retrieve Password</a><br />
';

}
?>
											
	&nbsp;<br />
	</div>
	
	<div id="content">
<!-- End of Header -->
