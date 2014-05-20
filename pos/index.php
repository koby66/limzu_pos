<?php # Script 16.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header:
$page_title = 'Limzu - Point of Sale';
include ('includes/header.php');
?>


	
<?php 
	if ($_SESSION['user_level'] == 0 or 1) {
?>

  <font color="#FFFFFF""><?php echo '<h4>Welcome';
if (isset($_SESSION['first_name'])) {
	echo ", {$_SESSION['first_name']}!";
}
echo '</h4>';
?>
<a href="../logout.php">Logout</font></a></b></br>
  
<h2>|Navigation|</h2></br>  
  <a href="<?php echo "backupDB.php?onlyDB=$cfg_database&StartBackup=complete&nohtml=1"?>" >Backup Database</a><br />
  <a href="sales/sale_ui.php">Process Sale</a><br />
  <a href="users/index.php">Manage Users</a><br />
  <a href="customers/index.php">Manage Customer Accounts</a><br />
  <a href="items/index.php">Manage Items</a><br />
  <a href="reports/index.php">Report Generator</a><br />
  <a href="settings/index.php">Settings</a></p>
</div>

	<div id="content">
<div align="left"><img src="../images/limzupos_logo_small.jpg" align="left">
<font color="#b90404" size="4">POS Home</b></font><br />
<font face="Verdana" size="2"><?php echo 'Welcome to the ';
if (isset($_SESSION['business'])) {
	echo "{$_SESSION['business']}";
}
echo ' POS homepage!';
?></font></p>

<center><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" 

bordercolor="#111111" width="550" id="AutoNumber1">
  <tr>
  <td><a class="without_u" href="customers/index.php"><img class="without_u" src="images/customers.jpg" alt="Customer Management" border=0/></a></td>
  <td><a class="without_u" href="items/index.php"><img class="without_u" src="images/items.jpg" alt="Items Management" border=0/></a></td>
  <td><a class="without_u" href="employees/index.php"><img class="without_u" src="images/employees.jpg" alt="Employees Management" border=0/></a></td>
  </tr>
  <tr>
  <td><a class="without_u" href="sales/index.php"><img class="without_u" src="images/sales.jpg" alt="Review Sales" border=0/></a></td>
  <td><a class="without_u" href="reports/index.php"><img class="without_u" src="images/reports.jpg" alt="Report Generator" border=0/></a></td>
  <td><a class="without_u" href="settings/index.php"><img class="without_u" src="images/config.jpg" alt="Configure Settings" border=0/></a></td>
  </tr>
  <tr>
  <td><a class="without_u" href="apps/index.php"><img class="without_u" src="images/apps.jpg" alt="Applications" border=0/></a></td>
  <td><a class="without_u" href="../logout.php"><img class="without_u" src="images/logout.jpg" alt="Logout of Limzu" border=0/></a></td>
  <td></td>
  </tr>
</table>
</center>
     
<?php } elseif($_SESSION['user_level'] == 2) { ?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" 

bordercolor="#111111" width="95%" id="AutoNumber1">
  <tr>
    <td width="100%"><font face="Verdana" size="4" color="#336699"><?php echo "$name 
    $lang->home" ?></font></td>
  </tr>
</table>
<p><font face="Verdana" size="2"><?php echo "$lang->welcomeTo $cfg_company $lang->salesClerkHomeWelcomeMessage"; ?><br  />

<?php
}
else
{
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" 

bordercolor="#111111" width="95%" id="AutoNumber1">
  <tr>
    <td width="100%"><font face="Verdana" size="4" color="#336699"><?php echo "$name 
    $lang->home"?></font></td>
  </tr>
</table>

<?php // Flush the buffered output.
}
ob_end_flush();
?>