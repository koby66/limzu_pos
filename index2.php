<?php # Script 16.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require_once ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Limzu';
include ('includes/header.php');

// Welcome the user (by name if they are logged in):
echo '<h1>Welcome';
if (isset($_SESSION['first_name'])) {
	echo ", {$_SESSION['first_name']}!";
}
echo '</h1>';
?>
<p>
<a id="panel" class="open"><img src="images/icon_toolbox.jpg" align="right" border=0></a>
<img src="images/rednotes.jpg" hspace="5"/>&nbsp;&nbsp;&nbsp;<font size="-6"><a href="/help/rednotes.php">What are Red Notes?</a></font><br />

<div class="panel">
	<a id="panel" class="open">X Close</a><br />
	<h3>Sliding Panel</h3>
	<p>Here's our sliding panel/drawer made using jQuery with the toggle function and some CSS3 for the rounded corners</p>
	<p>This panel could also be placed on the right. This could be particularly useful if, <a href="http://spyrestudios.com" title="SpyreStudios">like me</a>, you have a left-aligned website layout.</p>

	<h3>A Little Something About Me</h3>
	<p>My name's Jon, I'm a freelance designer, blogger, musician. I run SpyreStudios and I specialize in WordPress blogs, CSS, XHTML and PHP</p>

</div>
