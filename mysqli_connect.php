<?php # Script 16.4 - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'limzu');
DEFINE ('DB_PASSWORD', 'pass');
DEFINE ('DB_HOST', 'limzu.db.5439597.hostedresource.com');
DEFINE ('DB_NAME', 'limzu');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$dbc) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
}

?>
