<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login_form.php");
    exit();
}

// Display dashboard content
echo "Welcome, " . $_SESSION["username"];
?>
