<?php # Script 16.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require_once ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Limzu';
include ('includes/header.php');
?>

<div id="settingstabs" class="modernbricksmenu2">
<ul>
<li><a href="settings/personal.php" rel="settingsdivcontainer" class="selected">Personal</a></li>
<li><a href="settings/rednotes.php" rel="settingsdivcontainer">Red Notes</a></li>
<li><a href="settings/pos.php" rel="settingsdivcontainer">Point of Sale</a></li>
<li><a href="settings/security.php" rel="settingsdivcontainer">Security</a></li>
<li><a href="settings/other.php" rel="settingsdivcontainer">Other</a></li>
</ul>
</div>
<br style="clear: left" />
<div id="settingsdivcontainer" style="border:1px solid gray; width:95%; height: 200px; background-color: white; padding: 5px">
</div>
<script type="text/javascript">

var mysettings=new ddajaxtabs("settingstabs", "settingsdivcontainer")
mysettings.setpersist(true)
mysettings.setselectedClassTarget("link") //"link" or "linkparent"
mysettings.init()

</script>