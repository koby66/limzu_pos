<?php 
require_once ('includes/config.inc.php'); 

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['first_name'])) {
	
	$url = BASE_URL . '../index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
}
?>

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
    
<link rel="shortcut icon" href="http://rodswelding.com/limzu/pos/images/favicon.ico" type="image/x-icon" />    
     
<script type="text/javascript" src="http://rodswelding.com/limzu/css/anylinkcssmenu.js"></script>
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

<script language="javascript" type="text/javascript" src="http://rodswelding.com/includes/niceforms.js"></script>

<script type="text/javascript" src="http://rodswelding.com/limzu/includes/mootools.js"></script> 
<script type="text/javascript" src="http://rodswelding.com/limzu/includes/sortableTable.js"></script> 

<link rel="stylesheet" type="text/css" href="http://rodswelding.com/limzu/css/anylinkcssmenu.css" /> 
<link rel="stylesheet" type="text/css" href="http://rodswelding.com/limzu/css/niceforms-default.css" />
<link rel="stylesheet" type="text/css" href="http://rodswelding.com/limzu/css/sortableTable.css" />    
<style type="text/css" media="screen">@import "http://rodswelding.com/limzu/css/1.css";</style>
</head>
<body>

	<div id="header">
	<ul id="nav">
			
			<li></li>
			<li class="right"><a class="without_u" href="/index2.php"><img class="without_u" src="http://rodswelding.com/limzu/pos/images/limzulogosmall.jpg" border=0></a></li>
			
			<li><a href="/pos/index.php">Point of Sale</a></li>
			
			<li><a href="/sales/index.php">Sales Manager</a></li>
			
			<li><a href="/blog/index.php">Blog</a></li>
			
			<li><a href="/about.php">About Us</a></li>

            <li><a href="/more.php" class="anchorclass" rel="submenu1">More</a></p>
                                                 
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
			
<!-- End of Header -->
