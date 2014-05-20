<?php session_start(); ?>

<?php # Script 16.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header:
$page_title = 'Limzu - Point of Sale';
include ('../../includes/header.php');
?>
<h2>|Navigation|</h2><br />
<a href="/pos/index.php">Point of Sale Home</a><br />
<a href="../index.php">Items Home</a><br />
<hr width=200  />
<a href="../form_items.php?action=insert">Create a New Item</a><br />
<a href="../discounts/form_discounts.php?action=insert">Discount an item</a><br />
<a href="../discounts/manage_discounts.php">Manage Discounts</a><br />
<hr width=200 />
<a href="../manage_items.php">Manage Items</a><br />
<a href="../items_barcode.php">Items Barcode Sheet</a><br />
<hr width=200  />
<a href="../brands/form_brands.php?action=insert">Create a New Brand</a><br  />
<a href="../brands/manage_brands.php">Manage Brands</a><br />
<hr width=200  />
<a href="../categories/form_categories.php?action=insert">Create a New Category</a><br  />
<a href="../categories/manage_categories.php">Manage Categories</a><br />
<hr width=200  />
<a href="../suppliers/form_suppliers.php?action=insert">Create a New Supplier</a><br  />
<a href="../suppliers/manage_suppliers.php">Manage Suppliers</a><p>
<center>
<a href="/advertise/index.php"><img src="/images/advertisebanner.jpg"></a></center><p>
</div>	
	<div id="content">
<?php

include ("../../settings.php");
include ("../../language/$cfg_language");
include ("../../classes/db_functions.php");
include ("../../classes/security_functions.php");

//creates 2 objects needed for this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);

//checks if user is logged in.
if(!$sec->isLoggedIn())
{
	header ("location: ../../login.php");
	exit ();
}

//variables needed globably in this file.
$tablename="$cfg_tableprefix".'suppliers';
$field_names=null;
$field_data=null;
$id=-1;



	//checks to see if action is delete and an ID is specified. (only delete uses $_GET.)
	if(isset($_GET['action']) and isset($_GET['id']))
	{
		$action=$_GET['action'];
		$id=$_GET['id'];
	}
	//checks to make sure data is comming from form ($action is either delete or update)
	elseif(isset($_POST['supplier']) and isset($_POST['address']) and isset($_POST['phone_number']) and isset($_POST['contact']) and isset($_POST['email']) and isset($_POST['other']) and isset($_POST['id']) and isset($_POST['action']) )
	{
		
		$action=$_POST['action'];
		$id = $_POST['id'];
		
		//gets variables entered by user.
		$supplier = $_POST['supplier'];
		$address = $_POST['address'];
		$phone_number=$_POST['phone_number'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$other = $_POST['other'];
	
		
		//insure all fields are filled in.
		if($supplier=='' or $address=='' or $phone_number=='' or $contact==='')
		{
			echo "$lang->forgottenFields";
			exit();
		}
		else
		{
			$field_names=array('supplier','address','phone_number','contact','email','other');
			$field_data=array("$supplier","$address","$phone_number","$contact","$email","$other");	
	
		}
		
	}
	else
	{
		//outputs error message because user did not use form to fill out data.
		echo "$lang->mustUseForm";
		exit();
	}
	


switch ($action)
{
	//finds out what action needs to be taken and preforms it by calling methods from dbf class.
	case $action=="insert":
		$dbf->insert($field_names,$field_data,$tablename,true);

	break;
		
	case $action=="update":
		$dbf->update($field_names,$field_data,$tablename,$id,true);
				
	break;
	
	case $action=="delete":
		$dbf->deleteRow($tablename,$id);
	
	break;
	
	default:
		echo "$lang->noActionSpecified";
	break;
}
$dbf->closeDBlink();

?>
<br>
<a href="manage_suppliers.php"><?php echo $lang->manageSuppliers ?>--></a>
<br>
<a href="form_suppliers.php?action=insert"><?php echo $lang->createSupplier ?>--></a>
</body>
</html>