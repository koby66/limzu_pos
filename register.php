<?php
# Script 16.6 - register.php
// This is the registration page for the site.

require('blog/wp-blog-header.php');
require_once ('includes/config.inc.php');
$page_title = 'Register';
include ('includes/header2.php');
								
?>
	
<font size="+3"><b>Register</b></font><p>
<form action="register2.php" method="post" comment="textarea" name="useroptions">
	<fieldset>
	
	<b>First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /><br />&nbsp;<br />
	
	<b>Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /><br />&nbsp;<br />
	
	<b>Email Address:</b> 
    <input type="text" name="email" size="30" maxlength="80" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" /><br />&nbsp;<br />
    
	<table cellspacing="0" cellpadding="0" border="0" width="90%">
	<tr height="50"><td colspan="2">
	<table border="0">
	<tr><td><b>Are you registering to be a:</b></td></tr>
	</table>
	</td></tr>
	<tr><td>
	<table border="0" width="70%">
	<tr><td><input type="radio" name="user_level" value="bussowner"><b> Business Owner</b></tr>
	<tr><td><input type="radio" name="user_level" value="employee"><b> Employee</b></td></tr>
	</table>
	</td><td>
	<table width="329" border="0">
	<tr><td width="374">
    <input type="hidden" class="DEPENDS ON user_level BEING bussowner OR user_level BEING employee"></label>
    
    <label><font size="-1"><i>Enter Business Name: </i></font><input type="text" name="business" size="20" maxlength="40" class="DEPENDS ON user_level BEING bussowner" value="<?php if (isset($trimmed['business'])) echo $trimmed['business']; ?>" /></label>
    
    <label><font size="-1"><i>Enter Company Code: </i></font><input type="text" name="companycode" class="DEPENDS ON user_level BEING employee" value="<?php if (isset($trimmed['business'])) echo $trimmed['business']; ?>"></label></td></tr>
	</table>
	</td></tr></table><br />&nbsp;<br />
   
    <b>Password:</b> 
      <input type="password" name="password1" size="20" maxlength="20" /> 
	  <small>Use only letters, numbers, and the underscore. Must be between 4 and 20 characters long.</small><br />&nbsp;<br />
      
	<b>Confirm Password:</b> <input type="password" name="password2" size="20" maxlength="20" /><br />&nbsp;<br />
	
    <?php 
	//Recaptcha code
	require_once('includes/recaptchalib.php');
	$publickey = "6Ld-KwkAAAAAAO7k-qOc7WBiGcgbASFvXZFoEKkW"; // you got this from the signup page
	echo recaptcha_get_html($publickey);
	?>
    </fieldset>
    
	<div align="center"><input type="submit" name="submit" value="Register" /></div>
	<input type="hidden" name="submitted" value="TRUE" />

</form>

