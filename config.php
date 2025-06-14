<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_PORT', 3307);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'srs');

// connect to MySQL database 
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Check connection
if ($con->connect_error) {
    die("ERROR: Could not connect. " . $con->connect_error);
}

// set the character set for the connection
$con->set_charset("utf8mb4"); // Use utf8mb4 


// Close the connection
// $con->close();
