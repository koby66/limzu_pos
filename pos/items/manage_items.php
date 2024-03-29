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
$sec=new security_functions($dbf,'Admin',$lang);


if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageItems");

$f1=new form('manage_items.php','POST','items','400',$cfg_theme,$lang);

$f1->createInputField("<b>$lang->searchForItemBy</b>",'text','search','','24','150');

$option_values2=array('item_name','item_number','id','quantity','supplier_catalogue_number');
$option_titles2=array("$lang->itemName","$lang->itemNumber",'ID',"$lang->quantityStock","$lang->supplierCatalogue");
$f1->createSelectField("<b>$lang->searchBy</b>",'searching_by',$option_values2,$option_titles2,100);
$f1->endForm();

echo "<a href='manage_items.php?outofstock=go'>$lang->showOutOfStock</a><br>";
echo "<a href='manage_items.php?reorder=go'>$lang->showReorder</a>";


$tableheaders=array("$lang->rowID","$lang->itemName","$lang->itemNumber","$lang->description","$lang->brand","$lang->category","$lang->supplier","$lang->buyingPrice","$lang->sellingPrice","$lang->tax $lang->percent","$lang->finalSellingPricePerUnit","$lang->quantityStock","$lang->reorderLevel","$lang->supplierCatalogue","$lang->updateItem","$lang->deleteItem");
$tablefields=array('id','item_name','item_number','description','brand_id','category_id','supplier_id','buy_price','unit_price','tax_percent','total_cost','quantity','reorder_level','supplier_catalogue_number');

if(isset($_POST['search']))
{
	$search=$_POST['search'];
	$searching_by =$_POST['searching_by'];
	echo "<center>$lang->searchedForItem: <b>$search</b> $lang->searchBy <b>$searching_by</b></center>";
    $display->displayManageTable("$cfg_tableprefix",'items',$tableheaders,$tablefields,"$searching_by","$search",'id');

}
elseif(isset($_GET['outofstock']))
{
	echo "<center>$lang->outOfStock</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'items',$tableheaders,$tablefields,'quantity',"outofstock",'id');
}
elseif(isset($_GET['reorder']))
{
	echo "<center>$lang->reorder</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'items',$tableheaders,$tablefields,'quantity',"reorder",'id');
}
else
{
	$display->displayManageTable("$cfg_tableprefix",'items',$tableheaders,$tablefields,'','','id');
}


$dbf->closeDBlink();

?>
</body>
</html>