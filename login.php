<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database configuration
$servername = "localhost";
$username = "root";
$password = "Hari213@";
$dbname = "user";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user1 WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Check if the prepared statement is executed successfully
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User authenticated, redirect to home page
            header("Location: home.php?username=" . urlencode($username));
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        // Handle the case where the prepared statement execution fails
        die("Error executing the prepared statement: " . $stmt->error);
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>
