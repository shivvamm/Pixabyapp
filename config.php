<?php
// Database configuration
$host = "sql309.epizy.com";
$username = "epiz_33749499";
$password = "jNKkkwrUT7";
$dbname = "epiz_33749499_mydb";

// Connect to database
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
