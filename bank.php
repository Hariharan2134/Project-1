<?php
// Establish database connection
$host = "localhost";
$username = "root";
$password = "Hari213@";
$database = "bank";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind SQL statement
    $sql_bank = "INSERT INTO bank (B_ID, B_Name, IFSC, Branch, B_Add, MICR, ACC_NO, ACC_NAME, ACC_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_bank);
    $stmt->bind_param("sssssssss", $B_ID, $B_Name, $IFSC, $Branch, $B_Add, $MICR, $ACC_NO, $ACC_NAME, $ACC_Type);

    // Retrieve and sanitize form data
    $B_ID = $_POST["B_ID"];
    $B_Name = $_POST["B_Name"];
    $IFSC = $_POST["IFSC"];
    $Branch = $_POST["Branch"];
    $B_Add = $_POST["B_Add"];
    $MICR = $_POST["MICR"];
    $ACC_NO = $_POST["ACC_NO"];
    $ACC_NAME = $_POST["ACC_NAME"];
    $ACC_Type = $_POST["ACC_Type"];

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
