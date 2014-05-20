[php]<?php

DEFINE( 'DB_SERVER', 'limzu.db.5439597.hostedresource.com' );
DEFINE( 'DB_USERNAME', 'limzu' );
DEFINE( 'DB_PASSWORD', 'Ferrari458' );
DEFINE( 'DB_NAME', 'limzu' );

//connect to the database

$mysql = @mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//asign the data passed from Flex to variables

$username = mysqli_real_escape_string($mysql, $_POST["username"]);

$password = mysqli_real_escape_string($mysql, $_POST["password"]);

//Query the database to see if the given username/password combination is valid.

$query = "SELECT * FROM employees WHERE username = '$username' AND password = '$password'";

$result = mysqli_fetch_array(mysqli_query($mysql, $query));

//start outputting the XML

$output = "<loginsuccess>";

//if the query returned true, the output <loginsuccess>yes</loginsuccess> else output <loginsuccess>no</loginsuccess>

if(!$result)

{

$output .= "no";		

}else{

$output .= "yes";	

}

$output .= "</loginsuccess>";

//output all the XML

print ($output);

?>[/php]