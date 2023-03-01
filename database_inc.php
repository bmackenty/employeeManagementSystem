<?php

// this file should be named database_inc.php
//
// this file is used to open a connection to your database.
// Anytime you need to connect to a database, you must include this file. 
// 
// to setup this file, please find the email I sent with your account informatio
// you need to replace YOURUSERNAME with you username. You need to do this twice
// you need to replace YOURPASSWORD with your password. You only need to do this once.
// 
// There is a conditional statement on line 20 which, if $connect is NOT TRUE
// prints an error message helping us understand the reason why we could not connect 
// to the database

// Create a new mysqli object with the database credentials
$mysql_connect = new mysqli('localhost', 'USERNAME', 'PASSWORD', 'USERNAME');

// Check for errors in the connection
if ($mysql_connect->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}


?>
