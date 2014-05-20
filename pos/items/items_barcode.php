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
<?php session_start();
include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/display.php");
include ("../classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
if(isset($_GET['generateWith']))
{
	$generateWith=$_GET['generateWith'];
}
else
{
	$generateWith='id';
}

$display->displayTitle("$lang->itemsBarcode"." ($generateWith)");
echo "<a href='items_barcode.php?generateWith=item_number'>$lang->itemNumber</a> / <a href='items_barcode.php?generateWith=id'>id</a>";

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}


$items_table=$cfg_tableprefix.'items';
$result=mysql_query("SELECT * FROM $items_table ORDER by item_name",$dbf->conn);

echo '<table border=0 width=85% align=center cellspacing=5 cellpadding=12>

<tr>';

$counter=0;
while($row=mysql_fetch_assoc($result))
{
	if($counter%2==0)
	{
		echo '</tr><tr>';
	}
	echo "<td align='center'><img src='../classes/barcode.php?barcode=$row[$generateWith]&width=256&text=*$row[item_name]*'></td>";
	
	$counter++;
	
}

echo '</tr></table>';





$dbf->closeDBlink();

?>
