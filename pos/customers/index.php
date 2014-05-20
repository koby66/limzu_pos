<?php # Script 16.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header:
$page_title = 'Limzu - Point of Sale';
include ('http://rodswelding.com/limzu/pos/includes/header.php');
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
 
<table border="0" width="98%">
  <tr>
    <td><img border="0" src="../images/customer_small.jpg" width="40" height="40" valign='top'><font color='#b90404' size='4'>&nbsp;<b>Customers</b></font><br>
      <br>
      <font face="Verdana" size="2">Welcome to the Customers panel! Here you can manage your customers database. You must add one customer before you can process a sale. What would you like to do?</font>
    </td>
  </tr>
<center><table width="95%" border="0" cellspacing="0" cellpadding="0" class="navigation">
  <tr>
    <td>
    <center><a class="without_u" href="form_customers.php?action=insert" style="text-decoration:none"><img class="without_u" src="../../images/icon_newcustomer.jpg" border=0/></a></center></td>
    <td>
    <center><a class="without_u" href="customers_barcode.php" style="text-decoration:none"><img class="without_u" src="../../images/icon_barcodesheet.jpg" border=0/></a></center></td>
    <td>
    <center><img class="without_u" src="../../images/icon_toolbox.jpg" border=0/></center></td>
  </tr>
</table></center>
</table><br />
<?php
require_once ('../../mysqli_connect.php');

$compcode = $_SESSION['companycode'];
$query = "SELECT * FROM customers WHERE companycode = '$compcode'";
$result = @mysqli_query($dbc,$query);

// Table header:
echo '<center><table cellspacing="1" cellpadding="2" width="95%" id="myTable" class="datatables">
		<thead>
		<tr class="datatables">
			<th axis="number" class="datatables" align="left">Account Number</td>
			<th axis="string" class="datatables" align="left">First Name</td>
			<th axis="string" class="datatables" align="left">Last Name</td>
			<th axis="string" class="datatables" align="left">Business Name</td>
			<th axis="string" class="datatables" align="left">Position</td>
			<th axis="string" class="datatables" align="left">Street Address</td>
			<th axis="string" class="datatables" align="left">City</td>
			<th axis="string" class="datatables" align="left">State</td>
			<th axis="number" class="datatables" align="left">Zip</td>
			<th axis="number" class="datatables" align="left">Phone Number</td>
			<th axis="date" class="datatables" align="left">Date Added</td>
		</thead>
		</tr>
		<tbody>
';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '
		<tr class="datatables">
		<td class="datatables" align="left"><a href="customer_profile.php?id=' . $row['id'] . '">' . $row['account_number'] . '</td>
		<td class="datatables" align="left">' . $row['first_name'] . '</td>
		<td class="datatables" align="left">' . $row['last_name'] . '</td>
		<td class="datatables" align="left">' . $row['business_name'] . '</td>
		<td class="datatables" align="left">' . $row['position'] . '</td>
		<td class="datatables" align="left">' . $row['street_address'] . '</td>
		<td class="datatables" align="left">' . $row['city'] . '</td>
		<td class="datatables" align="left">' . $row['state'] . '</td>
		<td class="datatables" align="left">' . $row['zip'] . '</td>
		<td class="datatables" align="left">' . $row['phone_number'] . '</td>
		<td class="datatables" align="left">' . $row['date_added'] . '</td>
		</tr>
	';}
	echo '
	</tbody></table></center>';
?>
		<script type="text/javascript"> 
			var myTable = {};
			window.addEvent('domready', function(){
				myTable = new sortableTable('myTable', {overCls: 'over', onClick: function(){alert(this.id)}});
			});
		</script>
</body>
</html>
