<?php session_start(); ?>

<?php # Script 16.5 - index.php
// This is the main page for the site.

// Set the page title and include the HTML header:
$page_title = 'Limzu - Point of Sale';
include ('../includes/header.php');
?>
<h2>|Navigation|</h2><br />
<a href="/pos/index.php">Point of Sale Home</a><br />
<a href="index.php">Items Home</a><br />
<hr width=200  />
<a href="form_items.php?action=insert">Create a New Item</a><br />
<a href="discounts/form_discounts.php?action=insert">Discount an item</a><br />
<a href="discounts/manage_discounts.php">Manage Discounts</a><br />
<hr width=200 />
<a href="manage_items.php">Manage Items</a><br />
<a href="items_barcode.php">Items Barcode Sheet</a><br />
<hr width=200  />
<a href="brands/form_brands.php?action=insert">Create a New Brand</a><br  />
<a href="brands/manage_brands.php">Manage Brands</a><br />
<hr width=200  />
<a href="categories/form_categories.php?action=insert">Create a New Category</a><br  />
<a href="categories/manage_categories.php">Manage Categories</a><br />
<hr width=200  />
<a href="suppliers/form_suppliers.php?action=insert">Create a New Supplier</a><br  />
<a href="suppliers/manage_suppliers.php">Manage Suppliers</a><p>
<center>
<a href="/advertise/index.php"><img src="/images/advertisebanner.jpg"></a></center><p>
</div>	
	<div id="content">
<?php

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");

//creates 3 objects needed for this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);

//checks if user is logged in.
if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit ();
}

//variables needed globably in this file.
$tablename="$cfg_tableprefix".'items';
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
	elseif(isset($_POST['item_name']) and isset($_POST['description']) and isset($_POST['item_number']) and isset($_POST['brand_id']) 
	and isset($_POST['category_id']) and isset($_POST['supplier_id']) and isset($_POST['buy_price']) and isset($_POST['unit_price']) and isset($_POST['tax_percent']) 
	and isset($_POST['supplier_catalogue_number']) and isset($_POST['quantity']) and isset($_POST['id']) and isset($_POST['action']) )
	{
		
		$action=$_POST['action'];
		$id = $_POST['id'];
		
		//gets variables entered by user.
		$item_name = $_POST['item_name'];
		$description = $_POST['description'];
		$item_number = $_POST['item_number'];
		$brand_id = $_POST['brand_id'];
		$category_id = $_POST['category_id'];
		$supplier_id = $_POST['supplier_id'];
		$buy_price = number_format($_POST['buy_price'],2,'.', '');
		$unit_price = number_format($_POST['unit_price'],2,'.', '');
		$tax_percent = $_POST['tax_percent'];
		$supplier_catalogue_number = $_POST['supplier_catalogue_number'];
		$quantity = $_POST['quantity'];
		$reorder_level= $_POST['reorder_level'];
		
		//insure all fields are filled in.
		if($item_name=='' or $brand_id=='' or $category_id=='' or $supplier_id=='' or $buy_price=='' or $unit_price=='' or $tax_percent=='' or $quantity=='' or $reorder_level=='' )
		{
			echo "$lang->forgottenFields";
			exit();
		}
		elseif( (!is_numeric($buy_price)) or (!is_numeric($unit_price)) or (!is_numeric($tax_percent)) or (!is_numeric($quantity))  or (!is_numeric($reorder_level)))
		{
			echo "$lang->mustEnterNumeric";
			exit();
		}
		else
		{
			$total_cost = number_format($unit_price*(1+($tax_percent/100)),2,'.', ''); 
			$field_names=array('item_name','description','item_number','brand_id','category_id','supplier_id','buy_price','unit_price','tax_percent','supplier_catalogue_number','total_cost','quantity','reorder_level');
			$field_data=array("$item_name","$description","$item_number","$brand_id","$category_id","$supplier_id","$buy_price","$unit_price","$tax_percent","$supplier_catalogue_number","$total_cost","$quantity","$reorder_level");	
	
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
		echo "lang->noActionSpecified";
	break;
}
$dbf->closeDBlink();

?>
<br>
<a href="manage_items.php"><?php echo $lang->manageItems ?>--></a>
<br>
<a href="form_items.php?action=insert"><?php echo $lang->createNewItem ?>--></a>
</body>
</html>