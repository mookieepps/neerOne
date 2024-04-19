<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username key exists in the session array
    if (isset($_SESSION["username"])) {
        // Username exists, redirect to success page
        header("Location: success.php");
        exit();
    } else {
        // Username does not exist, handle the login process
        include("db_connection.php");

        $pin = $_POST["pin"];

        // Query the database for the PIN
        $sql = "SELECT * FROM users WHERE pin = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $pin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // PIN is correct, log the user in
            $_SESSION["username"] = $row['username'];
            header("Location: success.php"); // Redirect to success page
            exit();
        } else {
            // Invalid PIN
            $error = "Invalid PIN";
            header("Location: login_form.php?error=$error");
            exit();
        }
    }
} else {
    // Redirect to login form if the form is not submitted
    header("Location: login_form.php");
    exit();
}
?>
