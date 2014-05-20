<?php session_start();
include ("../settings.php");
include("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");

$page_title = 'Limzu - Point of Sale';
include ('../includes/header.php');

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);


if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

$dbf->closeDBlink();

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
<table border="0" width="98%">
  <tr>
    <td><img border="0" src="../images/items.gif" width="32" height="33" valign='top'><font color='#b90404' size='4'>&nbsp;<b><?php echo $lang->items ?></b></font><br>
      <br>
      <font face="Verdana" size="2"><?php echo $lang->itemsWelcomeScreen ?></font>
      <ul>
        <li><font face="Verdana" size="2"><a href="form_items.php?action=insert"><?php echo $lang->createNewItem ?></a></font></li>
       <ul>
      	  <li><font face="Verdana" size="2"><a href="discounts/form_discounts.php?action=insert"><?php echo $lang->discountAnItem ?></a></font></li>
      	  <li><font face="Verdana" size="2"><a href="discounts/manage_discounts.php"><?php echo $lang->manageDiscounts ?></a></font></li>
		</ul>
 <hr width=300 />     
       <li><font face="Verdana" size="2"><a href="manage_items.php"><?php echo $lang->manageItems ?></a></font></li>
         <li><font face="Verdana" size="2"><a href="items_barcode.php"><?php echo $lang->itemsBarcode ?></a></font></li>
      	
      </ul>
      <hr width=300 />
      <ul>
        <li><font face="Verdana" size="2"><a href="brands/form_brands.php?action=insert"><?php echo $lang->createBrand ?></a></font></li>
        <li><font face="Verdana" size="2"><a href="brands/manage_brands.php"><?php echo $lang->manageBrands?></a></font></li>
      </ul>
      <hr width=300 />
      <ul>
        <li><font face="Verdana" size="2"><a href="categories/form_categories.php?action=insert"><?php echo $lang->createCategory ?></a></font></li>
        <li><font face="Verdana" size="2"><a href="categories/manage_categories.php"><?php echo $lang->manageCategories ?></a></font></li>
      </ul>
      <hr width=300 />
       <ul>
        <li><font face="Verdana" size="2"><a href="suppliers/form_suppliers.php?action=insert"><?php echo $lang->createSupplier ?></a></font></li>
        <li><font face="Verdana" size="2"><a href="suppliers/manage_suppliers.php"><?php echo $lang->manageSuppliers ?></a></font></li>
      </ul>
      <p>&nbsp;</td>
  </tr>
</table>

</body>

</html>