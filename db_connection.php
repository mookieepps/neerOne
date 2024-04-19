<?php
$servername = "localhost";
$username = "pwjvhlmy_neerone";
$password = "Mookie23@";
$dbname = "pwjvhlmy_neerone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>
