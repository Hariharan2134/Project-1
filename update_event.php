<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database configuration
$servername = "localhost";
$username = "root";
$password = "Hari213@";
$dbname = "event"; // Assuming you have a database named 'event'
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Process user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = sanitizeInput($_POST["action"]);

    switch ($action) {
        case "add":
            // Form for adding a new event
            include "add_event_form.php";
            break;

        case "update":
            // Form for updating an existing event
            include "update_event_form.php";
            break;

        case "remove":
            // Form for removing an existing event
            include "remove_event_form.php";
            break;

        default:
            echo "Invalid action.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
</head>
<body>
    <h1>Event Management</h1>

    <ul>
        <li><a href="update_events.php?action=add">Add New Event</a></li>
        <li><a href="update_events.php?action=update">Update Event</a></li>
        <li><a href="update_events.php?action=remove">Remove Event</a></li>
    </ul>
</body>
</html>

