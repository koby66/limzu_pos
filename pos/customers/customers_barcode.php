<?php # Script 16.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header:
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

require_once ('../includes/config.inc.php');
require_once ('../../mysqli_connect.php'); 

if(isset($_GET['generateWith']))
{
	$generateWith=$_GET['generateWith'];
}
else
{
	$generateWith='account_number';
}

echo "<a href='customers_barcode.php?generateWith=account_number'>Account Number</a> / <a href='customers_barcode.php?generateWith=id'>id</a>";

$compcode = $_SESSION['companycode'];
$query = "SELECT * FROM customers WHERE companycode = '$compcode' ORDER by last_name";
$result = @mysqli_query($dbc,$query);

echo '<table border=0 width=85% align=center cellspacing=5 cellpadding=8>

<tr>';

$counter=0;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	if($counter%3==0)
	{
		echo '</tr><tr>';
	}
	echo "<td align='center'>$row[last_name], $row[first_name]<br /><img src='../classes/barcode.php?barcode=$row[$generateWith]&width=200&text=*$row[$generateWith]*'></td>";
	$counter++;
	
}

echo '</tr></table>';


?>
