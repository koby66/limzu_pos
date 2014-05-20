<?php
require('blog/wp-blog-header.php');
include ('includes/form_process.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Limzu</title>
<meta name="google-site-verification" content="AHM0HHPCxZ92gwTB_ijswMNSVfjuS96SF8qtZ1sqBuU" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="css/anylinkcssmenu.css" />

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

<link rel="stylesheet" href="css/1.css" type="text/css" media="screen,projection" />

</head>
 
<body>

	<div id="header">
	<ul id="nav">
			
			<li class="right"><?php
			// Display login or logout link on any page based on login status
			if (isset($_SESSION['user_id'])) {

			echo '<a href="logout.php" title="Logout">Logout</a><br />';
	
			} else { //  Not logged in.

			echo '<a href="login.php" title="Login">Login</a><br />';

			}
			?></li>
			
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
				<li><a href="about.php">About Us</a></li>
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
	<center><img src="images/limzulogo.jpg"></center>
			
	</div>

</body>
</html>
<?php // Flush the buffered output.
ob_end_flush();
?>