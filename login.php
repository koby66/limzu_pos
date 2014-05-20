<?php
require('blog/wp-blog-header.php');
include ('includes/form_process.php');
?>
<?php # Script 16.8 - login.php
// This is the login page for the site.

require_once ('includes/config.inc.php'); 
$page_title = 'Login';
include ('includes/header2.php');

if (isset($_POST['submitted'])) {
	require_once (MYSQL);
	
	// Validate the email address:
	if (!empty($_POST['email'])) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
	// Validate the password:
	if (!empty($_POST['password'])) {
		$p = mysqli_real_escape_string ($dbc, $_POST['password']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($e && $p) { // If everything's OK.
	
		// Query the database:
		$q = "SELECT id, first_name, user_level FROM users WHERE (email='$e' AND password=SHA1('$p')) AND active IS NULL";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (@mysqli_num_rows($r) == 1) { // A match was made.

			// Register the values & redirect:
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
			mysqli_free_result($r);
			mysqli_close($dbc);
							
			$url = BASE_URL . 'index.php'; // Define the URL:
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
				
		} else { // No match was made.
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
		}
		
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	
	mysqli_close($dbc);

} // End of SUBMIT conditional.
?>

<h1>Login</h1>
<p>Your browser must allow cookies in order to log in.<br />
<center>
<form action="login.php" method="post">
<TABLE WIDTH=250 BORDER=0 CELLPADDING=0 CELLSPACING=0 style="border-collapse: collapse" bordercolor="#111111">
	<TR>
		<TD COLSPAN=4 width="358" height="27" background="images/login01.jpg" valign="bottom">
			
			</TD>
	</TR>
	<TR>
		<TD COLSPAN=4 width="366">
			<IMG SRC="images/login02.jpg" WIDTH=358 HEIGHT=14 ALT=""></TD>
	</TR>
	<TR>
		<TD COLSPAN=4 background="images/login03.jpg" width="358" HEIGHT="74">
		<center><font size="1">Login to your Limzu account to gain access to all your features.</font></center>
		</TD>
	</TR>
	<TR>
		<TD width="129" background="images/login04.jpg" height="35">
			<div align="center"><font color="black" face="Verdana" size="2">Email:</font></div>
			
			</TD>
		<TD id="loginbg" background="images/login05.jpg" COLSPAN=3 width="235">&nbsp;
        <input type="text" name="email" size="15" maxlength="35"style="font-family: Verdana; font-size: 10pt; border: 1px solid #336699"></TD>
	</TR>
	<TR>
		<TD width="129" height="28" background="images/login06.jpg">
		<div align="center"><font color="black" face="Verdana" size="2">Password:</font></div>

		</TD>
		<TD COLSPAN=3 id="loginbg2" background="images/login05.jpg" width="235">&nbsp;
        <input type="password" name="password" size="15" maxlength="25" style="font-family: Verdana; font-size: 10pt; border: 1px solid #336699"></TD>
	</TR>
	<TR>
		<TD COLSPAN=2 ROWSPAN=2 width="255" height="104" background="images/login07.jpg" align="right">
			<input type="submit" name="submit" value="Go">
            <input type="hidden" name="submitted" value="TRUE" />			
			</TD>
		
    <TD width="54" height="45" background="images/login08.jpg">
    
    </TD>
		<TD ROWSPAN=2 width="53">
			<IMG SRC="images/login09.jpg" WIDTH=51 HEIGHT=104 ALT=""></TD>
	</TR>
	<TR>
		<TD width="54">
			<IMG SRC="images/login10.jpg" WIDTH=52 HEIGHT=59 ALT=""></TD>
	</TR>
	<TR>
		<TD width="131">
			<IMG SRC="images/spacer.gif" WIDTH=129 HEIGHT=1 ALT=""></TD>
		<TD width="128">
			<IMG SRC="images/spacer.gif" WIDTH=126 HEIGHT=1 ALT=""></TD>
		<TD width="54">
			<IMG SRC="images/spacer.gif" WIDTH=52 HEIGHT=1 ALT=""></TD>
		<TD width="53">
			<IMG SRC="images/spacer.gif" WIDTH=51 HEIGHT=1 ALT=""></TD>
	</TR>
</TABLE>
</form>
</center>
	</div>

</body>
</html>
<?php // Flush the buffered output.
ob_end_flush();
?>
