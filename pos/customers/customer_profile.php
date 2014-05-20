<?php # Script 9.3 - edit_user.php

// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Customer Profile';
require_once ('../includes/config.inc.php'); 
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
    <img border="0" src="../images/custprofile.jpg" alt="Customer Profile" valign='top'><br />&nbsp;<br />
<?php

require_once ('../../mysqli_connect.php'); 
	
	$id = $_GET['id'];
	
// Retrieve the user's information:
$q = "SELECT * FROM customers WHERE id = '$id'";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

echo '
	<form class="niceform">
	<fieldset>
    	<legend>Personal Info</legend>
		<dl>
        	<dt><label for="account_number">Account Number:</label></dt>
            <dd> ' . $row['account_number'] . '
        </dl>
		<dl>
        	<dt><label for="first_name">First Name:</label></dt>
            <dd> ' . $row['first_name'] . '
        </dl>
		<dl>
        	<dt><label for="last_name">Last Name:</label></dt>
            <dd> ' . $row['last_name'] . '
        </dl>
		<dl>
        	<dt><label for="business_name">Business Name:</label></dt>
            <dd> ' . $row['business_name'] . '
        </dl>
		<dl>
        	<dt><label for="position">Position:</label></dt>
            <dd> ' . $row['position'] . '
        </dl>
		<dl>
        	<dt><label for="dob">Date of Birth:</label></dt>
            <dd> ' . $row['dobMonth'] . ' / ' . $row['dobDay'] . ' / ' . $row['dobYear'] . '
        </dl>
	</fieldset>
    <fieldset>
    	<legend>Contact Info</legend>
		<dl>
        	<dt><label for="street_addresss">Street Address:</label></dt>
            <dd> ' . $row['street_address'] . ' 
        </dl>
		<dl>
        	<dt><label for="city">City:</label></dt>
            <dd> ' . $row['city'] . '
        </dl>
		<dl>
        	<dt><label for="state">State:</label></dt>
            <dd> ' . $row['state'] . '
        </dl>
		<dl>
        	<dt><label for="zip_code">Zip Code:</label></dt>
            <dd> ' . $row['zip'] . ' 
        </dl>
		<dl>
        	<dt><label for="email">Email Address:</label></dt>
            <dd> ' . $row['email'] . '
        </dl>
		<dl>
        	<dt><label for="phone_number">Phone Number:</label></dt>
            <dd> ' . $row['phone_number'] . ' 
        </dl>
	</fieldset>
	<fieldset>
    	<legend>Other</legend>
		<dl>
        	<dt><label for="comments">Comments:</label></dt>
            <dd> ' . $row['comments'] . ' 
        </dl>
		<dl>
        	<dt><label for="date_added">Date Added:</label></dt>
            <dd> ' . $row['date_added'] . ' 
        </dl>
		<dl>
        	<dt><label for="barcode">Account Number Barcode:</label></dt>
            <dd> ';
			echo "<img src='../classes/barcode.php?barcode=$row[account_number]&width=227&text=*$row[account_number]*'> 
        </dl>
	</fieldset>";
	
} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
?>