<?php # Script 16.1 - header2.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'User Registration';    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $page_title; ?></title>

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<script type="text/javascript" src="css/anylinkcssmenu.js">

</script>

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

<script src="includes/FormManager.js">
</script>

<script type="text/javascript">
window.onload = function() {
    setupDependencies('useroptions'); //name of form(s). Seperate each with a comma (ie: 'weboptions', 'myotherform' )
  };
</script>

<link rel="stylesheet" type="text/css" href="css/anylinkcssmenu.css" />    
<style type="text/css" media="screen">@import "css/1.css";</style>
</head>
<body>

	<div id="header">
	<ul id="nav">
			
			<li></li>
			<li class="right"><a href="index.php"><img src="images/limzulogosmall.jpg"></a></li>
			
			<li><?php
			// Display login or logout link on any page based on login status
			if (isset($_SESSION['user_id'])) {

			echo '<a href="index2.php" title="User control panel">User Home</a><br />';
	
			} else { //  Not logged in.

			echo '<a href="register.php" title="Register for Limzu now!">Register Now</a><br />';

			}
			?></li>
            
			<li><a href="pos/index.php">Point of Sale</a></li>
			
			<li><a href="sales/index.php">Sales Manager</a></li>
			
			<li><a href="blog/index.php">Blog</a></li>
			
            <li><a href="more.php" class="anchorclass" rel="submenu1">More</a></p>
                                                 
				<div id="submenu1" class="anylinkcss">
				<ul>
				<li><a href="/advertise/index.php">Advertise</a></li>
                <li><a href="/developer/index.php">Developer</a></li>
                <li><a href="/communicate/index.php">Communicate</a></li>
				<li><a href="/about.php">About Us</a></li>
                <li><a href="/contact.php">Contact Us</a></li>
				</ul>
				</div></li>
	
	</ul>	

	
</div>	
	
	<div class="clear" />
	
	<div id="sidebar">
	
			<h2><a href="blog/index.php">Blog Updates</a></h2>
			<?php
			require('blog/wp-blog-header.php');
			?>

			<?php query_posts('showposts=3'); ?>
			<?php while (have_posts()) : the_post(); ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?>
            </a>
            <?php the_date('','',''); ?>
			<?php the_content(__('(more...)')); ?></a><br />
			<?php endwhile;?>			
	</div>
	
	<div id="content">
<!-- End of Header -->
