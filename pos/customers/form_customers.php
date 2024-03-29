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
    <img border="0" src="../images/newcustprofile.jpg" alt="New Customer Profile" valign='top'><br />&nbsp;<br />
    <form action="process_form_customers.php" method="post" class="niceform">
	<fieldset>
    	<legend>Personal Info</legend>
        <dl>
        	<dt><label for="first_name">First Name:</label></dt>
            <dd><input type="text" name="first_name" id="first_name" size="32" maxlength="30" /></dd>
        </dl>
        <dl>
        	<dt><label for="last_name">Last Name:</label></dt>
            <dd><input type="text" name="last_name" id="last_name" size="32" maxlength="40" /></dd>
        </dl>
        <dl>
        	<dt><label for="business_name">Business Name:</label></dt>
            <dd><input type="text" name="business_name" id="business_name" size="32" maxlength="30" /></dd>
        </dl>
        <dl>
        	<dt><label for="position">Position:</label></dt>
            <dd><input type="text" name="position" id="position" size="32" maxlength="30" /></dd>
        </dl>
        <dl>
        	<dt><label for="email">Email Address:</label></dt>
            <dd><input type="text" name="email" id="email" size="32" maxlength="50" /></dd>
        </dl>
        <dl>
        	<dt><label for="dobMonth">Date of Birth:</label></dt>
            <dd>
            	<select size="1" name="dobMonth" id="dobMonth">
                	<option value="Jan">Jan</option>
                    <option value="Feb">Feb</option>
                    <option value="Mar">Mar</option>
                    <option value="Apr">Apr</option>
                    <option value="May">May</option>
                    <option value="Jun">Jun</option>
                    <option value="Jul">Jul</option>
                    <option value="Aug">Aug</option>
                    <option value="Sep">Sep</option>
                    <option value="Oct">Oct</option>
                    <option value="Nov">Nov</option>
                    <option value="Dec">Dec</option>
                </select>
                <select size="1" name="dobDay" id="dobDay">
                	<option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select size="1" name="dobYear" id="dobYear">
                	<option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
					<option value="1989">1989</option>
					<option value="1988">1988</option>
					<option value="1987">1987</option>
					<option value="1986">1986</option>
					<option value="1985">1985</option>
					<option value="1984">1984</option>
					<option value="1983">1983</option>
					<option value="1982">1982</option>
					<option value="1981">1981</option>
					<option value="1980">1980</option>
					<option value="1979">1979</option>
					<option value="1978">1978</option>
					<option value="1977">1977</option>
					<option value="1976">1976</option>
					<option value="1975">1975</option>
					<option value="1974">1974</option>
					<option value="1973">1973</option>
					<option value="1972">1972</option>
					<option value="1971">1971</option>
					<option value="1970">1970</option>
					<option value="1969">1969</option>
					<option value="1968">1968</option>
					<option value="1967">1967</option>
					<option value="1966">1966</option>
					<option value="1965">1965</option>
					<option value="1964">1964</option>
					<option value="1963">1963</option>
					<option value="1962">1962</option>
					<option value="1961">1961</option>
					<option value="1960">1960</option>
					<option value="1959">1959</option>
					<option value="1958">1958</option>
					<option value="1957">1957</option>
					<option value="1956">1956</option>
					<option value="1955">1955</option>
					<option value="1954">1954</option>
					<option value="1953">1953</option>
					<option value="1952">1952</option>
					<option value="1951">1951</option>
					<option value="1950">1950</option>
                    <option value="1950">1949</option>
                    <option value="1950">1948</option>
                    <option value="1950">1947</option>
                    <option value="1950">1946</option>
                    <option value="1950">1945</option>
                    <option value="1950">1944</option>
                    <option value="1950">1943</option>
                    <option value="1950">1942</option>
                    <option value="1950">1941</option>
                    <option value="1950">1940</option>
                    <option value="1950">1939</option>
                    <option value="1950">1938</option>
                    <option value="1950">1937</option>
                    <option value="1950">1936</option>
                    <option value="1950">1935</option>
                    <option value="1950">1934</option>
                    <option value="1950">1933</option>
                    <option value="1950">1932</option>
                    <option value="1950">1931</option>
                    <option value="1950">1930</option>
                </select>
            </dd>
        </dl>
    </fieldset>
    <fieldset>
    	<legend>Contact Info</legend>
        <dl>
        	<dt><label for="street_address">Street Address:</label></dt>
            <dd><input type="text" name="street_address" id="street_address" size="32" maxlength="150" /></dd>
        </dl>
        <dl>
        	<dt><label for="city">City:</label></dt>
            <dd><input type="text" name="city" id="city" size="32" maxlength="30" /></dd>
        </dl>
        <dl>
        	<dt><label for="state">State:</label></dt>
            <dd>
            	<select size="1" name="state" id="state">
                	<option value="AL">AL</option>
					<option value="AK">AK</option>
					<option value="AR">AR</option>
					<option value="AS">AS</option>
					<option value="AZ">AZ</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DC">DC</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="FM">FM</option>
					<option value="GA">GA</option>
					<option value="GU">GU</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IA">IA</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="MA">MA</option>
					<option value="MD">MD</option>
					<option value="ME">ME</option>
					<option value="MH">MH</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MO">MO</option>
					<option value="MP">MP</option>
					<option value="MS">MS</option>
					<option value="MT">MT</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="NE">NE</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NV">NV</option>
					<option value="NY">NY</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="PR">PR</option>
					<option value="PW">PW</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VA">VA</option>
					<option value="VI">VI</option>
					<option value="VT">VT</option>
					<option value="WA">WA</option>
					<option value="WI">WI</option>
					<option value="WV">WV</option>
					<option value="WY">WY</option>
            	</select>
            </dd>
        </dl>
        <dl>
        	<dt><label for="zip">Zip Code:</label></dt>
            <dd><input type="text" name="zip" id="zip" size="32" maxlength="5" /></dd>
        </dl>
        <dl>
        	<dt><label for="phone_number">Phone Number:</label></dt>
            <dd><input type="text" name="phone_number" id="phone_number" size="32" maxlength="30" /></dd>
        </dl>
    </fieldset>
    <fieldset>
    	<legend>Account Info</legend>
        <dl>
        	<dt><label for="account_number">Account Number:</label></dt>
            <dd><input type="text" name="account_number" id="account_number" size="32" maxlength="20" /></dd>
        </dl>
    </fieldset>
    <fieldset>
    	<legend>Comments/Picture</legend>
        <dl>
        	<dt><label for="comments">Comments:</label></dt>
            <dd><textarea name="comments" id="comments" rows="5" cols="60"></textarea></dd>
        </dl>
        <dl>
        	<dt><label for="photo">Upload a Picture:</label></dt>
            <dd><input type="file" name="photo" id="photo" /></dd>
        </dl>
    </fieldset>
    <fieldset class="action">
    	<input type="submit" name="submitted" id="submit" value="Submit" />
    </fieldset>
</form>
</body>
</html>