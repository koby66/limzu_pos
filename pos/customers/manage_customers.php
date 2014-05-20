<?php session_start(); ?>
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
<html>
<head>
<SCRIPT LANGUAGE="Javascript">
<!---
function decision(message, url)
{
  if(confirm(message) )
  {
    location.href = url;
  }
}
// --->
</SCRIPT> 

</head>

<body>
<?php

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");
include ("../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Sales Clerk',$lang);

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageCustomers");

$f1=new form('manage_customers.php','POST','customers','450',$cfg_theme,$lang);
$f1->createInputField("<b>$lang->searchForCustomer</b>",'text','search','','24','150');

$option_values2=array('first_name','last_name','account_number','id');
$option_titles2=array("$lang->firstName","$lang->lastName","$lang->accountNumber",'ID');
$f1->createSelectField("<b>$lang->searchBy</b>",'searching_by',$option_values2,$option_titles2,100);


$f1->endForm();


$tableheaders=array("$lang->rowID","$lang->lastName","$lang->firstName","$lang->accountNumber","$lang->phoneNumber","$lang->email","$lang->streetAddress","$lang->commentsOrOther","$lang->updateCustomer","$lang->deleteCustomer");
$tablefields=array('id','last_name','first_name','account_number','phone_number','email','street_address','comments');

if(isset($_POST['search']))
{
	$search=$_POST['search'];
	$searching_by =$_POST['searching_by'];
	echo "<center>$lang->searchedForItem: <b>$search</b> $lang->searchBy <b>$searching_by</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'customers',$tableheaders,$tablefields,"$searching_by","$search",'last_name');
}
else
{
	$display->displayManageTable("$cfg_tableprefix",'customers',$tableheaders,$tablefields,'','','last_name');
}


$dbf->closeDBlink();


?>
</body>
</html>