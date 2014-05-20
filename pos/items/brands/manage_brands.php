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

include ("../../settings.php");
include ("../../language/$cfg_language");
include ("../../classes/db_functions.php");
include ("../../classes/security_functions.php");
include ("../../classes/display.php");
include ("../../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);


if(!$sec->isLoggedIn())
{
	header ("location: ../../login.php");
	exit();
}

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageBrands");

$f1=new form('manage_brands.php','POST','brands','425',$cfg_theme,$lang);
$f1->createInputField("<b>$lang->searchForBrand</b>",'text','search','','24','350');
$f1->endForm();

$tableheaders=array("$lang->rowID","$lang->brandName","$lang->updateBrand","$lang->deleteBrand");
$tablefields=array('id','brand');

if(isset($_POST['search']))
{
	$search=$_POST['search'];
	echo "<center>$lang->searchedForBrand: <b>$search</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'brands',$tableheaders,$tablefields,'brand',"$search",'brand');
}
else
{
	$display->displayManageTable("$cfg_tableprefix",'brands',$tableheaders,$tablefields,'','','brand');
}


$dbf->closeDBlink();

?>
</div>
</body>
</html>
